<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 22.04.2022 / 14:45
 */

namespace App\Services\Admin\Module;

use App\Http\DTO\Admin\Module\ModuleDto;
use App\Models\Module;
use App\Repositories\Admin\Module\ModuleRepository;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;
use RuntimeException;

/**
 * Class ModuleService
 * @package App\Services\Admin\Module
 */
class ModuleService
{
    /**
     * @return ModuleService
     */
    public static function getInstance(): ModuleService
    {
        return new static();
    }

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return ModuleRepository::getInstance()->getAll();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return ModuleRepository::getInstance()->getById($id);
    }

    /**
     * @param Request $request
     * @return ValidatorContract
     */
    protected function validator(Request $request): ValidatorContract
    {
        return ValidatorFacade::make(
            $request->all(),
            [
                'module_name' => 'required',
                'module_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'required' => 'Поле :attribute обязательно',
            ]
        );
    }

    /**
     * @param Module  $module
     * @param Request $request
     * @return void
     */
    public function modify(Module $module, Request $request)
    {
        /** @var Validator $validator */
        $validator = $this->validator($request);

        if ($validator->fails()) {
            throw new RuntimeException($validator->errors()->first());
        }

        $data = $validator->getData();
        $slug = string_to_slug($data['module_name']);

        if ($this->exists($slug) && $module->getModuleSlug() !== $slug) {
            throw new RuntimeException('Модуль уже существует');
        }

        if (isset($data['module_icon'])) {
            $imageName = time() . '.' . $request->file('module_icon')->getClientOriginalExtension();
            $request->file('module_icon')->storeAs('public/modules', $imageName);

            ModuleRepository::getInstance()->update($module, new ModuleDto(
                $slug,
                $data['module_name'],
                "storage/modules/{$imageName}",
                isset($data['status']) ? 1 : 0
            ));
        } else {
            ModuleRepository::getInstance()->update($module, new ModuleDto(
                $slug,
                $data['module_name'],
                $module->getModuleIcon(),
                isset($data['status']) ? 1 : 0
            ));
        }
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function exists(string $slug): bool
    {
        return ModuleRepository::getInstance()->checkBySlug($slug);
    }
}

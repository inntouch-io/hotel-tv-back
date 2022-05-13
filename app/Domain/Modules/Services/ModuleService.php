<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 22.04.2022 / 14:45
 */

namespace App\Domain\Modules\Services;

use App\Domain\Images\Builders\ImageBuilder;
use App\Domain\Images\Entities\Image;
use App\Domain\Modules\Builders\ModuleBuilder;
use App\Domain\Modules\Entities\Module;
use App\Http\DTO\Admin\Module\ModuleDto;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;
use RuntimeException;

/**
 * Class ModuleService
 * @package App\Domain\Modules\Services
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
        return ModuleBuilder::getInstance()->getAll();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return ModuleBuilder::getInstance()->getById($id);
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
                'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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

        if (isset($data['image'])) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = md5(time());
            $request->file('image')->storeAs('public/modules', $imageName . '.' . $extension);

            /** @var Image $image */
            $image = ImageBuilder::getInstance()->save(
                "storage/modules/",
                $imageName,
                $extension
            );

            ModuleBuilder::getInstance()->update($module, new ModuleDto(
                $slug,
                $data['module_name'],
                $image->getId(),
                isset($data['isVisible']) ? 1 : 0
            ));
        } else {
            ModuleBuilder::getInstance()->update($module, new ModuleDto(
                $slug,
                $data['module_name'],
                $module->getImageId(),
                isset($data['isVisible']) ? 1 : 0
            ));
        }
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function exists(string $slug): bool
    {
        return ModuleBuilder::getInstance()->checkBySlug($slug);
    }
}

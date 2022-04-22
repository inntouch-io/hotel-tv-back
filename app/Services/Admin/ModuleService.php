<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 22.04.2022 / 14:45
 */

namespace App\Services\Admin;

use App\Models\Module;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;
use RuntimeException;
use function App\Helpers\string_to_slug;

/**
 * Class ModuleService
 * @package App\Services\Admin
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
        return Module::query()
            ->with('infos')
            ->orderBy('order_position')
            ->get();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return Module::query()->whereKey($id)->first();
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
                'module_name'    => 'required',
                'status'         => 'required',
                'order_position' => 'required',
            ],
            [
                'required' => 'Поле :attribute обязательно',
            ]
        );
    }

    public function modify(Module $module, Request $request)
    {
        /** @var Validator $validator */
        $validator = $this->validator($request);

        if ($validator->fails()){
            throw new RuntimeException($validator->errors()->first());
        }

        $data = $validator->getData();
        $slug = string_to_slug($data['module_name']);

        if ($this->exists($slug) && $module->getModuleSlug() !== $slug){
            throw new RuntimeException('Модуль уже существует');
        }


    }

    /**
     * @param string $slug
     * @return bool
     */
    public function exists(string $slug): bool
    {
        return Module::query()->where('module_slug', '=', $slug)->exists();
    }
}

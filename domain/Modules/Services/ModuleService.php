<?php

/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 22.04.2022 / 14:45
 */

namespace Domain\Modules\Services;

use Domain\Applications\Entities\Application;
use Domain\Images\Builders\ImageBuilder;
use Domain\Images\Entities\Image;
use Domain\Images\Services\ImageService;
use Domain\Modules\Builders\ModuleBuilder;
use Domain\Modules\DTO\ModuleDto;
use Domain\Modules\Entities\Module;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use RuntimeException;

/**
 * Class ModuleService
 * @package App\domain\Modules\Services
 */
class ModuleService
{
    const CATALOG = "modules";

    /** @var ModuleBuilder $builder */
    protected ModuleBuilder $builder;

    public function __construct(ModuleBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return ModuleService
     */
    public static function getInstance(): ModuleService
    {
        return new static(ModuleBuilder::getInstance());
    }

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->builder->list(function (Builder $builder) {
            return $builder->with('infos')->orderBy('order_position');
        });
    }

    public function store(Request $request)
    {
        $data = $this->validator($request);
        $slug = string_to_slug($data['module_name']);

        /** @var bool $moduleExists */
        $moduleExists = $this->builder->exists(function (Builder $builder) use ($slug) {
            return $builder->where('module_slug', '=', $slug);
        });

        if ($moduleExists) {
            throw new RuntimeException('Name of module exists');
        }

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);
        } else {
            throw new RuntimeException('Image not found');
        }

        $module = $this->builder->takeBy(function (Builder $builder) {
            return $builder->latest('order_position');
        });

        $order_position = !is_null($module) ? ($module['order_position'] + 1) : 1;

        $this->builder->store(new ModuleDto(
            $data['module_name'],
            $slug,
            $data['type'],
            $image->getId(),
            isset($data['isVisible']) ? 1 : 0,
            $order_position
        ));
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->builder->list(function (Builder $builder) {
            return $builder->orderBy('order_position');
        });
    }

    /**
     * @param string $locale
     * @return Collection
     */
    public function getVisibleItems(string $locale = 'ru'): Collection
    {
        return $this->builder->getVisibleItems(function (Builder $builder) use ($locale) {
            return $builder->with('image')
                ->join('module_infos', 'modules.id', '=', 'module_infos.module_id')
                ->where('module_infos.locale', '=', $locale)
                ->where('is_visible', '=', 1)
                ->orderBy('order_position')
                ->select([
                    'modules.*',
                    'module_infos.name'
                ]);
        });
    }

    /**
     * @param int $id
     * @return Module
     * @throw RuntimeException
     */
    public function getById(int $id): Module
    {
        $module = $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder
                ->whereKey($id)
                ->with('image');
        });

        if (is_null($module)) {
            throw new RuntimeException('Module not found', 404);
        }

        return $module;
    }

    public function getWithInfos(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with('infos');
        });
    }

    /**
     * @param Module  $module
     * @param Request $request
     * @return void
     */
    public function update(Module $module, Request $request)
    {
        $this->validator($request);

        $data = $request->all();
        $slug = string_to_slug($data['module_name']);

        if ($this->exists($slug) && $module->getModuleSlug() !== $slug) {
            throw new RuntimeException('Модуль уже существует');
        }

        $imageId = $module->getImageId();

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);

            $imageId = $image->getId();
        }

        $this->builder->update($module, new ModuleDto(
            $slug,
            $data['module_name'],
            $data['type'],
            $imageId,
            isset($data['isVisible']) ? 1 : 0,
            $module->getOrderPosition()
        ));
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function exists(string $slug): bool
    {
        return $this->builder->checkBySlug(function (Builder $builder) use ($slug) {
            return $builder->where('module_slug', '=', $slug);
        });
    }

    /**
     * @param array $modules
     * @return void
     */
    public function sorting(array $modules = [])
    {
        foreach ($modules as $index => $data) {
            Module::query()->whereKey($data['id'])->update(
                [
                    'order_position' => ($index + 1)
                ]
            );
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validator(Request $request): array
    {
        $rules = [
            'module_name' => 'required|string',
            'type'        => 'required|string',
            'isVisible'   => 'nullable|int'
        ];

        if ($request->route()->getName() === 'admin.modules.module.store') {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } elseif ($request->route()->getName() === 'admin.modules.module.update') {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        return $request->validate($rules);
    }
}

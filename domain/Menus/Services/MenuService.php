<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 06.07.2022 / 12:21
 */

namespace Domain\Menus\Services;

use Domain\Images\Entities\Image;
use Domain\Images\Services\ImageService;
use Domain\Menus\Builders\MenuBuilder;
use Domain\Menus\DTO\MenuDto;
use Domain\Menus\Entities\Menu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use RuntimeException;

/**
 * Class MenuService
 * @package Domain\Menus\Services
 */
class MenuService
{
    const CATALOG = 'menus';

    protected MenuBuilder $builder;

    /**
     * @param MenuBuilder $builder
     */
    public function __construct(MenuBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return $this
     */
    public static function getInstance(): MenuService
    {
        return new static(MenuBuilder::getInstance());
    }

    public function list()
    {
        return $this->builder->list(function (Builder $builder) {
            return $builder->with(['image', 'infos'])->orderBy('order_position');
        });
    }

    public function getItems(Request $request, $locale = 'ru')
    {
        return $this->builder->getItems(function (Builder $builder) use ($request, $locale) {
            return $builder
                ->with('image')
                ->where('menus.type', '=', $request->input('type'))
                ->where('menus.is_visible', '=', 1)
                ->join('menu_infos', 'menus.id', '=', 'menu_infos.menu_id')
                ->where('menu_infos.locale', '=', $locale)
                ->orderBy('menus.order_position', 'asc')
                ->select([
                    'menus.*',
                    'menu_infos.title',
                ])
                ->distinct();
        }, $request->input('itemsPerPage', 18));
    }

    public function store(Request $request)
    {
        $data = $this->validator($request);

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);
        } else {
            throw new RuntimeException('Image not found');
        }

        $menu = $this->builder->takeBy(function (Builder $builder) use ($data) {
            return $builder->where('type', '=', $data['type'])->latest('order_position');
        });

        if (is_null($menu)) {
            $order_position = 1;
        } else {
            $order_position = (int)$menu['order_position'] + 1;
        }

        return $this->builder->store(new MenuDto(
            $image->getId(),
            isset($data['isVisible']) ? 1 : 0,
            $data['type'],
            $order_position,
        ));
    }

    public function update(Menu $menu, Request $request)
    {
        $data = $this->validator($request);

        $imageId = $menu->getImageId();

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);

            $imageId = $image->getId();
        }

        $this->builder->update($menu, new MenuDto(
            $imageId,
            isset($data['isVisible']) ? 1 : 0
        ));
    }

    public function getById(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with('image');
        });
    }

    public function getWithInfosById(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with('infos');
        });
    }

    public function getWithAllRelations(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with(['infos', 'cards']);
        });
    }

    public function getWithCards(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with('cards');
        });
    }

    // Validation

    /**
     * @param Request $request
     * @return array
     */
    public function validator(Request $request): array
    {
        $rules = [];

        if ($request->route()->getName() === 'admin.menus.menu.store') {
            $rules = [
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'type'      => 'required|in:' . implode(',', array_keys(config('app.types'))),
                'isVisible' => 'nullable|int'
            ];
        } elseif ($request->route()->getName() === 'admin.menus.menu.update') {
            $rules = [
                'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'isVisible' => 'nullable|int'
            ];
        }

        return $request->validate(
            $rules
        );
    }

    public function sorting(array $menus = [])
    {
        foreach ($menus as $index => $data) {
            Menu::query()->whereKey((int)$data['id'])->update(
                [
                    'order_position' => ($index + 1)
                ]
            );
        }
    }

    public function getByType(string $type)
    {
        return $this->builder->list(function (Builder $builder) use ($type) {
            return $builder->where('type', '=', $type)->with('infos');
        });
    }
}

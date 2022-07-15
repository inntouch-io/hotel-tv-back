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
use Domain\Menus\DTO\MenuCreateDto;
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

    /**
     * @param Request $request
     * @return array
     */
    public function validator(Request $request): array
    {
        return $request->validate(
            [
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'type'      => 'required|in:' . implode(',', array_keys(config('app.types'))),
                'isVisible' => 'nullable|int'
            ]
        );
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

        if (is_null($menu = Menu::query()->where('type', '=', $data['type'])->latest()->first())) {
            $order_position = 1;
        } else {
            $order_position = (int)$menu['order_position'] + 1;
        }

        return $this->builder->store(new MenuCreateDto(
            $image->getId(),
            $data['type'],
            isset($data['isVisible']) ? 1 : 0,
            $order_position,
        ));
    }

    public function getById(int $id)
    {
        return $this->builder->getById(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with('image');
        });
    }

    public function getWithInfosById(int $id)
    {
        return $this->builder->getById(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with('infos');
        });
    }

    public function getWithCards(int $id)
    {
        return $this->builder->getById(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with('cards');
        });
    }

    public function update(Menu $menu, Request $request)
    {
        $data = $request->validate(
            [
                'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'isVisible' => 'nullable|int'
            ]
        );

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
}

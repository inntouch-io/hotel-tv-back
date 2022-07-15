<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 14.07.2022 / 15:54
 */

namespace Domain\Menus\Services;

use Domain\Images\Entities\Image;
use Domain\Images\Services\ImageService;
use Domain\Menus\Builders\MenuCardBuilder;
use Domain\Menus\DTO\MenuCardDto;
use Domain\Menus\DTO\MenuCardUpdateDto;
use Domain\Menus\Entities\MenuCard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use RuntimeException;

/**
 * Class MenuCardService
 * @package Domain\Menus\Services
 */
class MenuCardService
{
    const CATALOG = 'menuCards';

    protected MenuCardBuilder $builder;

    /**
     * @param MenuCardBuilder $builder
     */
    public function __construct(MenuCardBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return MenuCardService
     */
    public static function getInstance(): MenuCardService
    {
        return new static(MenuCardBuilder::getInstance());
    }

    public function getById(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with(['image', 'menu']);
        });
    }

    public function getWithInfos(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with(['infos', 'menu']);
        });
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'image'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'isVisible' => 'nullable|int'
            ]
        );

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);
        } else {
            throw new RuntimeException('Image not found');
        }

        $menuId = (int)$request->query('menu_id');
        if (is_null($card = MenuCard::query()->where('menu_id', '=', $menuId)->latest()->first())) {
            $order_position = 1;
        } else {
            $order_position = (int)$card['order_position'] + 1;
        }

        $this->builder->store(new MenuCardDto(
            $image->getId(),
            isset($data['isVisible']) ? 1 : 0,
            $order_position,
            $menuId
        ));
    }

    public function update(MenuCard $card, Request $request)
    {
        $data = $request->validate(
            [
                'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'isVisible' => 'nullable|int'
            ]
        );

        $imageId = $card->getImageId();

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);

            $imageId = $image->getId();
        }

        $this->builder->update($card, new MenuCardUpdateDto(
            $imageId,
            isset($data['isVisible']) ? 1 : 0,
        ));
    }
}

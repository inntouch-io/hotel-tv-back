<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 18.08.2022 / 15:42
 */

namespace Domain\Gallery\Builders;

use Closure;
use Domain\Gallery\Dto\GalleryDto;
use Domain\Gallery\Entities\Gallery;

/**
 * Class GalleryBuilder
 * @package Domain\Gallery\Builders
 */
class GalleryBuilder
{
    /**
     * @return GalleryBuilder
     */
    public static function getInstance(): GalleryBuilder
    {
        return new static();
    }

    public function list(Closure $closure)
    {
        return $closure(Gallery::query())->get();
    }

    public function takeBy(Closure $closure)
    {
        return $closure(Gallery::query())->first();
    }

    public function store(GalleryDto $dto)
    {
        return Gallery::query()->create(
            [
                'image_id'       => $dto->getImageId(),
                'is_visible'     => $dto->getIsVisible(),
                'order_position' => $dto->getOrderPosition()
            ]
        );
    }

    public function update(Gallery $gallery, GalleryDto $dto)
    {
        $gallery->update(
            [
                'image_id'   => $dto->getImageId(),
                'is_visible' => $dto->getIsVisible()
            ]
        );
    }

    public function delete(Closure $closure)
    {
        $closure(Gallery::query())->delete();
    }
}

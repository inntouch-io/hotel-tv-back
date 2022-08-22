<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 22.08.2022 / 15:37
 */

namespace App\Core\Api\Responses\Gallery;

use App\Core\StaticKeys;
use App\Core\Api\Collections;

/**
 * Class GalleryListCollection
 * @package App\Core\Api\Responses\Gallery
 */
class GalleryListCollection extends Collections
{
    private static $GALLERY_ID = 'galleryId';
    private static $ORDER_POSITION = 'orderPosition';

    public function toArray($request)
    {
        return $this->collection->transform(function ($item){
            $image = $item->image ? $item->image->getUrl() : null;

            return [
                self::$GALLERY_ID => (int) $item->getId(),
                self::$ORDER_POSITION => (string) $item->getOrderPosition(),
                StaticKeys::$FILES => [
                    StaticKeys::$IMAGE_URL => $image,
                ]
            ];
        });
    }
}

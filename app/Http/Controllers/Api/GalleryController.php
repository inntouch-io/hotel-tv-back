<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 22.08.2022 / 14:54
 */

namespace App\Http\Controllers\Api;

use App\Core\Api\Responses\Gallery\GalleryListCollection;
use Domain\Gallery\Services\GalleryService;

/**
 * Class GalleryController
 * @package App\Http\Controllers\Api
 */
class GalleryController extends ApiController
{
    /**
     * GalleryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {
        $galleryListCollection = new GalleryListCollection(
            GalleryService::getInstance()->getList()
        );

        $this->setData($galleryListCollection);

        return $this->composeData();
    }
}

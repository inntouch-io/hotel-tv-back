<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 13.01.2023 / 15:44
 */

namespace App\Http\Controllers\Api;

use Domain\Media\Services\MediaService;
use Exception;

/**
 * Class MediaController
 * @package App\Http\Controllers\Api
 */
class MediaController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {
        try {
            $this->setData(MediaService::getInstance()->getList());

            return $this->composeData();

        } catch (Exception $exception) {
            $this->setMessage($exception->getMessage());
            $this->setCode($exception->getCode() < 0 ? 400 : $exception->getCode());
            return $this->composeData();
        }
    }
}

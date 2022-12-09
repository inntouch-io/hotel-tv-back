<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.08.2022 / 12:30
 */

namespace App\Core\Api\Responses\ThirdParty;

use App\Core\Api\Collections;

/**
 * Class CurrencyCollection
 * @package App\Core\Api\Responses\ThirdParty
 */
class CurrencyCollection extends Collections
{
    public function toArray($request)
    {
        return $this->resource;
    }
}

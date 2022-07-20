<?php

namespace App\Core\Api\Validates\Information;


use App\Core\Validates;

/**
 * Class GetInformationCardsRequest.php
 *
 * @package App\Core\Api\Validates\Information  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 20/07/22
 */
class GetInformationCardsRequest extends Validates
{
    public function rules()
    {
        return [
            'infoId' => 'required',
            'itemsPerPage' => 'required',
        ];
    }
}

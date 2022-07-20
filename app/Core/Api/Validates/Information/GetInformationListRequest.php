<?php

namespace App\Core\Api\Validates\Information;


use App\Core\Validates;

/**
 * Class GetInformationListRequest.php
 *
 * @package App\Core\Api\Validates\Information  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 20/07/22
 */
class GetInformationListRequest extends Validates
{
    public function rules()
    {
        return [
            'type' => 'required',
            'itemsPerPage' => 'required',
        ];
    }
}

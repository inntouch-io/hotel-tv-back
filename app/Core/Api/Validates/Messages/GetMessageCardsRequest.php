<?php

namespace App\Core\Api\Validates\Messages;


use App\Core\Validates;

/**
 * Class GetMessageCardsRequest.php
 *
 * @package App\Core\Api\Validates\Messages  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 06/07/22
 */
class GetMessageCardsRequest extends Validates
{
    public function rules()
    {
        return [
            'messageId' => 'required',
            'itemsPerPage' => 'required',
        ];
    }
}

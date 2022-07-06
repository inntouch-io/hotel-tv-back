<?php

namespace App\Core\Api\Validates\Messages;


use App\Core\Validates;

/**
 * Class GetMessagesListValidate.php
 *
 * @package App\Core\Api\Validates\Messages  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 06/07/22
 */
class GetMessagesListRequest extends Validates
{
    public function rules()
    {
        return [
            'itemsPerPage' => 'required',
        ];
    }
}

<?php

namespace App\Core\Api\Validates\Auth;


use App\Core\Validates;

/**
 * Class CheckDeviceIdValidate.php
 *
 * @package App\Core\Validates\Auth  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 02/07/22
 */
class CheckDeviceIdValidate extends Validates
{
    public function rules()
    {
        return [
            'device-id' => 'required',
        ];
    }
}

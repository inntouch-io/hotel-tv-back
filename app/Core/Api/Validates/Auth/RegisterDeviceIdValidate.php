<?php

namespace App\Core\Api\Validates\Auth;


use App\Core\Validates;

/**
 * Class RegisterDeviceIdValidate.php
 *
 * @package App\Core\Validates\Auth  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 02/07/22
 */
class RegisterDeviceIdValidate extends Validates
{
    public function rules()
    {
        return [
            'device-id' => 'required',
        ];
    }
}

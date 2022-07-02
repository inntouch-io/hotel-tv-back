<?php

namespace App\Core;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

/**
 * Class Validates.php
 *
 * @package App\Core  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 02/07/22
 */


abstract class Validates extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(new JsonResponse([
            'code' => 422,
            'message' => $validator->errors()->first()
        ],422));
    }

    abstract public function rules();
}

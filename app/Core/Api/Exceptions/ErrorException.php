<?php

namespace App\Core\Api\Exceptions;

use App\Core\Exceptions;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ErrorException extends Exceptions
{
    public function __construct($message = '')
    {
        parent::__construct();

        $this->message = $message;
        $this->render();
    }

    private $message = '';

    public function render()
    {
        throw new HttpResponseException(new JsonResponse([
            'code' => 500,
            'message' => $this->message,
        ],500, $this->headers));
    }
}

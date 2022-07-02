<?php

namespace App\Core\Api\Exceptions;

use App\Core\Exceptions;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ForbiddenException extends Exceptions
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
            'code' => 403,
            'message' => $this->message,
        ],403, $this->headers));
    }
}

<?php

namespace App\Core\Api\Exceptions;


use App\Core\Exceptions;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

/**
 * Class NotFoundException.php
 *
 * @package App\Core\Api\Exceptions  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 02/07/22
 */
class NotFoundException extends Exceptions
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
            'code' => 404,
            'message' => $this->message,
        ],404, $this->headers));
    }
}

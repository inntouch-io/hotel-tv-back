<?php

namespace App\Http\Controllers\Api;


use App\Core\StaticKeys;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Class ApiController.php
 *
 * @package App\Http\Controllers\Api  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 25/05/22
 */
class ApiController extends Controller
{
    public function __construct()
    {

    }
    
    private $code = 200;
    private $message = 'OK!';
    private $language = 'ru';

    private $data = null;
    private $meta = null;

    private $headers = [
        'Access-Control-Allow-Headers' => '*',
        'Access-Control-Allow-Methods' => 'GET, POST, HEAD, PUT, DELETE, OPTIONS',
        'Access-Control-Allow-Origin'  => '*',
        'Cache-Control'                => 'no-store, no-cache, must-revalidate',
    ];

    // Setters

    protected function setCode($code): void
    {
        $this->code = $code;
    }

    protected function setMessage($message): void
    {
        $this->message = $message;
    }

    protected function setData($data = null): void
    {
        $this->data = $data;
    }

    protected function setMeta($meta = null): void
    {
        $this->meta = $meta;
    }

    // Getters

    protected function getCode(): int
    {
        return $this->code;
    }

    protected function getMessage(): string
    {
        return $this->message;
    }

    protected function getLanguage(): string
    {
        return $this->language;
    }

    protected function composeData(): JsonResponse
    {
        $noCache = [
            StaticKeys::$CODE => $this->getCode(),
            StaticKeys::$MESSAGE => $this->getMessage(),
            StaticKeys::$LANGUAGE => $this->getLanguage(),
        ];

        $noCache['data'] = !is_null($this->data) ? $this->data : null;
        $noCache['meta'] = !is_null($this->meta) ? $this->meta : null;

        return new JsonResponse($noCache, $this->getCode(), $this->headers);
    }
}

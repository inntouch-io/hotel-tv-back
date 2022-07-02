<?php

namespace App\Core;

abstract class Exceptions
{
    public function __construct()
    {
    }

    protected $headers = [
        'Access-Control-Allow-Headers' => '*',
        'Access-Control-Allow-Methods' => 'GET, POST, HEAD, PUT, DELETE, OPTIONS',
        'Access-Control-Allow-Origin'  => '*',
        'Cache-Control'                => 'no-store, no-cache, must-revalidate',
    ];

    abstract public function render();
}

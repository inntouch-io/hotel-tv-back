<?php

namespace App\Core\Api;


use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Resources.php
 *
 * @package App\Core\Api  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 25/05/22
 */
class Resources extends JsonResource
{
    public string $locale = 'ru';
    public array $fields = [];
}

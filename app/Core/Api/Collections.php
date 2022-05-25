<?php

namespace App\Core\Api;


use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class Collections.php
 *
 * @package App\Core\Api  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 25/05/22
 */
class Collections extends ResourceCollection
{
    public string $locale = 'ru';
    public array $fields = [];
}

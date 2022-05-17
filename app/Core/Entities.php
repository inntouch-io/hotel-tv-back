<?php

namespace App\Core;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Entities.php
 *
 * @package App\Core  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 17/05/22
 */
abstract class Entities extends Model
{
    protected $guarded = [];

    public $timestamps = false;
}

<?php

namespace App\Core;


/**
 * Class Services.php
 *
 * @package App\Core  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 18/05/22
 */
abstract class Services
{
    public function __construct()
    {
    }

    public abstract static function getInstance();
}

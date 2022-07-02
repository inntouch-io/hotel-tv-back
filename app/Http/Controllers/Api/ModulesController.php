<?php

namespace App\Http\Controllers\Api;


use App\Core\Api\Responses\ModulesCollection;
use Domain\Modules\Services\ModuleService;

/**
 * Class ModulesController.php
 *
 * @package App\Http\Controllers\Api  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 25/05/22
 */
class ModulesController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getList(){
        $modules = ModuleService::getInstance()
            ->getVisibleItems($this->getLanguage());

        $modulesCollection = new ModulesCollection($modules);
        $modulesCollection->locale = $this->getLanguage();

        $this->setData($modulesCollection);

        return $this->composeData();
    }
}

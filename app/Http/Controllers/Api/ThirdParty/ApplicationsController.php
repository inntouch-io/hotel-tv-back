<?php

namespace App\Http\Controllers\Api\ThirdParty;


use App\Core\Api\Responses\ThirdParty\ApplicationsCollection;
use App\Http\Controllers\Api\ApiController;
use Domain\Applications\Services\ApplicationService;

/**
 * Class ApplicationsController.php
 *
 * @package App\Http\Controllers\Api\ThirdParty  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 04/07/22
 */
class ApplicationsController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {
        $apps = ApplicationService::getInstance()->list();

        $applicationsCollection = new ApplicationsCollection($apps);
        $applicationsCollection->locale = $this->getLanguage();

        $this->setData($applicationsCollection);

        return $this->composeData();
    }
}

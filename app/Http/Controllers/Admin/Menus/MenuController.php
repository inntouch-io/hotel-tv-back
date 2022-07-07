<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 04.07.2022 / 11:03
 */

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Admin\AdminController;
use Domain\Menus\Services\MenuService;

/**
 * Class MenuController
 * @package App\Http\Controllers\Admin\Menus
 */
class MenuController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $menus = MenuService::getInstance()->list();

        return view('menus.menu.index', ['menus' => $menus]);
    }

    public function create()
    {

    }
}

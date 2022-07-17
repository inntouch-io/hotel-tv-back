<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 04.07.2022 / 11:03
 */

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Admin\AdminController;
use Domain\Menus\Entities\Menu;
use Domain\Menus\Services\MenuService;
use Illuminate\Http\Request;

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
        $this->authorize('index', Menu::class);
        $menus = MenuService::getInstance()->list();

        return view('menus.menu.index', ['menus' => $menus]);
    }

    public function create()
    {
        $this->authorize('create', Menu::class);
        return view('menus.menu.create');
    }

    public function store(Request $request)
    {
        $this->authorize('store', Menu::class);
        /** @var Menu $menu */
        $menu = MenuService::getInstance()->store($request);

        return redirect()->route('admin.menus.menu.edit', ['menu' => $menu->getId()])
            ->with('success', 'Successfully added');
    }

    public function edit(int $id)
    {
        $this->authorize('edit', Menu::class);
        $menu = MenuService::getInstance()->getById($id);

        return view('menus.menu.edit', ['menu' => $menu]);
    }

    public function update(Request $request, int $id)
    {
        $this->authorize('update', Menu::class);
        /** @var Menu $menu */
        $menu = MenuService::getInstance()->getById($id);

        MenuService::getInstance()->update($menu, $request);

        return redirect()->route('admin.menus.menu.edit', ['menu' => $menu->getId()])
            ->with('success', 'Successfully saved');
    }

    public function destroy(int $id)
    {
        $this->authorize('delete', Menu::class);
        /** @var Menu $menu */
        $menu = MenuService::getInstance()->getWithInfosById($id);

        $menu->infos()->delete();
        $menu->delete();

        return redirect()->route('admin.menus.menu.index')
            ->with('success', 'Successfully deleted');
    }
}

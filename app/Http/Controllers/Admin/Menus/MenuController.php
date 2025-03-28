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
use Domain\Menus\Entities\MenuCard;
use Domain\Menus\Services\MenuService;
use Exception;
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('index', Menu::class);
        $menus = MenuService::getInstance()->list($request->all());
        $types = MenuService::getInstance()->getTypes();
        $categories = MenuService::getInstance()->getCategories();

        return view('menus.menu.index', ['menus' => $menus, 'types' => $types, 'categories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Menu::class);
        return view('menus.menu.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', Menu::class);
        /** @var Menu $menu */
        $menu = MenuService::getInstance()->store($request);

        return redirect()->route('admin.menus.menu.edit', ['menu' => $menu->getId()])
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', Menu::class);
        $menu = MenuService::getInstance()->getById($id);

        return view('menus.menu.edit', ['menu' => $menu]);
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, int $id)
    {
        $this->authorize('update', Menu::class);
        /** @var Menu $menu */
        $menu = MenuService::getInstance()->getById($id);

        MenuService::getInstance()->update($menu, $request);

        return redirect()->route('admin.menus.menu.edit', ['menu' => $menu->getId()])
            ->with('success', 'Successfully saved');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', Menu::class);
        /** @var Menu $menu */
        $menu = MenuService::getInstance()->getById($id);
        $menu->delete();

        return redirect()->route('admin.menus.menu.index')
            ->with('success', 'Successfully deleted');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function typesList()
    {
        $this->authorize('typesList', Menu::class);

        return view('menus.menu.types');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function sortingList(Request $request)
    {
        $this->authorize('sortingList', Menu::class);

        $list = MenuService::getInstance()->getByType($request->query('type'));

        return view(
            'menus.menu.sorting',
            [
                'list' => $list
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function sorting(Request $request)
    {
        $this->authorize('sorting', Menu::class);

        try {
            if ($request->isXmlHttpRequest()){
                MenuService::getInstance()->sorting($request->input('menus'));

                return response()->json(['data' => true]);
            }

            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

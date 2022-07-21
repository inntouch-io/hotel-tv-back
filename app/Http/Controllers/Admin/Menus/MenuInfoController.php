<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 12.07.2022 / 14:36
 */

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Admin\AdminController;
use Domain\Menus\Entities\MenuInfo;
use Domain\Menus\Services\MenuInfoService;
use Domain\Menus\Services\MenuService;
use Illuminate\Http\Request;

/**
 * Class MenuInfoController
 * @package App\Http\Controllers\Admin\Menus
 */
class MenuInfoController extends AdminController
{
    /**
     * MenuInfoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Request $request)
    {
        $this->authorize('create', MenuInfo::class);
        $menu = MenuService::getInstance()->getWithInfosById((int)$request->query('menu_id'));

        return view('menus.infos.create', ['menu' => $menu]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', MenuInfo::class);
        MenuInfoService::getInstance()->store($request);

        return redirect()->route('admin.menus.menu.index')
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', MenuInfo::class);
        $info = MenuInfoService::getInstance()->getById($id);

        return view(
            'menus.infos.edit',
            [
                'info' => $info
            ]
        );
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, int $id)
    {
        $this->authorize('update', MenuInfo::class);
        /** @var MenuInfo $info */
        $info = MenuInfoService::getInstance()->getById($id);

        MenuInfoService::getInstance()->update($info, $request);

        return redirect()->route('admin.menus.infos.edit', ['info' => $info->getId()])
            ->with('success', 'Successfully saved');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', MenuInfo::class);
        /** @var MenuInfo $info */
        $info = MenuInfoService::getInstance()->getById($id);

        $info->delete();

        return redirect()->route('admin.menus.menu.index')
            ->with('success', 'Successfully deleted');
    }
}

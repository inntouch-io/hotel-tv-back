<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 16.07.2022 / 01:47
 */

namespace App\Http\Controllers\Admin\Menus\Cards;

use App\Http\Controllers\Admin\AdminController;
use Domain\Menus\Entities\MenuCard;
use Domain\Menus\Entities\MenuCardInfo;
use Domain\Menus\Services\MenuCardInfoService;
use Domain\Menus\Services\MenuCardService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class MenuCardInfoController
 * @package App\Http\Controllers\Admin\Menus\Cards
 */
class MenuCardInfoController extends AdminController
{
    /**
     * MenuCardInfoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create(Request $request)
    {
        $this->authorize('create', MenuCardInfo::class);
        $card = MenuCardService::getInstance()->getWithInfos((int)$request->query('card_id'));

        return view(
            'menus.cards.infos.create',
            [
                'card' => $card
            ]
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('store', MenuCardInfo::class);
        /** @var MenuCard $card */
        $card = MenuCardService::getInstance()->getById((int)$request->query('card_id'));

        MenuCardInfoService::getInstance()->store($request);

        return redirect()->route('admin.menus.cards.card.index', ['menu_id' => $card->getMenuId()])
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', MenuCardInfo::class);
        /** @var MenuCardInfo $info */
        $info = MenuCardInfoService::getInstance()->getById($id);

        return view(
            'menus.cards.infos.edit',
            [
                'info' => $info
            ]
        );
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->authorize('update', MenuCardInfo::class);
        /** @var MenuCardInfo $info */
        $info = MenuCardInfoService::getInstance()->getById($id);

        MenuCardInfoService::getInstance()->update($info, $request);

        return redirect()->route('admin.menus.cards.infos.edit', ['info' => $info])
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->authorize('delete', MenuCardInfo::class);
        /** @var MenuCardInfo $info */
        $info = MenuCardInfoService::getInstance()->getById($id);

        $info->delete();

        return redirect()->route('admin.menus.cards.card.index', ['menu_id' => $info->card->menu])
            ->with('success', 'Successfully deleted');
    }
}

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 14.07.2022 / 13:21
 */

namespace App\Http\Controllers\Admin\Menus\Cards;

use App\Http\Controllers\Admin\AdminController;
use Domain\Menus\Entities\MenuCard;
use Domain\Menus\Services\MenuCardService;
use Domain\Menus\Services\MenuService;
use Exception;
use Illuminate\Http\Request;

/**
 * Class MenuCardController
 * @package App\Http\Controllers\Admin\Menus\Cards
 */
class MenuCardController extends AdminController
{
    /**
     * MenuCardController constructor.
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
    public function index(Request $request)
    {
        $this->authorize('index', MenuCard::class);
        $menu = MenuService::getInstance()->getWithCards((int)$request->query('menu_id'));

        return view(
            'menus.cards.card.index',
            [
                'menu' => $menu
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Request $request)
    {
        $this->authorize('create', MenuCard::class);
        $menu = MenuService::getInstance()->getById((int)$request->query('menu_id'));

        return view(
            'menus.cards.card.create',
            [
                'menu' => $menu
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', MenuCard::class);
        MenuCardService::getInstance()->store($request);

        return redirect()->route('admin.menus.cards.card.index', ['menu_id' => (int)$request->query('menu_id')])
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', MenuCard::class);
        /** @var MenuCard $card */
        $card = MenuCardService::getInstance()->getById($id);

        return view(
            'menus.cards.card.edit',
            [
                'card' => $card,
                'menu' => $card->menu
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
        $this->authorize('update', MenuCard::class);
        /** @var MenuCard $card */
        $card = MenuCardService::getInstance()->getById($id);

        MenuCardService::getInstance()->update($card, $request);

        return redirect()->route(
            'admin.menus.cards.card.edit',
            [
                'card' => $card,
                'menu' => $card->menu
            ]
        )->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', MenuCard::class);
        /** @var MenuCard $card */
        $card = MenuCardService::getInstance()->getById($id);
        $card->delete();

        return redirect()->route('admin.menus.cards.card.index', ['menu_id' => $card->getMenuId()])
            ->with('success', 'Successfully deleted');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function sortingList(Request $request)
    {
        $this->authorize('sortingList', MenuCard::class);

        $menu = MenuService::getInstance()->getWithCards((int)$request->query('menu_id'));

        return view(
            'menus.cards.card.sorting',
            [
                'menu' => $menu
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
        $this->authorize('sorting', MenuCard::class);

        try {
            if ($request->isXmlHttpRequest()) {
                MenuCardService::getInstance()->sorting($request->input('cards'));

                return response()->json(['data' => true]);
            }

            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

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

    public function index(Request $request)
    {
        $menu = MenuService::getInstance()->getWithCards((int)$request->query('menu_id'));

        return view(
            'menus.cards.card.index',
            [
                'menu' => $menu
            ]
        );
    }

    public function create(Request $request)
    {
        $menu = MenuService::getInstance()->getById((int)$request->query('menu_id'));

        return view(
            'menus.cards.card.create',
            [
                'menu' => $menu
            ]
        );
    }

    public function store(Request $request)
    {
        MenuCardService::getInstance()->store($request);

        return redirect()->route('admin.menus.cards.card.index', ['menu_id' => (int)$request->query('menu_id')])
            ->with('success', 'Successfully added');
    }

    public function edit(int $id)
    {
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

    public function update(Request $request, int $id)
    {
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

    public function destroy(int $id)
    {
        /** @var MenuCard $card */
        $card = MenuCardService::getInstance()->getWithInfos($id);

        // TODO need delete $card->image()->delete()
        $card->infos()->delete();
        $card->delete();

        return redirect()->route('admin.menus.cards.card.index', ['menu_id' => $card->getMenuId()])
            ->with('success', 'Successfully deleted');
    }
}

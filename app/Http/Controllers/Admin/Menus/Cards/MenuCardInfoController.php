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

    public function create(Request $request)
    {
        $card = MenuCardService::getInstance()->getWithInfos((int)$request->query('card_id'));

        return view(
            'menus.cards.infos.create',
            [
                'card' => $card
            ]
        );
    }

    public function store(Request $request)
    {
        /** @var MenuCard $card */
        $card = MenuCardService::getInstance()->getById((int)$request->query('card_id'));

        MenuCardInfoService::getInstance()->store($request);

        return redirect()->route('admin.menus.cards.card.index', ['menu_id' => $card->getMenuId()])
            ->with('success', 'Successfully added');
    }

    public function edit(int $id)
    {
        /** @var MenuCardInfo $info */
        $info = MenuCardInfoService::getInstance()->getById($id);

        return view(
            'menus.cards.infos.edit',
            [
                'info' => $info
            ]
        );
    }

    public function update(Request $request, int $id)
    {
        /** @var MenuCardInfo $info */
        $info = MenuCardInfoService::getInstance()->getById($id);

        MenuCardInfoService::getInstance()->update($info, $request);

        return redirect()->route('admin.menus.cards.infos.edit', ['info' => $info])
            ->with('success', 'Successfully added');
    }

    public function destroy(int $id)
    {
        /** @var MenuCardInfo $info */
        $info = MenuCardInfoService::getInstance()->getById($id);

        $info->delete();

        return redirect()->route('admin.menus.cards.card.index', ['menu_id' => $info->card->menu])
            ->with('success', 'Successfully deleted');
    }
}

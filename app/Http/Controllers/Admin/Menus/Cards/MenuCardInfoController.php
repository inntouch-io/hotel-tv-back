<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 16.07.2022 / 01:47
 */

namespace App\Http\Controllers\Admin\Menus\Cards;

use App\Http\Controllers\Admin\AdminController;
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

    }
}

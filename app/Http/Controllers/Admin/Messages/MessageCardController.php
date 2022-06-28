<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 28.06.2022 / 15:29
 */

namespace App\Http\Controllers\Admin\Messages;

use App\Http\Controllers\Admin\AdminController;
use Domain\Messages\Services\MessageCardService;

/**
 * Class MessageCardController
 * @package App\Http\Controllers\Admin\Messages
 */
class MessageCardController extends AdminController
{
    /**
     * MessageCardController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index(int $id)
    {
        $cards = MessageCardService::getInstance()->list($id);

        return view(
            'messages.message.cards.index',
            [
                'cards' => $cards
            ]
        );
    }
}

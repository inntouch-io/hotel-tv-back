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
use Domain\Messages\Services\MessageService;
use Illuminate\Http\Request;

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
        $message = MessageService::getInstance()->getWithCards($id);

        return view(
            'messages.message.cards.index',
            [
                'message' => $message
            ]
        );
    }

    public function create(int $id)
    {
        $message = MessageService::getInstance()->getById($id);

        return view(
            'messages.message.cards.create',
            [
                'message' => $message
            ]
        );
    }

    public function store(Request $request, int $id)
    {
        $message = MessageService::getInstance()->getWithCards($id);

        MessageCardService::getInstance()->store($message, $request);

        return redirect()->route('admin.messages.message.cards.index', ['id' => $id]);
    }
}

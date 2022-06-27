<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.06.2022 / 16:15
 */

namespace App\Http\Controllers\Admin\Messages;

use App\Http\Controllers\Admin\AdminController;
use Domain\Messages\Services\MessageService;

/**
 * Class MessageController
 * @package App\Http\Controllers\Admin\Messages
 */
class MessageController extends AdminController
{
    /**
     * MessageController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $messages = MessageService::getInstance()->list();

        return view('messages.index', ['messages' => $messages]);
    }


}

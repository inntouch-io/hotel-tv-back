<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.06.2022 / 16:15
 */

namespace App\Http\Controllers\Admin\Messages;

use App\Http\Controllers\Admin\AdminController;
use Domain\Messages\Entities\Message;
use Domain\Messages\Services\MessageService;
use Exception;
use Illuminate\Http\Request;

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
        $this->authorize('index', Message::class);
        $messages = MessageService::getInstance()->list();

        return view('messages.message.index', ['messages' => $messages]);
    }

    public function edit(int $id)
    {
        $this->authorize('edit', Message::class);
        $message = MessageService::getInstance()->getById($id);

        return view('messages.message.edit', ['message' => $message]);
    }

    public function update(Request $request, int $id)
    {
        $this->authorize('update', Message::class);
        $message = MessageService::getInstance()->getById($id);

        try {
            MessageService::getInstance()->update($message, $request);

            return redirect()->route('admin.messages.message.edit', ['id' => $message->getId()])
                ->with('success', 'Успешно сохранено');

        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

}

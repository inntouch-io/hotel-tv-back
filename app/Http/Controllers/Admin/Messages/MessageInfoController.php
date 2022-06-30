<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 27.06.2022 / 15:27
 */

namespace App\Http\Controllers\Admin\Messages;

use App\Http\Controllers\Admin\AdminController;
use Domain\Messages\Entities\MessageInfo;
use Domain\Messages\Services\MessageInfoService;
use Domain\Messages\Services\MessageService;
use Exception;
use Illuminate\Http\Request;

/**
 * Class MessageInfoController
 * @package App\Http\Controllers\Admin\Messages
 */
class MessageInfoController extends AdminController
{
    /**
     * MessageInfoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //

    }

    public function show()
    {
        //
    }

    public function create(Request $request)
    {
        $this->authorize('create', MessageInfo::class);
        $message = MessageService::getInstance()->getById((int)$request->query('message_id'));

        return view('messages.infos.create', ['message' => $message]);
    }

    public function store(Request $request)
    {
        $this->authorize('store', MessageInfo::class);
        $message = MessageService::getInstance()->getById((int)$request->query('message_id'));

        try {
            /** @var MessageInfo $messageInfo */
            $messageInfo = MessageInfoService::getInstance()->add($message, $request);

            return redirect()->route('admin.messages.message.infos.edit', ['info' => $messageInfo->getId()])
                ->with('success', 'Успешно сохранено');
        }catch (Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function edit(int $id)
    {
        $this->authorize('edit', MessageInfo::class);
        $messageInfo = MessageInfoService::getInstance()->getById($id);

        return view('messages.infos.edit', ['messageInfo' => $messageInfo]);
    }

    public function update(Request $request, int $id)
    {
        $this->authorize('update', MessageInfo::class);
        /** @var MessageInfo $messageInfo */
        $messageInfo = MessageInfoService::getInstance()->getById($id);

        try {
            MessageInfoService::getInstance()->update($messageInfo, $request);

            return redirect()->route('admin.messages.message.infos.edit', ['info' => $messageInfo->getId()])
                ->with('success', 'Успешно сохранено');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function destroy($id)
    {
        $this->authorize('delete', MessageInfo::class);

        /** @var MessageInfo $messageInfo */
        $messageInfo = MessageInfoService::getInstance()->getById($id);

        try {
            $messageInfo->delete();

            return redirect()->route('admin.messages.message.index')
                ->with('success', 'Успешно удалено');
        }catch (Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

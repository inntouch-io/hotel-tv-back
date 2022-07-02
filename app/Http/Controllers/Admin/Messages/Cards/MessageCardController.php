<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 28.06.2022 / 15:29
 */

namespace App\Http\Controllers\Admin\Messages\Cards;

use App\Http\Controllers\Admin\AdminController;
use Domain\Messages\Entities\Message;
use Domain\Messages\Entities\MessageCard;
use Domain\Messages\Services\MessageCardService;
use Domain\Messages\Services\MessageService;
use Illuminate\Http\Request;
use RuntimeException;
use function redirect;
use function view;

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

    public function index(Request $request)
    {
        $message = MessageService::getInstance()->getWithCards((int)$request->query('message_id'));

        return view(
            'messages.cards.card.index',
            [
                'message' => $message
            ]
        );
    }

    public function create(Request $request)
    {
        $message = MessageService::getInstance()->getById((int)$request->query('message_id'));

        return view(
            'messages.cards.card.create',
            [
                'message' => $message
            ]
        );
    }

    public function store(Request $request)
    {
        /** @var Message $message */
        $message = MessageService::getInstance()->getWithCards((int)$request->query('message_id'));

        MessageCardService::getInstance()->store($message, $request);

        return redirect()->route('admin.messages.cards.card.index', ['message_id' => $message->getId()]);
    }

    public function edit(int $id)
    {
        /** @var MessageCard $card */
        $card = MessageCardService::getInstance()->getById($id);

        return view(
            'messages.cards.card.edit',
            [
                'card'    => $card,
                'message' => $card->message
            ]
        );
    }

    public function update(Request $request, int $id)
    {
        /** @var MessageCard $card */
        $card = MessageCardService::getInstance()->getById($id);

        MessageCardService::getInstance()->update($card, $request);

        return redirect()->route('admin.messages.cards.card.edit', ['card' => $card->getId()])
            ->with('success', 'Success');
    }

    public function show()
    {
        //
    }

    public function destroy(int $id)
    {
        /** @var MessageCard $card */
        $card = MessageCardService::getInstance()->getWithInfos($id);

        if (is_null($card)) {
            throw new RuntimeException('Card not found');
        }

        $card->infos()->delete();
        $card->delete();

        return redirect()->route('admin.messages.cards.card.index', ['message_id' => $card->getMessageId()])
            ->with('success', "Success");
    }
}

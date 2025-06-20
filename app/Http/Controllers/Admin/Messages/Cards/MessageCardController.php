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
use Exception;
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
        $this->authorize('index', MessageCard::class);
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
        $this->authorize('create', MessageCard::class);
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
        $this->authorize('store', MessageCard::class);
        /** @var Message $message */
        $message = MessageService::getInstance()->getWithCards((int)$request->query('message_id'));

        MessageCardService::getInstance()->store($message, $request);

        return redirect()->route('admin.messages.cards.card.index', ['message_id' => $message->getId()]);
    }

    public function edit(int $id)
    {
        $this->authorize('edit', MessageCard::class);
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
        $this->authorize('update', MessageCard::class);
        /** @var MessageCard $card */
        $card = MessageCardService::getInstance()->getById($id);

        MessageCardService::getInstance()->update($card, $request);

        return redirect()->route('admin.messages.cards.card.edit', ['card' => $card->getId()])
            ->with('success', 'Success');
    }

    public function destroy(int $id)
    {
        $this->authorize('delete', MessageCard::class);
        /** @var MessageCard $card */
        $card = MessageCardService::getInstance()->getById($id);

        if (is_null($card)) {
            throw new RuntimeException('Card not found');
        }

        $card->delete();

        return redirect()->route('admin.messages.cards.card.index', ['message_id' => $card->getMessageId()])
            ->with('success', "Success");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function sortingList(Request $request)
    {
        $this->authorize('sortingList', MessageCard::class);

        $message = MessageService::getInstance()->getWithCards((int)$request->query('message_id'));

        return view(
            'messages.cards.card.sorting',
            [
                'message' => $message
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
        $this->authorize('sorting', MessageCard::class);

        try {
            if ($request->isXmlHttpRequest()) {
                MessageCardService::getInstance()->sorting($request->input('cards'));

                return response()->json(['data' => true]);
            }

            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 13:35
 */

namespace App\Http\Controllers\Admin\Messages\Cards;

use App\Http\Controllers\Admin\AdminController;
use Domain\Messages\Entities\MessageCardInfo;
use Domain\Messages\Services\MessageCardInfoService;
use Domain\Messages\Services\MessageCardService;
use Exception;
use Illuminate\Http\Request;

/**
 * Class MessageCardInfoController
 * @package App\Http\Controllers\Admin\Messages\Cards
 */
class MessageCardInfoController extends AdminController
{
    /**
     * MessageCardInfoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Request $request)
    {
        $this->authorize('create', MessageCardInfo::class);
        $card = MessageCardService::getInstance()->getWithInfos((int)$request->query('card_id'));

        return view('messages.cards.infos.create', ['card' => $card]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', MessageCardInfo::class);
        $card = MessageCardService::getInstance()->getWithInfos((int)$request->query('card_id'));

        try {
            /** @var MessageCardInfo $cardInfo */
            $cardInfo = MessageCardInfoService::getInstance()->add($card, $request);

            return redirect()->route('admin.messages.cards.infos.edit', ['info' => $cardInfo->getId()])
                ->with('success', 'Успешно сохранено');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', MessageCardInfo::class);
        /** @var MessageCardInfo $cardInfo */
        $cardInfo = MessageCardInfoService::getInstance()->getById($id);

        return view('messages.cards.infos.edit', ['cardInfo' => $cardInfo]);
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, int $id)
    {
        $this->authorize('update', MessageCardInfo::class);
        /** @var MessageCardInfo $cardInfo */
        $cardInfo = MessageCardInfoService::getInstance()->getById($id);

        MessageCardInfoService::getInstance()->update($cardInfo, $request);

        return redirect()->route('admin.messages.cards.infos.edit', ['info' => $cardInfo->getId()])
            ->with('success', 'Success');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', MessageCardInfo::class);
        /** @var MessageCardInfo $cardInfo */
        $cardInfo = MessageCardInfoService::getInstance()->getById($id);

        $cardInfo->delete();

        return redirect()->route('admin.messages.cards.card.index', ['message_id' => $cardInfo->card->getMessageId()])
            ->with('success', 'Successfully deleted');
    }
}

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

    public function create(Request $request)
    {
        $card = MessageCardService::getInstance()->getWithInfos((int)$request->query('card_id'));

        return view('messages.cards.infos.create', ['card' => $card]);
    }

    public function store(Request $request)
    {
        $card = MessageCardService::getInstance()->getWithInfos((int)$request->query('card_id'));

        try {
            /** @var MessageCardInfo $cardInfo */
            $cardInfo = MessageCardInfoService::getInstance()->add($card, $request);

            return redirect()->route('admin.messages.cards.infos.edit', ['info' => $cardInfo->getId()])
                ->with('success', 'Успешно сохранено');
        }catch (Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function edit(int $id)
    {
        /** @var MessageCardInfo $cardInfo */
        $cardInfo = MessageCardInfoService::getInstance()->getById($id);

        return view('messages.cards.infos.edit', ['cardInfo' => $cardInfo]);
    }

    public function update(Request $request, int $id)
    {

    }
}

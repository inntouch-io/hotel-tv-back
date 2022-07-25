<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 28.06.2022 / 15:47
 */

namespace Domain\Messages\Services;

use Domain\Images\Entities\Image;
use Domain\Images\Services\ImageService;
use Domain\Messages\Builders\MessageCardBuilder;
use Domain\Messages\DTO\MessageCardDto;
use Domain\Messages\Entities\Message;
use Domain\Messages\Entities\MessageCard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use RuntimeException;

/**
 * Class MessageCardService
 * @package Domain\Messages\Services
 */
class MessageCardService
{
    const CATALOG = 'messageCards';

    protected MessageCardBuilder $builder;

    /**
     * @param MessageCardBuilder $messageCardBuilder
     */
    public function __construct(MessageCardBuilder $messageCardBuilder)
    {
        $this->builder = $messageCardBuilder;
    }

    /**
     * @return MessageCardService
     */
    public static function getInstance(): MessageCardService
    {
        return new static(MessageCardBuilder::getInstance());
    }

    protected function validator(Request $request)
    {
        return $request->validate(
            [
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'isVisible' => 'nullable|integer'
            ],
            [
                'required' => 'Поле :attribute обязательно',
            ]
        );
    }

    public function getItems(Request $request, $locale = 'ru')
    {
        $messageId = $request->input('messageId');

        return $this->builder->getItems(function (Builder $builder) use ($messageId, $locale) {
            return $builder
                ->with('image')
                ->where('message_cards.message_id', '=', $messageId)
                ->where('message_cards.is_visible', '=', 1)
                ->join('message_card_infos', 'message_card_infos.card_id', '=', 'message_cards.id')
                ->where('message_card_infos.locale', '=', $locale)
                ->select([
                    'message_cards.*',
                    'message_card_infos.title',
                    'message_card_infos.description',
                    'message_card_infos.subDescription',
                ])
                ->distinct();
        }, $request->input('itemsPerPage', 18));
    }

    public function store(Message $message, Request $request)
    {
        $data = $this->validator($request);

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);
        } else {
            throw new RuntimeException('Image not found');
        }

        if (is_null($card = $message->cards()->latest('order_position')->first())) {
            $order_position = 1;
        } else {
            $order_position = (int)$card['order_position'] + 1;
        }

        $this->builder->store(new MessageCardDto(
            $image->getId(),
            isset($data['isVisible']) ? 1 : 0,
            $order_position,
            $message->getId()
        ));
    }

    public function getById(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with(['image', 'message']);
        });
    }

    public function getWithInfos(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with(['infos', 'message']);
        });
    }

    public function update(MessageCard $card, Request $request)
    {
        $data = $request->validate(
            [
                'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'isVisible' => 'nullable|int'
            ],
            [
                'required' => 'Поле :attribute обязательно',
            ]
        );

        $image_id = $card->image->getId();

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);
            $image_id = $image->getId();
        }

        $this->builder->update($card, new MessageCardDto(
            $image_id,
            isset($data['isVisible']) ? 1 : 0,
        ));
    }

    public function sorting(array $cards = [])
    {
        foreach ($cards as $index => $data) {
            MessageCard::query()->whereKey((int)$data['id'])->update(
                [
                    'order_position' => ($index + 1)
                ]
            );
        }
    }
}

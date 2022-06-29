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
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'required' => 'Поле :attribute обязательно',
            ]
        );
    }

    public function store(Message $message, Request $request)
    {
        $data = $this->validator($request);

        dd($data);

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);
        } else {
            throw new RuntimeException('Image not found');
        }

        $order_position = $message->cards->count() + 1;

        $this->builder->store(new MessageCardDto(
            $image->getId(),
            isset($data['is_visible']) ? 1 : 0,
            $order_position,
            $message->getId()
        ));

    }
}

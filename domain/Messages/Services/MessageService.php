<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.06.2022 / 16:20
 */

namespace Domain\Messages\Services;

use Domain\Images\Builders\ImageBuilder;
use Domain\Images\Entities\Image;
use Domain\Images\Services\ImageService;
use Domain\Messages\Builders\MessageBuilder;
use Domain\Messages\DTO\MessageCreateDto;
use Domain\Messages\DTO\MessageUpdateDto;
use Domain\Messages\Entities\Message;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use RuntimeException;

/**
 * Class MessageService
 * @package Domain\Messages\Services
 */
class MessageService
{
    const CATALOG = 'messages';

    protected MessageBuilder $builder;

    /**
     * @param MessageBuilder $builder
     */
    public function __construct(MessageBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return MessageService
     */
    public static function getInstance(): MessageService
    {
        return new static(MessageBuilder::getInstance());
    }

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->builder->list(function (Builder $builder) {
            return $builder
                ->with(
                    [
                        'infos',
                        'image'
                    ]
                )
                ->orderBy('order_position');
        });
    }

    public function getById(int $id)
    {
        $message = $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder
                ->whereKey($id)
                ->with(
                    [
                        'image',
                        'infos'
                    ]
                );
        });

        if (is_null($message)) {
            throw new RuntimeException('Message not found', 404);
        }

        return $message;
    }

    public function getWithCards(int $id)
    {
        $message = $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder
                ->whereKey($id)
                ->with(
                    [
                        'image',
                        'cards' => function ($query) {
                            return $query->orderBy('order_position')->get();
                        }
                    ]
                );
        });

        if (is_null($message)) {
            throw new RuntimeException('Message not found', 404);
        }

        return $message;
    }

    protected function validator(Request $request): array
    {
        return $request->validate(
            [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        );
    }

    public function update(Message $message, Request $request)
    {
        $data = $this->validator($request);

        $imageId = $message->getImageId();

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);

            $imageId = $image->getId();
        }

        $this->builder->update($message, new MessageUpdateDto(
            $imageId,
            isset($data['isVisible']) ? 1 : 0,
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'required' => 'Поле :attribute обязательно'
            ]
        );

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);
        } else {
            throw new RuntimeException('Image not found');
        }

        $order_position = Message::query()->latest()->first()['order_position'] + 1;

        return $this->builder->store(new MessageCreateDto(
            $image->getId(),
            isset($data['isVisible']) ? 1 : 0,
            $order_position,
        ));
    }
}

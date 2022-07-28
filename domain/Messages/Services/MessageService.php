<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.06.2022 / 16:20
 */

namespace Domain\Messages\Services;

use Domain\Images\Entities\Image;
use Domain\Images\Services\ImageService;
use Domain\Messages\Builders\MessageBuilder;
use Domain\Messages\DTO\MessageDto;
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

    public function getItems(Request $request, $locale = 'ru')
    {
        return $this->builder->getItems(function (Builder $builder) use ($request, $locale) {
            return $builder
                ->with('image')
                ->where('messages.is_visible', '=', 1)
                ->join('message_infos', 'messages.id', '=', 'message_infos.message_id')
                ->where('message_infos.locale', '=', $locale)
                ->orderBy('messages.order_position', 'asc')
                ->select([
                    'messages.*',
                    'message_infos.title',
                    'message_infos.description',
                    'message_infos.longDescription',
                ])
                ->distinct();
        }, $request->input('itemsPerPage', 18));
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
                'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'isVisible' => 'nullable|integer',
                'category'  => 'required|in:' . implode(',', array_keys(config('app.message_categories')))
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

        $this->builder->update($message, new MessageDto(
            $imageId,
            isset($data['isVisible']) ? 1 : 0,
            $data['category']
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'isVisible' => 'nullable|integer',
                'category'  => 'required|in:' . implode(',', array_keys(config('app.message_categories')))
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

        $message = $this->builder->takeBy(function (Builder $builder) {
            return $builder->latest('order_position');
        });

        if (is_null($message)) {
            $order_position = 1;
        } else {
            $order_position = (int)$message['order_position'] + 1;
        }

        return $this->builder->store(new MessageDto(
            $image->getId(),
            isset($data['isVisible']) ? 1 : 0,
            $data['category'],
            $order_position,
        ));
    }

    /**
     * @param array $messages
     * @return void
     */
    public function sorting(array $messages = [])
    {
        foreach ($messages as $index => $data) {
            Message::query()->whereKey((int)$data['id'])->update(
                [
                    'order_position' => ($index + 1)
                ]
            );
        }
    }
}

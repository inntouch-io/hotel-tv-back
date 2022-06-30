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
use Domain\Messages\Builders\MessageBuilder;
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
                ->orderBy('id');
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
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = md5(time());
            $request->file('image')->storeAs('public/messages', $imageName . '.' . $extension);

            /** @var Image $image */
            $image = ImageBuilder::getInstance()->save(
                "storage/messages/",
                $imageName,
                $extension
            );

            $imageId = $image->getId();
        }

        $this->builder->update($message, $imageId);
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
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = md5(time());
            $request->file('image')->storeAs('public/messages', $imageName . '.' . $extension);

            /** @var Image $image */
            $image = ImageBuilder::getInstance()->save(
                "storage/messages/",
                $imageName,
                $extension
            );

            $imageId = $image->getId();
        } else {
            throw new RuntimeException('Image not found');
        }

        return $this->builder->store($imageId);
    }
}

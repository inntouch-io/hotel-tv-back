<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 27.06.2022 / 15:29
 */

namespace Domain\Messages\Services;

use Domain\Messages\Builders\MessageInfoBuilder;
use Domain\Messages\DTO\MessageInfoCreateDto;
use Domain\Messages\DTO\MessageInfoDto;
use Domain\Messages\Entities\Message;
use Domain\Messages\Entities\MessageInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MessageInfoService
{
    protected MessageInfoBuilder $builder;

    public function __construct(MessageInfoBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return MessageInfoService
     */
    public static function getInstance(): MessageInfoService
    {
        return new static(MessageInfoBuilder::getInstance());
    }

    public function getById(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id);
        });
    }

    public function validator(Request $request): array
    {
        return $request->validate(
            [
                'title'           => 'required|string',
                'description'     => 'required|string',
                'longDescription' => 'required|string'
            ]
        );
    }

    public function update(MessageInfo $messageInfo, Request $request)
    {
        $data = $this->validator($request);

        $this->builder->update($messageInfo, new MessageInfoDto(
            $data['title'],
            $data['description'],
            $data['longDescription']
        ));
    }

    public function add(Message $message, Request $request)
    {
        $data = $request->validate(
            [
                'title'           => 'required|string',
                'description'     => 'required|string',
                'longDescription' => 'required|string',
                'locale'            => 'required|string',
            ]
        );

        return $this->builder->add(new MessageInfoCreateDto(
            $data['title'],
            $data['description'],
            $data['longDescription'],
            $data['locale'],
            $message->getId()
        ));
    }
}

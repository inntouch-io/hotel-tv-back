<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 14:26
 */

namespace Domain\Messages\Services;

use Domain\Messages\Builders\MessageCardInfoBuilder;
use Domain\Messages\DTO\MessageCardInfoCreateDto;
use Domain\Messages\DTO\MessageCardInfoUpdateDto;
use Domain\Messages\Entities\MessageCard;
use Domain\Messages\Entities\MessageCardInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class MessageCardInfoService
 * @package Domain\Messages\Services
 */
class MessageCardInfoService
{
    protected MessageCardInfoBuilder $builder;

    /**
     * @param MessageCardInfoBuilder $builder
     */
    public function __construct(MessageCardInfoBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return MessageCardInfoService
     */
    public static function getInstance(): MessageCardInfoService
    {
        return new static(MessageCardInfoBuilder::getInstance());
    }

    public function getById(int $id)
    {
        return $this->builder->getById(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with('card');
        });
    }

    public function add(MessageCard $card, Request $request)
    {
        $data = $request->validate(
            [
                'title'          => 'required|string',
                'description'    => 'required|string',
                'subDescription' => 'required|string',
                'locale'           => 'required|string',
            ]
        );

        return $this->builder->add(new MessageCardInfoCreateDto(
            $data['title'],
            $data['description'],
            $data['subDescription'],
            $data['locale'],
            $card->getId()
        ));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validator(Request $request): array
    {
        return $request->validate(
            [
                'title'          => 'required|string',
                'description'    => 'required|string',
                'subDescription' => 'required|string'
            ]
        );
    }

    public function update(MessageCardInfo $cardInfo, Request $request)
    {
        $data = $this->validator($request);

        $this->builder->update($cardInfo, new MessageCardInfoUpdateDto(
            $data['title'],
            $data['description'],
            $data['subDescription']
        ));
    }
}

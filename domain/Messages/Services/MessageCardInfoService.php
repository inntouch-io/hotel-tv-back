<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 14:26
 */

namespace Domain\Messages\Services;

use Domain\Messages\Builders\MessageCardInfoBuilder;
use Domain\Messages\DTO\MessageCards\MessageCardInfoCreateDto;
use Domain\Messages\Entities\MessageCard;
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
        return $this->builder->getById(function (Builder $builder) use ($id){
            return $builder->whereKey($id)->with('card');
        });
    }

    public function add(MessageCard $card, Request $request)
    {
        $data = $request->validate(
            [
                'title'           => 'required|string',
                'description'     => 'required|string',
                'subDescription' => 'required|string',
                'lang'            => 'required|string',
            ]
        );

        return $this->builder->add(new MessageCardInfoCreateDto(
            $data['title'],
            $data['description'],
            $data['subDescription'],
            $data['lang'],
            $card->getId()
        ));
    }
}

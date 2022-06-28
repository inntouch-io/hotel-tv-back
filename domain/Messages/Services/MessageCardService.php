<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 28.06.2022 / 15:47
 */

namespace Domain\Messages\Services;

use Domain\Messages\Builders\MessageCardBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class MessageCardService
 * @package Domain\Messages\Services
 */
class MessageCardService
{
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

    public function list(int $id)
    {
        return $this->builder->list(function (Builder $builder) use ($id) {
            return $builder->with(
                [
                    'infos',
                    'image'
                ]
            )->where('message_id', '=', $id)
                ->where('is_visible', '=', 1)
                ->orderBy('order_position');
        });
    }
}

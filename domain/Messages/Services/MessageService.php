<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.06.2022 / 16:20
 */

namespace Domain\Messages\Services;

use Domain\Messages\Builders\MessageBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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
}

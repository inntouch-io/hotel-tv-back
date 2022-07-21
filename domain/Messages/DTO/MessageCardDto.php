<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.06.2022 / 13:51
 */

namespace Domain\Messages\DTO;

/**
 * Class MessageCardDto
 * @package Domain\Messages\DTO
 *
 * @property int      $image_id
 * @property int      $is_visible
 * @property int|null $order_position
 * @property int|null $message_id
 */
class MessageCardDto
{
    /** @var int $image_id */
    protected int $image_id;

    /** @var int $is_visible */
    protected int $is_visible;

    /** @var int|null $order_position */
    protected ?int $order_position;

    /** @var int|null $message_id */
    protected ?int $message_id;

    public function __construct(
        int $image_id,
        int $is_visible,
        int $order_position = null,
        int $message_id = null
    )
    {
        $this->image_id = $image_id;
        $this->is_visible = $is_visible;
        $this->order_position = $order_position;
        $this->message_id = $message_id;
    }

    // Getters

    /**
     * @return int
     */
    public function getImageId(): int
    {
        return $this->image_id;
    }

    /**
     * @return int
     */
    public function getIsVisible(): int
    {
        return $this->is_visible;
    }

    /**
     * @return int|null
     */
    public function getOrderPosition(): ?int
    {
        return $this->order_position;
    }

    /**
     * @return int|null
     */
    public function getMessageId(): ?int
    {
        return $this->message_id;
    }
}

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 04.07.2022 / 12:25
 */

namespace Domain\Messages\DTO;

class MessageUpdateDto
{
    /** @var int $image_id */
    protected int $image_id;

    /** @var int $is_visible */
    protected int $is_visible;

    public function __construct(
        int $image_id,
        int $is_visible
    )
    {
        $this->image_id = $image_id;
        $this->is_visible = $is_visible;
    }

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
}

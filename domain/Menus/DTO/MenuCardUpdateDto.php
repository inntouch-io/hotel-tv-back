<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 14.07.2022 / 18:27
 */

namespace Domain\Menus\DTO;

/**
 * Class MenuCardUpdateDto
 * @package Domain\Menus\DTO
 */
class MenuCardUpdateDto
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
}

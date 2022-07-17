<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 17.07.2022 / 15:02
 */

namespace Domain\Menus\DTO;

/**
 * Class MenuCardInfoUpdateDto
 * @package Domain\Menus\DTO
 */
class MenuCardInfoUpdateDto
{
    /** @var string $title */
    protected string $title;

    /** @var string $description */
    protected string $description;

    /** @var string $subDescription */
    protected string $subDescription;

    public function __construct(
        string $title,
        string $description,
        string $subDescription
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->subDescription = $subDescription;
    }

    // Getters

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getSubDescription(): string
    {
        return $this->subDescription;
    }
}

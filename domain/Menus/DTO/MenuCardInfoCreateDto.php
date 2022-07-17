<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 16.07.2022 / 22:51
 */

namespace Domain\Menus\DTO;

/**
 * Class MenuCardInfoCreateDto
 * @package Domain\Menus\DTO
 */
class MenuCardInfoCreateDto
{
    /** @var int $card_id */
    protected int $card_id;

    /** @var string $title */
    protected string $title;

    /** @var string $description */
    protected string $description;

    /** @var string $subDescription */
    protected string $subDescription;

    /** @var string $locale */
    protected string $locale;

    public function __construct(
        int    $card_id,
        string $title,
        string $description,
        string $subDescription,
        string $locale
    )
    {
        $this->card_id = $card_id;
        $this->title = $title;
        $this->description = $description;
        $this->subDescription = $subDescription;
        $this->locale = $locale;
    }

    // Getters

    /**
     * @return int
     */
    public function getCardId(): int
    {
        return $this->card_id;
    }

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

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }
}

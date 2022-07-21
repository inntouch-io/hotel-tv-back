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
 *
 * @property string      $title
 * @property string      $description
 * @property string      $subDescription
 * @property int|null    $card_id
 * @property string|null $locale
 */
class MenuCardInfoDto
{
    /** @var string $title */
    protected string $title;

    /** @var string $description */
    protected string $description;

    /** @var string $subDescription */
    protected string $subDescription;

    /** @var int|null $card_id */
    protected ?int $card_id;

    /** @var string|null $locale */
    protected ?string $locale;

    public function __construct(
        string $title,
        string $description,
        string $subDescription,
        int    $card_id = null,
        string $locale = null
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->subDescription = $subDescription;
        $this->card_id = $card_id;
        $this->locale = $locale;
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

    /**
     * @return int|null
     */
    public function getCardId(): ?int
    {
        return $this->card_id;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
}

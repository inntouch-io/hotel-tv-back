<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 15:33
 */

namespace Domain\Messages\DTO;

/**
 * Class MessageCardInfoCreateDto
 * @package Domain\Messages\DTO
 *
 * @property string      $title
 * @property string      $description
 * @property string      $subDescription
 * @property string|null $locale
 * @property int|null    $card_id
 */
class MessageCardInfoDto
{
    /** @var string */
    protected string $title;

    /** @var string */
    protected string $description;

    /** @var string */
    protected string $subDescription;

    /** @var string|null */
    protected ?string $locale;

    /** @var int|null */
    protected ?int $card_id;

    public function __construct(
        string $title,
        string $description,
        string $subDescription,
        string $locale = null,
        int    $card_id = null
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->subDescription = $subDescription;
        $this->locale = $locale;
        $this->card_id = $card_id;
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
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @return int|null
     */
    public function getCardId(): ?int
    {
        return $this->card_id;
    }
}

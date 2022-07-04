<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 15:33
 */

namespace Domain\Messages\DTO;

class MessageCardInfoCreateDto
{
    /** @var string */
    protected string $title;

    /** @var string */
    protected string $description;

    /** @var string */
    protected string $subDescription;

    /** @var string */
    protected string $locale;

    /** @var int */
    protected int $card_id;

    public function __construct(
        string $title,
        string $description,
        string $subDescription,
        string $locale,
        int    $card_id
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
     * @return int
     */
    public function getCardId(): int
    {
        return $this->card_id;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }
}

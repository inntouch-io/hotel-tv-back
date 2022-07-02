<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 15:33
 */

namespace Domain\Messages\DTO\MessageCards;

class MessageCardInfoCreateDto
{
    /** @var string */
    protected string $title;

    /** @var string */
    protected string $description;

    /** @var string */
    protected string $subDescription;

    /** @var string */
    protected string $lang;

    /** @var int */
    protected int $card_id;

    public function __construct(
        string $title,
        string $description,
        string $subDescription,
        string $lang,
        int    $card_id
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->subDescription = $subDescription;
        $this->lang = $lang;
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
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @return int
     */
    public function getCardId(): int
    {
        return $this->card_id;
    }
}

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 28.06.2022 / 13:13
 */

namespace Domain\Messages\DTO;

/**
 * Class MessageInfoCreateDto
 * @package Domain\Messages\DTO
 */
class MessageInfoCreateDto
{
    /** @var string */
    protected string $title;

    /** @var string */
    protected string $description;

    /** @var string */
    protected string $longDescription;

    /** @var string */
    protected string $locale;

    /** @var int */
    protected int $message_id;

    public function __construct(
        string $title,
        string $description,
        string $longDescription,
        string $locale,
        int    $message_id
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->longDescription = $longDescription;
        $this->locale = $locale;
        $this->message_id = $message_id;
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
    public function getLongDescription(): string
    {
        return $this->longDescription;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }
}

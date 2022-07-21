<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 28.06.2022 / 13:13
 */

namespace Domain\Messages\DTO;

/**
 * Class MessageInfoDto
 * @package Domain\Messages\DTO
 *
 * @property string      $title
 * @property string      $description
 * @property string      $longDescription
 * @property string|null $locale
 * @property int|null    $message_id
 */
class MessageInfoDto
{
    /** @var string */
    protected string $title;

    /** @var string */
    protected string $description;

    /** @var string */
    protected string $longDescription;

    /** @var string|null */
    protected ?string $locale;

    /** @var int|null */
    protected ?int $message_id;

    public function __construct(
        string $title,
        string $description,
        string $longDescription,
        string $locale = null,
        int    $message_id = null
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->longDescription = $longDescription;
        $this->locale = $locale;
        $this->message_id = $message_id;
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
    public function getLongDescription(): string
    {
        return $this->longDescription;
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
    public function getMessageId(): ?int
    {
        return $this->message_id;
    }
}

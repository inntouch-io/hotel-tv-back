<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 27.06.2022 / 16:04
 */

namespace Domain\Messages\DTO;

/**
 * Class MessageInfoDto
 * @package Domain\Messages\DTO
 */
class MessageInfoDto
{
    /** @var string */
    protected string $title;

    /** @var string */
    protected string $description;

    /** @var string */
    protected string $longDescription;

    public function __construct(
        string $title,
        string $description,
        string $longDescription
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->longDescription = $longDescription;
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
}

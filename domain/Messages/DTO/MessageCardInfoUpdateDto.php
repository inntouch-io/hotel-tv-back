<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 16:55
 */

namespace Domain\Messages\DTO;

class MessageCardInfoUpdateDto
{
    /** @var string */
    protected string $title;

    /** @var string */
    protected string $description;

    /** @var string */
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

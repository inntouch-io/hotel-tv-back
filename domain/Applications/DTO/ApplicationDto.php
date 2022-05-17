<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 13.05.2022 / 18:33
 */

namespace Domain\Applications\DTO;

/**
 * Class ApplicationDto
 * @package domain\Applications\DTO
 *
 * @property string $name
 * @property string $url
 * @property int    $imageId
 * @property int    $isVisible
 */
class ApplicationDto
{
    /** @var string $name */
    protected string $name;

    /** @var string $url */
    protected string $url;

    /** @var int $imageId */
    protected int $imageId;

    /** @var int $isVisible */
    protected int $isVisible;

    /**
     * @param string $name
     * @param string $url
     * @param int    $imageId
     * @param int    $isVisible
     */
    public function __construct(
        string $name,
        string $url,
        int    $imageId,
        int    $isVisible
    )
    {
        $this->name = $name;
        $this->url = $url;
        $this->imageId = $imageId;
        $this->isVisible = $isVisible;
    }

    // Getters

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getImageId(): int
    {
        return $this->imageId;
    }

    /**
     * @return int
     */
    public function getIsVisible(): int
    {
        return $this->isVisible;
    }
}

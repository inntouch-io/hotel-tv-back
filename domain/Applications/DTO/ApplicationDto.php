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
 * @property int    $image_id
 * @property int    $is_visible
 */
class ApplicationDto
{
    /** @var string $name */
    protected string $name;

    /** @var string $url */
    protected string $url;

    /** @var int $image_id */
    protected int $image_id;

    /** @var int $is_visible */
    protected int $is_visible;

    /**
     * @param string $name
     * @param string $url
     * @param int    $imageId
     * @param int    $isVisible
     */
    public function __construct(
        string $name,
        string $url,
        int    $image_id,
        int    $is_visible
    )
    {
        $this->name = $name;
        $this->url = $url;
        $this->image_id = $image_id;
        $this->is_visible = $is_visible;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return json_encode($this->toArray());
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
        return $this->image_id;
    }

    /**
     * @return int
     */
    public function getIsVisible(): int
    {
        return $this->is_visible;
    }
}

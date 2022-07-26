<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 26.07.2022 / 11:59
 */

namespace Domain\Iptv\Dto;

/**
 * Class ChannelInfoDto
 * @package Domain\Iptv\Dto
 *
 * @property string $title
 * @property string $locale
 */
class ChannelInfoDto
{
    /** @var string $title */
    protected string $title;

    /** @var string|null $locale */
    protected ?string $locale;

    /** @var int|null $channel_id */
    protected ?int $channel_id;

    public function __construct(
        string $title,
        ?string $locale = null,
        ?int $channel_id = null
    )
    {
        $this->title = $title;
        $this->locale = $locale;
        $this->channel_id = $channel_id;
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
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @return int|null
     */
    public function getChannelId(): ?int
    {
        return $this->channel_id;
    }
}

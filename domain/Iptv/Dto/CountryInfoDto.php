<?php

/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 07.02.2025 / 11:59
 */

namespace Domain\Iptv\Dto;

/**
 * Class CountryInfoDto
 * @package Domain\Iptv\Dto
 *
 * @property string $title
 * @property string $locale
 */
class CountryInfoDto
{
    /** @var string $title */
    protected string $title;

    /** @var string|null $locale */
    protected ?string $locale;

    /** @var int|null $country_id */
    protected ?int $country_id;

    public function __construct(
        string $title,
        ?string $locale = null,
        ?int $country_id = null
    ) {
        $this->title = $title;
        $this->locale = $locale;
        $this->country_id = $country_id;
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
    public function getCountryId(): ?int
    {
        return $this->country_id;
    }
}

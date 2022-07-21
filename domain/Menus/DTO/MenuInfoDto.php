<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 13.07.2022 / 11:57
 */

namespace Domain\Menus\DTO;

/**
 * Class MenuInfoDto
 * @package Domain\Menus\DTO
 *
 * @property string      $title
 * @property int|null    $menu_id
 * @property string|null $locale
 */
class MenuInfoDto
{
    /** @var string $title */
    protected string $title;

    /** @var int|null $menu_id */
    protected ?int $menu_id;

    /** @var string|null $locale */
    protected ?string $locale;

    public function __construct(
        string $title,
        int    $menu_id = null,
        string $locale = null
    )
    {
        $this->title = $title;
        $this->menu_id = $menu_id;
        $this->locale = $locale;
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
     * @return int|null
     */
    public function getMenuId(): ?int
    {
        return $this->menu_id;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
}

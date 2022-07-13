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
 */
class MenuInfoDto
{
    /** @var int $menu_id */
    protected int $menu_id;

    /** @var string $title */
    protected string $title;

    /** @var string $locale */
    protected string $locale;

    public function __construct(
        int    $menu_id,
        string $title,
        string $locale
    )
    {
        $this->menu_id = $menu_id;
        $this->title = $title;
        $this->locale = $locale;
    }

    // Getters

    /**
     * @return int
     */
    public function getMenuId(): int
    {
        return $this->menu_id;
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
    public function getLocale(): string
    {
        return $this->locale;
    }
}

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 14:27
 */

namespace App\Http\DTO\Admin\Module;

/**
 * Class ModuleDto
 * @package App\Http\DTO\Admin\Module
 */
class ModuleDto
{
    /** @var string */
    protected string $module_slug;

    /** @var string */
    protected string $module_name;

    /** @var string */
    protected string $module_icon;

    /** @var int */
    protected int $isVisible;

    /**
     * @param string $module_slug
     * @param string $module_name
     * @param string $module_icon
     * @param int    $isVisible
     */
    public function __construct(
        string $module_slug,
        string $module_name,
        string $module_icon,
        int    $isVisible
    )
    {
        $this->module_slug = $module_slug;
        $this->module_name = $module_name;
        $this->module_icon = $module_icon;
        $this->isVisible = $isVisible;
    }

    // Getters

    /**
     * @return string
     */
    public function getModuleSlug(): string
    {
        return $this->module_slug;
    }

    /**
     * @return string
     */
    public function getModuleName(): string
    {
        return $this->module_name;
    }

    /**
     * @return string
     */
    public function getModuleIcon(): string
    {
        return $this->module_icon;
    }

    /**
     * @return int
     */
    public function getIsVisible(): int
    {
        return $this->isVisible;
    }
}

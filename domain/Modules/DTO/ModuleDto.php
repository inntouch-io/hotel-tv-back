<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 14:27
 */

namespace Domain\Modules\DTO;

/**
 * Class ModuleDto
 * @package App\domain\Modules\DTO
 */
class ModuleDto
{
    /** @var string */
    protected string $module_slug;

    /** @var string */
    protected string $module_name;

    /** @var int */
    protected int $image_id;

    /** @var int */
    protected int $is_visible;

    public function __construct(
        string $module_slug,
        string $module_name,
        int    $image_id,
        int    $is_visible
    )
    {
        $this->module_slug = $module_slug;
        $this->module_name = $module_name;
        $this->image_id = $image_id;
        $this->is_visible = $is_visible;
    }

    // Getters

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
    public function getImageId(): string
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

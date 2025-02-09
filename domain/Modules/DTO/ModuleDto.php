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

    /** @var string */
    protected string $type;

    /** @var int */
    protected int $image_id;

    /** @var int */
    protected int $is_visible;

    /** @var int|null $order_position */
    protected ?int $order_position;

    public function __construct(
        string $module_slug,
        string $module_name,
        string $type,
        int    $image_id,
        int    $is_visible,
        ?int   $order_position = null
    ) {
        $this->module_slug = $module_slug;
        $this->module_name = $module_name;
        $this->type = $type;
        $this->image_id = $image_id;
        $this->is_visible = $is_visible;
        $this->order_position = $order_position;
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
    public function getType(): string
    {
        return $this->type;
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

    /**
     * @return int|null
     */
    public function getOrderPosition(): ?int
    {
        return $this->order_position;
    }
}

<?php

/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 07.02.2025 / 11:59
 */

namespace Domain\Modules\DTO;

/**
 * Class ModuleInfoDto
 * @package Domain\]Modules\Dto
 *
 * @property string $name
 * @property string $locale
 * @property ?int   $module_id
 */
class ModuleInfoDto
{
    /** @var string $name */
    protected string $name;

    /** @var string|null $locale */
    protected ?string $locale;

    /** @var int|null $module_id */
    protected ?int $module_id;

    public function __construct(
        string $name,
        ?string $locale = null,
        ?int $module_id = null
    ) {
        $this->name = $name;
        $this->locale = $locale;
        $this->module_id = $module_id;
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
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @return int|null
     */
    public function getModuleId(): ?int
    {
        return $this->module_id;
    }
}

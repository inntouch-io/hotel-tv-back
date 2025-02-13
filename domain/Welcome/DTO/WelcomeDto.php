<?php

/**
 * Hotel-alphazet.
 *
 * @author  Farrux Orziyev
 * Created: 13.02.2025 / 07:21
 */

namespace Domain\Welcome\DTO;

use App\Core\Dtos;

class WelcomeDto extends Dtos
{
    public function __construct()
    {
        parent::__construct();
    }

    private $language = null;
    private $title = null;
    private $text = null;
    private $slogan = null;

    /**
     * @return WelcomeDto
     */
    public static function getInstance(): WelcomeDto
    {
        return new static();
    }

    /**
     * @return null|string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param null|string $language
     */
    public function setLanguage(?string $language = null): void
    {
        $this->language = $language;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     */
    public function setTitle(?string $title = null): void
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param null|string $text
     */
    public function setText(?string $text = null): void
    {
        $this->text = $text;
    }

    /**
     * @return null|string
     */
    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    /**
     * @param null|string $slogan
     */
    public function setSlogan(?string $slogan = null): void
    {
        $this->slogan = $slogan;
    }
}

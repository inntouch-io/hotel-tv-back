<?php

/**
 * Hotel-alphazet.
 *
 * @author  Farrux Orziyev
 * Created: 13.02.2025 / 04:50
 */

namespace Domain\Welcome\Services;

use App\Core\Services;
use Domain\Welcome\Builders\WelcomeBuilder;
use Domain\Welcome\DTO\WelcomeDto;
use Domain\Welcome\Entities\Welcome;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class WelcomeService
 * @package Domain\Welcome\Services
 */
class WelcomeService extends Services
{
    /**
     * @return WelcomeService
     */
    public static function getInstance(): WelcomeService
    {
        return new static();
    }


    public function getList()
    {
        return WelcomeBuilder::getInstance()->getList();
    }

    public function getById(int $id)
    {
        return WelcomeBuilder::getInstance()->getById($id);
    }

    /**
     * Get welcome message by language.
     *
     * @param string $language
     * @return Welcome|null
     */
    public function getByLanguage(string $language): ?Welcome
    {
        return WelcomeBuilder::getInstance()->getByLanguage($language);
    }

    /**
     * Store a new welcome message.
     *
     * @param WelcomeDto $welcomeDto
     * @return Welcome|null
     */
    public function store(WelcomeDto $welcomeDto): ?Welcome
    {
        return WelcomeBuilder::getInstance()->store($welcomeDto);
    }

    /**
     * Update an existing welcome message.
     *
     * @param Welcome $welcome
     * @param WelcomeDto $welcomeDto
     */
    public function update(Welcome $welcome, WelcomeDto $welcomeDto)
    {
        WelcomeBuilder::getInstance()->update($welcome, $welcomeDto);
    }

    /**
     * Delete a welcome message by ID.
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        WelcomeBuilder::getInstance()->delete(function (Builder $builder) use ($id) {
            return $builder->whereKey($id);
        });
    }
}

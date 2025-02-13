<?php

/**
 * Hotel-alphazet.
 *
 * @author  Farrux Orziyev
 * Created: 13.02.2025 / 07:26
 */

namespace Domain\Welcome\Builders;

use App\Core\Builders;
use Closure;
use Domain\Rooms\Entities\Room;
use Domain\Rooms\Entities\RoomHistory;
use Domain\Users\Entities\User;
use Domain\Users\DTO\UserDto;
use Domain\Welcome\DTO\WelcomeDto;
use Domain\Welcome\Entities\Welcome;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RuntimeException;

/**
 * Class WelcomeBuilder
 * @package Domain\Welcome\Builders
 */
class WelcomeBuilder extends Builders
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return WelcomeBuilder
     */
    public static function getInstance(): WelcomeBuilder
    {
        return new static();
    }

    public function getList()
    {
        return Welcome::query()->orderByDesc('id')->get();
    }

    public function getById(int $id)
    {
        return Welcome::query()->whereKey($id)->first();
    }

    public function getByLanguage(string $language)
    {
        return Welcome::query()->whereKey($language)->first();
    }

    public function store(WelcomeDto $welcomeDto): ?Welcome
    {
        try {

            DB::beginTransaction();

            /** @var Welcome $welcome */
            $welcome = Welcome::query()->create(
                [
                    'title'    => $welcomeDto->getTitle(),
                    'text'     => $welcomeDto->getText(),
                    'slogan'   => $welcomeDto->getSlogan(),
                    'language' => $welcomeDto->getLanguage(),
                ]
            );

            DB::commit();

            return $welcome;
        } catch (Exception $exception) {
            DB::rollBack();

            throw new RuntimeException($exception->getMessage());
        }
    }

    public function update(Welcome $welcome, WelcomeDto $welcomeDto)
    {
        try {
            DB::beginTransaction();

            $welcome->update(
                [
                    'title'    => $welcomeDto->getTitle(),
                    'text'     => $welcomeDto->getText(),
                    'slogan'   => $welcomeDto->getSlogan(),
                    'language' => $welcomeDto->getLanguage(),
                ]
            );


            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw new RuntimeException($exception->getMessage());
        }
    }

    public function delete(Closure $closure)
    {
        $closure(Welcome::query())->delete();
    }
}

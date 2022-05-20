<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 13.05.2022 / 09:23
 */

namespace Domain\Applications\Builders;

use Closure;
use Domain\Applications\DTO\ApplicationDto;
use Domain\Applications\Entities\Application;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ApplicationBuilder
 * @package App\domain\Applications\Builders
 */
class ApplicationBuilder
{
    // Methods

    /**
     * @param Closure $closure
     * @return Application|null
     */
    public function takeBy(Closure $closure): ?Application
    {
        return $closure(Application::query())->first();
    }

    // Instance

    /**
     * @return ApplicationBuilder
     */
    public static function instance(): ApplicationBuilder
    {
        return new static();
    }

    // TODO: Not need

    /**
     * @return ApplicationBuilder
     */
    public static function getInstance(): ApplicationBuilder
    {
        return new static();
    }

    /**
     * @param Closure $closure
     * @return Collection
     */
    public function list(Closure $closure): Collection
    {
        return $closure(Application::query())->get();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return Application::query()->whereKey($id)->with('image')->first();
    }

    /**
     * @param Application    $application
     * @param ApplicationDto $applicationDto
     */
    public function update(Application $application, ApplicationDto $applicationDto)
    {
        $application->update($applicationDto->toArray());
    }
}

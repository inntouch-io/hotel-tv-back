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
    // Instance

    /**
     * @return ApplicationBuilder
     */
    public static function getInstance(): ApplicationBuilder
    {
        return new static();
    }

    // Methods

    /**
     * @param Closure $closure
     * @return Collection
     */
    public function list(Closure $closure): Collection
    {
        return $closure(Application::query())->get();
    }

    /**
     * @param Closure $closure
     * @return Application|null
     */
    public function takeBy(Closure $closure): ?Application
    {
        return $closure(Application::query())->first();
    }

    /**
     * @param Application    $application
     * @param ApplicationDto $applicationDto
     */
    public function update(Application $application, ApplicationDto $applicationDto)
    {
        $application->update(
            [
                'name'           => $applicationDto->getName(),
                'url'            => $applicationDto->getUrl(),
                'image_id'       => $applicationDto->getImageId(),
                'is_visible'     => $applicationDto->getIsVisible()
            ]
        );
    }

    public function store(ApplicationDto $applicationDto)
    {
        return Application::query()->create(
            [
                'name'           => $applicationDto->getName(),
                'url'            => $applicationDto->getUrl(),
                'image_id'       => $applicationDto->getImageId(),
                'is_visible'     => $applicationDto->getIsVisible(),
                'order_position' => $applicationDto->getOrderPosition()
            ]
        );
    }
}

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 13.05.2022 / 09:23
 */

namespace Domain\Applications\Builders;

use Domain\Applications\DTO\ApplicationDto;
use Domain\Applications\Entities\Application;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ApplicationBuilder
 * @package App\Domain\Applications\Builders
 */
class ApplicationBuilder
{
    /**
     * @return ApplicationBuilder
     */
    public static function getInstance(): ApplicationBuilder
    {
        return new static();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function list()
    {
        return Application::query()->with('image')->get();
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
     * @return bool
     */
    public function update(Application $application, ApplicationDto $applicationDto): bool
    {
        return $application->update(
            [
                'name'       => $applicationDto->getName(),
                'url'        => $applicationDto->getUrl(),
                'image_id'   => $applicationDto->getImageId(),
                'is_visible' => $applicationDto->getIsVisible()
            ]
        );
    }
}

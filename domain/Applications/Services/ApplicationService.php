<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 13.05.2022 / 09:21
 */

namespace Domain\Applications\Services;

use Domain\Applications\Builders\ApplicationBuilder;
use Domain\Applications\DTO\ApplicationDto;
use Domain\Applications\Entities\Application;
use Domain\Images\Builders\ImageBuilder;
use Domain\Images\Entities\Image;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;
use RuntimeException;

/**
 * Class ApplicationService
 * @package App\domain\Applications\Services
 */
class ApplicationService
{
    protected ApplicationBuilder $builder;

    /**
     * @param ApplicationBuilder $builder
     */
    public function __construct(ApplicationBuilder $builder)
    {
        $this->builder = $builder;
    }

    // Instance

    /**
     * @return ApplicationService
     */
    public static function getInstance(): ApplicationService
    {
        return new static(ApplicationBuilder::getInstance());
    }

    // Methods

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->builder->list(function (Builder $builder) {
            return $builder
                ->with('image')
                ->orderBy('id');
        });
    }

    /**
     * @param int $id
     * @return Application
     * @throw RuntimeException
     */
    public function takeById(int $id): Application
    {
        /** @var Application|null $application */
        $application = $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->with('image')->whereKey($id);
        });

        if (is_null($application)) {
            throw new RuntimeException('Application not found', 404);
        }

        return $application;
    }

    /**
     * @param Request     $request
     * @param Application $application
     * @return void
     */
    public function update(Request $request, Application $application)
    {
        $this->validator($request);
        $data = $request->all();

        $imageId = $application->getImageId();

        if (isset($data['image'])) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = md5(time());

            $request->file('image')->storeAs('public/applications', $imageName . '.' . $extension);
            // TODO Need add DB transaction

            /** @var Image $image */
            $image = ImageBuilder::getInstance()->save(
                "storage/applications/",
                $imageName,
                $extension
            );
            $imageId = $image->getId();
        }

        $this->builder->update($application, new ApplicationDto(
            $data['name'],
            $data['url'],
            $imageId,
            isset($data['isVisible']) ? 1 : 0
        ));
    }

    // Validation

    /**
     * @param Request $request
     * @return array
     */
    public function validator(Request $request): array
    {
        return $request->validate(
            [
                'name'  => 'required',
                'url'   => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'required' => 'Поле :attribute обязательно',
            ]
        );
    }
}

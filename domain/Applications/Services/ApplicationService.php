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
use Domain\Images\Services\ImageService;
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
    const CATALOG = 'applications';

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
        $data = $this->validator($request);

        $imageId = $application->getImageId();

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);

            $imageId = $image->getId();
        }

        $this->builder->update($application, new ApplicationDto(
            $data['name'],
            $data['url'],
            $imageId,
            isset($data['isVisible']) ? 1 : 0
        ));
    }

    public function store(Request $request)
    {
        $data = $this->validator($request);

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);
        } else {
            throw new RuntimeException('Image not found');
        }

        $latestApplication = $this->builder->takeBy(function (Builder $builder) {
            return $builder->latest('order_position');
        });

        if (is_null($latestApplication)) {
            $order_position = 1;
        } else {
            $order_position = (int)$latestApplication['order_position'] + 1;
        }

        return $this->builder->store(new ApplicationDto(
            $data['name'],
            $data['url'],
            $image->getId(),
            isset($data['isVisible']) ? 1 : 0,
            $order_position
        ));
    }

    // Validation

    /**
     * @param Request $request
     * @return array
     */
    public function validator(Request $request): array
    {
        $rules = [
            'name'      => 'required',
            'url'       => 'required',
            'isVisible' => 'nullable|int'
        ];

        if ($request->route()->getName() === 'admin.applications.store') {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } elseif ($request->route()->getName() === 'admin.applications.update') {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        return $request->validate(
            $rules,
            [
                'required' => 'Поле :attribute обязательно',
            ]
        );
    }
}

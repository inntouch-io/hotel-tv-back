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

    // Actions

    public function update(Request $request, Application $application)
    {
        $data = $request->all();
        $this->builder->update($application, new ApplicationDto(
            '',
            '',
            '',
            ''
        ));
    }

    // Methods

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

    // TODO: Trash

    public function list(Request $request)
    {
        $filter = $request->query('filter');

        return $this->builder->list(function (Builder $builder) use ($filter) {
            return $builder
                ->with('image')
                ->orderBy('id');
        });
    }

    /**
     * @param Request $request
     * @return ValidatorContract
     */
    public function validator(Request $request): ValidatorContract
    {
        return ValidatorFacade::make(
            $request->all(),
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

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return ApplicationBuilder::getInstance()->getById($id);
    }

    /**
     * @param Application $application
     * @param Request     $request
     * @return void
     */
    public function modify(Application $application, Request $request)
    {
        /** @var Validator $validator */
        $validator = $this->validator($request);

        if ($validator->fails()) {
            throw new RuntimeException($validator->errors()->first());
        }

        $data = $validator->getData();

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

            ApplicationBuilder::getInstance()->update($application, new ApplicationDto(
                $data['name'],
                $data['url'],
                $image->getId(),
                isset($data['isVisible']) ? 1 : 0
            ));
        } else {
            ApplicationBuilder::getInstance()->update($application, new ApplicationDto(
                $data['name'],
                $data['url'],
                $application->getImageId(),
                isset($data['isVisible']) ? 1 : 0
            ));
        }
    }

    // Instance

    /**
     * @return ApplicationService
     */
    public static function instance(): ApplicationService
    {
        return new static(ApplicationBuilder::getInstance());
    }
}

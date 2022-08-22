<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 18.08.2022 / 15:42
 */

namespace Domain\Gallery\Services;

use Domain\Gallery\Builders\GalleryBuilder;
use Domain\Gallery\Dto\GalleryDto;
use Domain\Gallery\Entities\Gallery;
use Domain\Images\Entities\Image;
use Domain\Images\Services\ImageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use RuntimeException;

/**
 * Class GalleryService
 * @package Domain\Gallery\Services
 */
class GalleryService
{
    const CATALOG = "galleries";

    protected GalleryBuilder $builder;

    /**
     * @param GalleryBuilder $builder
     */
    public function __construct(GalleryBuilder $builder)
    {
        $this->builder = $builder;
    }

    public static function getInstance(): GalleryService
    {
        return new static(GalleryBuilder::getInstance());
    }

    public function list()
    {
        return $this->builder->list(function (Builder $builder) {
            return $builder->with('image')->orderBy('order_position');
        });
    }

    public function getList()
    {
        return $this->builder->list(function (Builder $builder) {
            return $builder->where('is_visible', '=', true)->with('image')->orderBy('order_position');
        });
    }

    public function getById(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with('image');
        });
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

        $latestGallery = $this->builder->takeBy(function (Builder $builder) {
            return $builder->latest('order_position');
        });

        return $this->builder->store(new GalleryDto(
            $image->getId(),
            isset($data['isVisible']),
            !is_null($latestGallery) ? $latestGallery['order_position'] + 1 : 1
        ));

    }

    public function update(Gallery $gallery, Request $request)
    {
        $data = $this->validator($request);

        $imageId = $gallery->getImageId();

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);
            $imageId = $image->getId();
        }

        $this->builder->update($gallery, new GalleryDto(
            $imageId,
            isset($data['isVisible'])
        ));

    }

    protected function validator(Request $request): array
    {
        $rules = ['isVisible' => 'nullable|integer'];

        if ($request->route()->getName() === 'admin.galleries.store') {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } elseif ($request->route()->getName() === 'admin.galleries.update') {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        return $request->validate(
            $rules,
            [
                'required' => 'Поле :attribute обязательно',
            ]
        );
    }

    public function delete(int $id)
    {
        $this->builder->delete(function (Builder $builder) use ($id) {
            return $builder->whereKey($id);
        });
    }
}

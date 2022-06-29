<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.06.2022 / 13:34
 */

namespace Domain\Images\Services;

use Domain\Images\Builders\ImageBuilder;
use Domain\Images\Entities\Image;
use Illuminate\Http\Request;

/**
 * Class ImageService
 * @package Domain\Images\Services
 */
class ImageService
{
    protected ImageBuilder $builder;

    /**
     * @param ImageBuilder $imageBuilder
     */
    public function __construct(ImageBuilder $imageBuilder)
    {
        $this->builder = $imageBuilder;
    }

    /**
     * @return ImageService
     */
    public static function getInstance(): ImageService
    {
        return new static(ImageBuilder::getInstance());
    }

    public function upload(Request $request, string $catalog)
    {
        $extension = $request->file('image')->getClientOriginalExtension();
        $imageName = md5(time());

        $request->file('image')->storeAs("public/{$catalog}", $imageName . '.' . $extension);

        return $this->builder->save(
            "storage/{$catalog}/",
            $imageName,
            $extension
        );
    }
}

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 13.05.2022 / 16:26
 */

namespace App\Domain\Images\Builders;

use App\Domain\Images\Entities\Image;

/**
 * Class ImageBuilder
 * @package App\Domain\Images\Builders
 */
class ImageBuilder
{
    /**
     * @return ImageBuilder
     */
    public static function getInstance(): ImageBuilder
    {
        return new static();
    }

    /**
     * @param string $path
     * @param string $name
     * @param string $extension
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function save(string $path, string $name, string $extension)
    {
        return Image::query()->create(
            [
                'path'      => $path,
                'name'      => $name,
                'extension' => $extension,
            ]
        );
    }

}

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 18.08.2022 / 15:42
 */

namespace Domain\Gallery\Builders;

use Closure;
use Domain\Gallery\Entities\Gallery;

/**
 * Class GalleryBuilder
 * @package Domain\Gallery\Builders
 */
class GalleryBuilder
{
    /**
     * @return GalleryBuilder
     */
    public static function getInstance(): GalleryBuilder
    {
        return new static();
    }

    public function list(Closure $closure)
    {
        return $closure(Gallery::query())->get();
    }
}

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 18.08.2022 / 15:42
 */

namespace Domain\Gallery\Services;

use Domain\Gallery\Builders\GalleryBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class GalleryService
 * @package Domain\Gallery\Services
 */
class GalleryService
{
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
        return $this->builder->list(function (Builder $builder){
            return $builder->with('image')->orderBy('order_position');
        });
    }
}

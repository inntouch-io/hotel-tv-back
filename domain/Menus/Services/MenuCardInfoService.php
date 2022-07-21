<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 14.07.2022 / 15:54
 */

namespace Domain\Menus\Services;

use Domain\Menus\Builders\MenuCardInfoBuilder;
use Domain\Menus\DTO\MenuCardInfoDto;
use Domain\Menus\Entities\MenuCardInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class MenuCardInfoService
 * @package Domain\Menus\Services
 */
class MenuCardInfoService
{
    protected MenuCardInfoBuilder $builder;

    /**
     * @param MenuCardInfoBuilder $builder
     */
    public function __construct(MenuCardInfoBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return MenuCardInfoService
     */
    public static function getInstance(): MenuCardInfoService
    {
        return new static(MenuCardInfoBuilder::getInstance());
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title'          => 'required|string',
                'description'    => 'required|string',
                'subDescription' => 'required|string',
                'locale'         => 'required|string',
            ]
        );

        $this->builder->store(new MenuCardInfoDto(
            $data['title'],
            $data['description'],
            $data['subDescription'],
            (int)$request->query('card_id'),
            $data['locale']
        ));
    }

    public function getById(int $id)
    {
        return $this->builder->takeBy(function(Builder $builder) use ($id){
             return $builder->whereKey($id)->with('card');
        });
    }

    public function update(MenuCardInfo $info, Request $request)
    {
        $data = $request->validate(
            [
                'title'          => 'required|string',
                'description'    => 'required|string',
                'subDescription' => 'required|string',
            ]
        );

        $this->builder->update($info, new MenuCardInfoDto(
            $data['title'],
            $data['description'],
            $data['subDescription']
        ));
    }
}

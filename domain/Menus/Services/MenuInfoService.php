<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 12.07.2022 / 14:44
 */

namespace Domain\Menus\Services;

use Domain\Menus\Builders\MenuInfoBuilder;
use Domain\Menus\DTO\MenuInfoDto;
use Domain\Menus\Entities\MenuInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class MenuInfoService
 * @package Domain\Menus\Services
 */
class MenuInfoService
{
    protected MenuInfoBuilder $builder;

    /**
     * @param MenuInfoBuilder $builder
     */
    public function __construct(MenuInfoBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return MenuInfoService
     */
    public static function getInstance(): MenuInfoService
    {
        return new static(MenuInfoBuilder::getInstance());
    }

    public function getById(int $id)
    {
        return $this->builder->getById(function (Builder $builder) use ($id) {
            return $builder->whereKey($id);
        });
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validator(Request $request): array
    {
        return $request->validate(
            [
                'title'  => 'required|string',
                'locale' => 'required|in:' . implode(',', array_keys(config('app.locales'))),
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $this->validator($request);

        $this->builder->store(new MenuInfoDto(
            $data['title'],
            $request->query('menu_id'),
            $data['locale']
        ));
    }

    public function update(MenuInfo $info, Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|string'
            ]
        );

        $this->builder->update($info, new MenuInfoDto(
            $data['title'],
        ));
    }
}

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.04.2022 / 15:24
 */

namespace App\Services\Admin\Module;

use App\Models\App;
use App\Repositories\Admin\AppRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;

class AppService
{
    /**
     * @return AppService
     */
    public static function getInstance(): AppService
    {
        return new static();
    }

    /**
     * @return \App\Models\App[]|\Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        return AppRepository::getInstance()->list();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return AppRepository::getInstance()->getById($id);
    }

    public function validator(Request $request)
    {
        return ValidatorFacade::make(
            $request->all(),
            [
                'name' => 'required',
                'image' => 'required',
                'url' => 'required',
            ]
        );
    }

    public function modify(App $app, Request $request)
    {

    }
}

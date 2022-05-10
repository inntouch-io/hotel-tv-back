<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.04.2022 / 15:26
 */

namespace App\Repositories\Admin;

use App\Models\App;

class AppRepository
{
    /**
     * @return AppRepository
     */
    public static function getInstance(): AppRepository
    {
        return new static();
    }

    /**
     * @return App[]|\Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        return App::query()->with('image')->get();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return App::query()->whereKey($id)->with('image')->first();
    }
}

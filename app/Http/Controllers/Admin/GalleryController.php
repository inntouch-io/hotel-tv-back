<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 18.08.2022 / 15:26
 */

namespace App\Http\Controllers\Admin;

use Domain\Gallery\Services\GalleryService;
use Illuminate\Http\Request;

/**
 * Class GalleryController
 * @package App\Http\Controllers\Admin
 */
class GalleryController extends AdminController
{
    /**
     * GalleryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $list = GalleryService::getInstance()->list();

        return view(
            'galleries.index',
            [
                'list' => $list
            ]
        );
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function delete()
    {
        
    }
}

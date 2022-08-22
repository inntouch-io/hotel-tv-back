<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 18.08.2022 / 15:26
 */

namespace App\Http\Controllers\Admin;

use Domain\Gallery\Entities\Gallery;
use Domain\Gallery\Services\GalleryService;
use Exception;
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
        /** @var Gallery $gallery */
        $gallery = GalleryService::getInstance()->store($request);

        return redirect()->route('admin.galleries.edit', ['gallery' => $gallery->getId()])
            ->with('success', 'Successfully added');
    }

    public function edit(int $id)
    {
        /** @var Gallery $gallery */
        $gallery = GalleryService::getInstance()->getById($id);

        return view(
            'galleries.edit',
            [
                'gallery' => $gallery
            ]
        );
    }

    public function update(Request $request, int $id)
    {
        /** @var Gallery $gallery */
        $gallery = GalleryService::getInstance()->getById($id);

        GalleryService::getInstance()->update($gallery, $request);

        return redirect()->route('admin.galleries.edit', ['gallery' => $gallery->getId()])
            ->with('success', 'Successfully saved');
    }

    public function destroy(int $id)
    {
        try {
            GalleryService::getInstance()->delete($id);

            return redirect()->route('admin.galleries.index')
                ->with('success', 'Successfully deleted');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

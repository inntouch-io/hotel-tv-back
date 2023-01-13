<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 11.01.2023 / 11:51
 */

namespace App\Http\Controllers\Admin\Media;

use App\Http\Controllers\Admin\AdminController;
use Domain\Media\Entities\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Class BackgroundImageController
 * @package App\Http\Controllers\Admin\Media
 */
class BackgroundImageController extends AdminController
{
    public function edit()
    {
        $backgroundImage = Media::query()->where('category', '=', 'background')->first();

        return view('media.backgroundImage.edit', ['backgroundImage' => $backgroundImage]);
    }

    public function update(Request $request)
    {
        try {
            $request->validate(
                [
                    'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
                ]
            );

            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = md5(time());

            $request->file('image')->storeAs("public/media/", $imageName . '.' . $extension);

            /** @var Media $backgroundImage */
            $backgroundImage = Media::query()->where('category', '=', 'background')->first();

            if (file_exists($backgroundImage->getFullPath())) {
                File::delete($backgroundImage->getFullPath());
            }

            $backgroundImage->update(
                [
                    'path'      => "storage/media/",
                    'name'      => $imageName,
                    'extension' => $extension,
                ]
            );

            return redirect()->route('admin.media.backgroundImage.edit')->with('success', 'Successfully updated');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

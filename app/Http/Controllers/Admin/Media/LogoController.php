<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 10.01.2023 / 10:50
 */

namespace App\Http\Controllers\Admin\Media;

use App\Http\Controllers\Admin\AdminController;
use Domain\Media\Entities\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Class LogoController
 * @package App\Http\Controllers\Admin\Media
 */
class LogoController extends AdminController
{
    public function edit()
    {
        $logo = Media::query()->where('category', '=', 'logo')->first();

        return view('media.logo.edit', ['logo' => $logo]);
    }

    public function update(Request $request)
    {
        try {
            $request->validate(
                [
                    'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048'
                ]
            );

            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = md5(time());

            $request->file('image')->storeAs("public/media/", $imageName . '.' . $extension);

            /** @var Media $logo */
            $logo = Media::query()->where('category', '=', 'logo')->first();

            if (file_exists($logo->getFullPath())) {
                File::delete($logo->getFullPath());
            }

            $logo->update(
                [
                    'path'      => "storage/media/",
                    'name'      => $imageName,
                    'extension' => $extension,
                ]
            );

            return redirect()->route('admin.media.logo.edit')->with('success', 'Successfully updated');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

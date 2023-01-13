<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 11.01.2023 / 11:52
 */

namespace App\Http\Controllers\Admin\Media;

use App\Http\Controllers\Admin\AdminController;
use Domain\Media\Entities\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

/**
 * Class ScreensaverController
 * @package App\Http\Controllers\Admin\Media
 */
class ScreensaverController extends AdminController
{
    const CACHE_KEY = 'media-list';

    public function edit()
    {
        $screensaver = Media::query()->where('category', '=', 'screenSaver')->first();

        return view('media.screensaver.edit', ['screensaver' => $screensaver]);
    }

    public function update(Request $request)
    {
        try {
            $request->validate(
                [
                    'video' => 'mimes:mp4,mov,ogg,qt | max:8000'
                ]
            );


            $extension = $request->file('video')->getClientOriginalExtension();
            $imageName = md5(time());

            $request->file('video')->storeAs("public/media/", $imageName . '.' . $extension);

            /** @var Media $screenSaver */
            $screenSaver = Media::query()->where('category', '=', 'screenSaver')->first();

            if (file_exists($screenSaver->getFullPath())) {
                File::delete($screenSaver->getFullPath());
            }

            $screenSaver->update(
                [
                    'path'      => "storage/media/",
                    'name'      => $imageName,
                    'extension' => $extension,
                ]
            );

            Cache::forget(self::CACHE_KEY);

            return redirect()->route('admin.media.screensaver.edit')->with('success', 'Successfully updated');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

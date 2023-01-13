<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 13.01.2023 / 15:47
 */

namespace Domain\Media\Services;

use Domain\Media\Entities\Media;
use Illuminate\Support\Facades\Cache;

/**
 * Class MediaService
 * @package Domain\Media\Services
 */
class MediaService
{
    const CACHE_KEY = 'media-list';

    public function getList()
    {
        $result = Cache::get(self::CACHE_KEY);

        if (is_null($result)){
            $list = Media::query()->get();

            $result = [];

            /** @var Media $item */
            foreach ($list as $item) {
                $result += [
                    $item->getCategory() => url($item->getFullPath())
                ];
            }

            Cache::put(self::CACHE_KEY, $result, now()->addDay());
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        /** @var Media $logo */
        $logo = Media::query()->where('category', '=', 'logo')->first();

        return $logo->getFullPath();
    }

    /**
     * @return MediaService
     */
    public static function getInstance(): MediaService
    {
        return new static();
    }
}

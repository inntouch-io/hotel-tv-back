<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 26.07.2022 / 09:49
 */

namespace App\Http\Controllers\Admin\Iptv;

use App\Http\Controllers\Admin\AdminController;
use Domain\Iptv\Services\ChannelService;
use Illuminate\Http\Request;

/**
 * Class ChannelInfoController
 * @package App\Http\Controllers\Admin\Iptv
 */
class ChannelInfoController extends AdminController
{
    /**
     * ChannelInfoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function create(Request $request)
    {
        $channel = ChannelService::getInstance()->getWithInfos((int)$request->query('channel_id'));

        return view(
            'iptv.infos.create',
            [
                'channel' => $channel
            ]
        );
    }

    public function store(Request $request)
    {
//        ChannelIn

    }

    public function edit()
    {

    }
}

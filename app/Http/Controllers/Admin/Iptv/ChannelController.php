<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 25.07.2022 / 13:32
 */

namespace App\Http\Controllers\Admin\Iptv;

use App\Http\Controllers\Admin\AdminController;
use Domain\Iptv\Entities\IptvChannel;
use Domain\Iptv\Services\ChannelService;
use Exception;
use Illuminate\Http\Request;

/**
 * Class ChannelController
 * @package App\Http\Controllers\Admin\Iptv
 */
class ChannelController extends AdminController
{
    /**
     * ChannelController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $list = ChannelService::getInstance()->list();

        return view(
            'iptv.channel.index',
            [
                'list' => $list
            ]
        );
    }

    public function create()
    {
        return view('iptv.channel.create');
    }

    public function store(Request $request)
    {
        try {
            ChannelService::getInstance()->store($request);
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.iptv.channel.index')
            ->with('success', 'Successfully added');
    }

    public function edit(int $id)
    {
        $channel = ChannelService::getInstance()->getById($id);

        return view(
            'iptv.channel.edit',
            [
                'channel' => $channel
            ]
        );
    }

    public function update(Request $request, int $id)
    {
        try {
            /** @var IptvChannel $channel */
            $channel = ChannelService::getInstance()->getById($id);

            ChannelService::getInstance()->update($channel, $request);
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.iptv.channel.edit', ['channel' => $channel->getId()])
            ->with('success', 'Successfully saved');
    }

    public function destroy(int $id)
    {

    }
}

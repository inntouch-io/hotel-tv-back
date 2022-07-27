<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 26.07.2022 / 09:49
 */

namespace App\Http\Controllers\Admin\Iptv;

use App\Http\Controllers\Admin\AdminController;
use Domain\Iptv\Entities\IptvChannelInfo;
use Domain\Iptv\Services\ChannelInfoService;
use Domain\Iptv\Services\ChannelService;
use Exception;
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Request $request)
    {
        $this->authorize('create', IptvChannelInfo::class);
        $channel = ChannelService::getInstance()->getWithInfos((int)$request->query('channel_id'));

        return view(
            'iptv.infos.create',
            [
                'channel' => $channel
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', IptvChannelInfo::class);
        /** @var IptvChannelInfo $info */
        $info = ChannelInfoService::getInstance()->store($request);

        return redirect()->route('admin.iptv.infos.edit', ['info' => $info->getId()])
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', IptvChannelInfo::class);
        $info = ChannelInfoService::getInstance()->getById($id);

        return view('iptv.infos.edit', ['info' => $info]);
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, int $id)
    {
        $this->authorize('update', IptvChannelInfo::class);
        /** @var IptvChannelInfo $info */
        $info = ChannelInfoService::getInstance()->getById($id);

        ChannelInfoService::getInstance()->update($info, $request);

        return redirect()->route('admin.iptv.infos.edit', ['info' => $info->getId()])
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', IptvChannelInfo::class);
        try {
            /** @var IptvChannelInfo $info */
            $info = ChannelInfoService::getInstance()->getById($id);
            $info->delete();

            return redirect()->route('admin.iptv.channel.index')
                ->with('success', 'Successfully deleted');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

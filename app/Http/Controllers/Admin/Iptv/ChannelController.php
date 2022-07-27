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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', IptvChannel::class);
        $list = ChannelService::getInstance()->list();

        return view(
            'iptv.channel.index',
            [
                'list' => $list
            ]
        );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', IptvChannel::class);
        return view('iptv.channel.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', IptvChannel::class);
        try {
            ChannelService::getInstance()->store($request);
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.iptv.channel.index')
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', IptvChannel::class);
        $channel = ChannelService::getInstance()->getById($id);

        return view(
            'iptv.channel.edit',
            [
                'channel' => $channel
            ]
        );
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, int $id)
    {
        $this->authorize('update', IptvChannel::class);
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

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', IptvChannel::class);
        try {
            $channel = ChannelService::getInstance()->getById($id);
            $channel->delete();

            return redirect()->route('admin.iptv.channel.index')
                ->with('success', 'Successfully added');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function sortingList()
    {
        $this->authorize('sortingList', IptvChannel::class);
        $list = ChannelService::getInstance()->list();

        return view(
            'iptv.channel.sorting',
            [
                'list' => $list
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function sorting(Request $request)
    {
        $this->authorize('sorting', IptvChannel::class);
        try {
            if ($request->isXmlHttpRequest()) {
                ChannelService::getInstance()->sorting($request->input('channels'));

                return response()->json(['data' => true]);
            }

            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

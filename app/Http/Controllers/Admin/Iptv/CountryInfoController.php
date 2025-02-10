<?php

/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 07.02.2025 / 09:49
 */

namespace App\Http\Controllers\Admin\Iptv;

use App\Http\Controllers\Admin\AdminController;
use Domain\Iptv\Entities\IptvCountryInfo;
use Domain\Iptv\Services\ChannelService;
use Domain\Iptv\Services\CountryInfoService;
use Exception;
use Illuminate\Http\Request;

/**
 * Class CountryInfoController
 * @package App\Http\Controllers\Admin\Iptv
 */
class CountryInfoController extends AdminController
{
    /**
     * CountryInfoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create(int $countryId)
    {
        $this->authorize('create', IptvCountryInfo::class);
        $country = ChannelService::getInstance()->getWithInfos($countryId);

        return view('iptv.country.infos.create', ['country' => $country]);
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', IptvCountryInfo::class);
        /** @var IptvCountryInfo $info */
        $info = CountryInfoService::getInstance()->store($request);

        return redirect()->route('admin.iptv.country.infos.edit', ['id' => $info->getId()])
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', IptvCountryInfo::class);
        $info = CountryInfoService::getInstance()->getById($id);

        return view('iptv.country.infos.edit', ['info' => $info]);
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, int $id)
    {
        $this->authorize('update', IptvCountryInfo::class);
        /** @var IptvCountryInfo $info */
        $info = CountryInfoService::getInstance()->getById($id);

        CountryInfoService::getInstance()->update($info, $request);

        return redirect()->route('admin.iptv.country.infos.edit', ['id' => $info->getId()])
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', IptvCountryInfo::class);
        try {
            /** @var IptvCountryInfo $info */
            $info = CountryInfoService::getInstance()->getById($id);
            $info->delete();

            return redirect()->route('admin.iptv.country.index')
                ->with('success', 'Successfully deleted');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

<?php

/**
 * Hotel-TV.
 *
 * @author  Orziyev Farrux
 * Created: 01.02.2025
 */

namespace App\Http\Controllers\Admin\Iptv;

use App\Http\Controllers\Admin\AdminController;
use Domain\Iptv\Entities\IptvCountry;
use Domain\Iptv\Services\CountryService;
use Exception;
use Illuminate\Http\Request;


/**
 * Class CountryController
 * @package App\Http\Controllers\Admin\Iptv
 */
class CountryController extends AdminController
{
    /**
     * CountryController constructor.
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
        $this->authorize('index', IptvCountry::class);
        $list = CountryService::getInstance()->list();

        return view(
            'iptv.country.index',
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
        $this->authorize('create', IptvCountry::class);
        return view('iptv.country.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', IptvCountry::class);
        try {
            CountryService::getInstance()->store($request);
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.iptv.country.index')
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', IptvCountry::class);
        $country = CountryService::getInstance()->getById($id);

        return view(
            'iptv.country.edit',
            [
                'country' => $country
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
        $this->authorize('update', IptvCountry::class);
        try {
            /** @var IptvCountry $country */
            $country = CountryService::getInstance()->getById($id);

            CountryService::getInstance()->update($country, $request);
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.iptv.country.edit', ['id' => $country->getId()])
            ->with('success', 'Successfully saved');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', IptvCountry::class);
        try {
            $country = CountryService::getInstance()->getById($id);
            $country->delete();

            return redirect()->route('admin.iptv.country.index')
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
        $this->authorize('sortingList', IptvCountry::class);
        $list = CountryService::getInstance()->list();

        return view(
            'iptv.country.sorting',
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
        $this->authorize('sorting', IptvCountry::class);
        try {
            if ($request->isXmlHttpRequest()) {
                CountryService::getInstance()->sorting($request->input('countries'));

                return response()->json(['data' => true]);
            }

            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

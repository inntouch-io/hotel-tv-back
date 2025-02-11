<?php

/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 17.07.2022 / 22:30
 */

namespace App\Http\Controllers\Admin;

use Domain\Rooms\Entities\Room;
use Domain\Rooms\Services\RoomService;
use Exception;
use Illuminate\Http\Request;

/**
 * Class RoomController
 * @package App\Http\Controllers\Admin
 */
class RoomController extends AdminController
{
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
        $this->authorize('index', Room::class);
        $rooms = RoomService::getInstance()->getList();

        return view(
            'rooms.index',
            [
                'list' => $rooms
            ]
        );
    }

    /**
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Room::class);
        return view('rooms.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', Room::class);
        try {
            RoomService::getInstance()->store($request);
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', Room::class);
        $room = RoomService::getInstance()->getById($id);

        return view(
            'rooms.edit',
            [
                'room' => $room
            ]
        );
    }

    public function show()
    {
        //
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, int $id)
    {
        $this->authorize('update', Room::class);
        try {
            /** @var Room $room */
            $room = RoomService::getInstance()->getById($id);

            RoomService::getInstance()->update($room, $request);

            return redirect()->route('admin.rooms.edit', ['room' => $room->getId()])
                ->with('success', 'Successfully saved');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', Room::class);
        /** @var Room $room */
        $room = RoomService::getInstance()->getById($id);

        try {
            $room->delete();
            return redirect()->route('admin.rooms.index')
                ->with('success', 'Successfully deleted');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}

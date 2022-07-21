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

    public function index()
    {
        $rooms = RoomService::getInstance()->getList();

        return view(
            'rooms.index',
            [
                'list' => $rooms
            ]
        );
    }

    public function edit(int $id)
    {
        $room = RoomService::getInstance()->getById($id);

        return view(
            'rooms.edit',
            [
                'room' => $room
            ]
        );
    }

    public function update(Request $request, int $id)
    {
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

    public function destroy(int $id)
    {
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

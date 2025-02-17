<?php

/**
 * Hotel-alphazet.
 *
 * @author  Farrux Orziyev
 * Created: 11.02.2025 / 14:43
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Domain\Users\DTO\UserDto;
use Domain\Users\Entities\User;
use Domain\Users\Services\UserService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use RuntimeException;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', User::class);

        try {
            $users = UserService::getInstance()->getList();

            return view(
                'users.index',
                [
                    'list' => $users
                ]
            );
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', User::class);

        return view('users.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('store', User::class);

        try {
            $data = $request->validate(
                [
                    'first_name'       => 'required|string',
                    'last_name'        => 'required|string',
                    'telephone_number' => 'required|string|unique:users,telephone_number',
                    'passport_number'  => 'required|string|unique:users,passport_number',
                    'language'         => 'required|string|in:uz,ru,en',
                    'arrival_time'     => 'required|date',
                    'departure_time'   => 'required|date',
                    'room_id'          => 'required|int'
                ]
            );

            $userDto = new UserDto();
            $userDto->setFirstName($data['first_name']);
            $userDto->setLastName($data['last_name']);
            $userDto->setTelephoneNumber($data['telephone_number']);
            $userDto->setPassportNumber($data['passport_number']);
            $userDto->setLanguage($data['language']);
            $userDto->setArrivalTime($data['arrival_time']);
            $userDto->setDepartureTime($data['departure_time']);
            $userDto->setRoomId($data['room_id']);

            $user = UserService::getInstance()->store($userDto);

            return redirect()->route('admin.users.edit', ['user' => $user->getId()])
                ->with('success', 'Successfully saved');
        } catch (ValidationException $exception) {
            return redirect()->back()->withErrors($exception->errors())->withInput();
        }
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', User::class);

        $user = UserService::getInstance()->getById($id);

        return view(
            'users.edit',
            [
                'user' => $user
            ]
        );
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->authorize('update', User::class);

        try {
            $data = $request->validate(
                [
                    'first_name'       => 'required|string',
                    'last_name'        => 'required|string',
                    'telephone_number' => 'required|string',
                    'passport_number'  => 'required|string',
                    'language'         => 'required|string|in:uz,ru,en',
                    'arrival_time'     => 'required|date',
                    'departure_time'   => 'required|date',
                    'room_id'          => 'required|int'
                ]
            );

            /** @var User $user */
            $user = UserService::getInstance()->getById($id);

            if (is_null($user)) {
                throw new RuntimeException('User not found!', 404);
            }

            $userDto = new UserDto();
            $userDto->setFirstName($data['first_name']);
            $userDto->setLastName($data['last_name']);
            $userDto->setTelephoneNumber($data['telephone_number']);
            $userDto->setPassportNumber($data['passport_number']);
            $userDto->setLanguage($data['language']);
            $userDto->setArrivalTime($data['arrival_time']);
            $userDto->setDepartureTime($data['departure_time']);
            $userDto->setRoomId($data['room_id']);

            UserService::getInstance()->update($user, $userDto);

            return redirect()->route('admin.users.edit', ['user' => $user->getId()])
                ->with('success', 'Successfully saved');
        } catch (ValidationException $exception) {
            return redirect()->back()->withErrors($exception->errors())->withInput();
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', User::class);
        /** @var User $user */
        UserService::getInstance()->delete($id);

        return redirect()->route('admin.users.index')
            ->with('success', 'Successfully deleted');
    }
}

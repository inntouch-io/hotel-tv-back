<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 21.07.2022 / 10:05
 */

/** @var \Domain\Rooms\Entities\Room $room */
?>

@extends('layouts.main')
@section('title', 'Комнаты')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Комнаты
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        <div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
            <div class="sidebar-content">
                <div class="sidebar-section">
                    <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                        @include('rooms.sidebar')
                    </ul>
                </div>
            </div>
        </div>

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if (is_null($list) || count($list) === 0)
                            <div class="alert alert-primary border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">Oh snap!!!</span>
                                Ничего не найдено
                            </div>
                        @else
                            @if (session('success'))
                                <div class="alert alert-success border-0 alert-dismissible col-6">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <span class="font-weight-semibold mr-1">Well done!!!</span>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card card-table table-responsive shadow-none mb-0">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Номер комнаты</th>
                                            <th>Идентификатор устройства</th>
                                            <th>Category</th>
                                            <th>User</th>
                                            <th>Room Status</th>
                                            <th>Is Active</th>
                                            <th>Редактировать</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($list as $room)
                                            <tr>
                                                <td>
                                                    <div class="font-weight-semibold">{{ $room->getId() }}</div>
                                                </td>

                                                <td>
                                                    <span class="badge badge-secondary">{{ $room->getRoomNumber() }}</span>
                                                </td>

                                                <td>
                                                    <span class="font-weight-semibold">
                                                        {{ $room->getDeviceId() }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <span
                                                        class="badge badge-secondary">{{ optional($room->category)->getName() ?? '' }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <span>
                                                        @if ($room->user)
                                                            <a
                                                                href="{{ route('admin.users.edit', ['user' => $room->user->id]) }}">
                                                                {{ "{$room->user->first_name} {$room->user->last_name}" }}
                                                            </a>
                                                        @else
                                                            <code>NO USER</code>
                                                        @endif
                                                    </span>
                                                </td>


                                                <td>
                                                    @if ($room->getRoomStatus() === 'free')
                                                        <div class="badge badge-success">Свободно</div>
                                                    @else
                                                        <div class="badge badge-warning">Забронировано</div>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($room->getIsActive())
                                                        <div class="badge badge-success">Активный</div>
                                                    @else
                                                        <div class="badge badge-danger">Неактивный</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.rooms.edit', ['room' => $room->getId()]) }}"
                                                        class="badge badge-secondary">
                                                        <i class="fas fa-edit"></i>
                                                        Редактировать
                                                    </a>

                                                    <form
                                                        action="{{ route('admin.rooms.destroy', ['room' => $room->getId()]) }}"
                                                        method="post" class="mt-1">
                                                        {{ csrf_field() }}
                                                        @method('DELETE')
                                                        <button type="submit" class="badge badge-danger outline-0 border-0"
                                                            onclick="return confirm('Are you sure you want to delete this item')">
                                                            <i class="fas fa-trash"></i>
                                                            Удалить
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

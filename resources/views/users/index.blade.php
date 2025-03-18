<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 21.07.2022 / 10:05
 */

/** @var \Domain\Rooms\Entities\User $user */
?>

@extends('layouts.main')
@section('title', 'Комнаты')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Пользователи
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
                        @include('users.sidebar')
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
                                            <th>Full Name</th>
                                            <th>Telephone Number</th>
                                            <th>Passport Number</th>
                                            <th>Language</th>
                                            <th>Arrival time</th>
                                            <th>Departure time</th>
                                            <th>Room</th>
                                            <th>Редактировать</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($list as $user)
                                            <tr>
                                                <td>
                                                    <div class="font-weight-semibold">{{ $user->getId() }}</div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.users.edit', ['user' => $user->getId()]) }}"
                                                        class="font-weight-semibold">
                                                        {{ $user->getFullName() }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="font-weight-semibold">
                                                        {{ $user->getTelephoneNumber() }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <code>{{ $user->getPassportNumber() }}</code>
                                                </td>
                                                <td>
                                                    <span class="font-weight-semibold">
                                                        {{ $user->getLanguage() }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="font-weight-semibold">
                                                        {{ date('Y-m-d H:i:s', $user->getArrivalTime()) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="font-weight-semibold">
                                                        {{ date('Y-m-d H:i:s', $user->getDepartureTime()) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if (is_null($user->getRoomId()))
                                                        <code>NO ROOM</code>
                                                    @else
                                                        <a
                                                            href="{{ route('admin.rooms.edit', ['room' => $user->getRoomId()]) }}">{{ optional($user->room)->getRoomNumber() }}</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.users.edit', ['user' => $user->getId()]) }}"
                                                        class="badge badge-secondary">
                                                        <i class="fas fa-edit"></i>
                                                        Редактировать
                                                    </a>

                                                    <form
                                                        action="{{ route('admin.users.destroy', ['user' => $user->getId()]) }}"
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

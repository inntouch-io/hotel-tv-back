<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 21.07.2022 / 10:46
 */

/** @var \Domain\Rooms\Entities\User $user */
?>

@extends('layouts.main')
@section('title', 'Редактировать комнату')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Редактировать пользователя
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('users.infobar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if(is_null($user))
                            <div class="alert alert-danger border-0 alert-dismissible mb-0">
                                <span class="font-weight-semibold">Oh snap!!!</span>
                                Системная ошибка
                            </div>
                        @else
                            @if(session('success'))
                                <div class="alert alert-success border-0 alert-dismissible col-6">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <span class="font-weight-semibold mr-1">Well done!!!</span>
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('admin.users.update', ['user' => $user->getId()]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label for="first_name" class="font-weight-bold">First Name</label>
                                            <input type="text" id="first_name" name="first_name" class="form-control"
                                                   placeholder="First Name" value="{{ $user->getFirstName() }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="last_name" class="font-weight-bold">Last Name</label>
                                            <input type="text" id="last_name" name="last_name" class="form-control"
                                                   placeholder="Last Name" value="{{ $user->getLastName() }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="telephone_number" class="font-weight-bold">Telephone number</label>
                                            <input type="text" id="telephone_number" name="telephone_number" class="form-control"
                                                   placeholder="Phone Number" value="{{ $user->getTelephoneNumber() }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="passport_number" class="font-weight-bold">Passport number</label>
                                            <input type="text" id="passport_number" name="passport_number" class="form-control"
                                                   placeholder="Passport Number" value="{{ $user->getPassportNumber() }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="language" class="font-weight-bold">Language</label>
                                            <select name="language" id="language" class="form-control">
                                                @foreach(config('app.locales') as $key => $locale)
                                                    @if($key === $user->getLanguage())
                                                        <option value="{{ $key }}" selected>{{ $locale }}</option>
                                                    @else
                                                        <option value="{{ $key }}">{{ $locale }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="arrival_time" class="font-weight-bold">Arrival time</label>
                                            <input type="datetime-local" id="arrival_time" name="arrival_time" class="form-control"
                                                   placeholder="arrival_time" required value="{{ date('Y-m-d\Th:m:s', $user->getArrivalTime()) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="departure_time" class="font-weight-bold">Departure time</label>
                                            <input type="datetime-local" id="departure_time" name="departure_time" class="form-control"
                                                   placeholder="departure_time" required value="{{ date('Y-m-d\Th:m:s', $user->getDepartureTime()) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="room_id" class="font-weight-bold">Room</label>
                                            <select name="room_id" id="room_id" class="form-control">
                                                @if(is_null($user->room))
                                                    <option value="">Выбрать</option>
                                                @else
                                                    <option value="{{ $user->getRoomId() }}" selected>{{ $user->room->getRoomNumber() }}</option>
                                                @endif
                                                @foreach(get_free_rooms() as $key => $value)
                                                    <option value="{{ $key }}" >{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                <i class="far fa-save"></i>
                                                Сохранить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

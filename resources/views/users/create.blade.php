<?php
/**
 * Hotel-alphazet.
 *
 * @author  Mirfayz Nosirov
 * Created: 28.08.2023 / 11:10
 */

?>

@extends('layouts.main')
@section('title', 'Добавить пользователей')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Добавить пользователей
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
                        @if(session('success'))
                            <div class="alert alert-success border-0 alert-dismissible col-6">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold mr-1">Well done!!!</span>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('POST')
                            <div class="row">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="first_name" class="font-weight-bold">First Name</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control"
                                               placeholder="First Name" required value="{{ old('first_name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name" class="font-weight-bold">Last Name</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control"
                                               placeholder="Last Name" required value="{{ old('last_name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="telephone_number" class="font-weight-bold">Telephone number</label>
                                        <input type="text" id="telephone_number" name="telephone_number" class="form-control"
                                               placeholder="Telephone Number" required value="{{ old('telephone_number') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="passport_number" class="font-weight-bold">Passport number</label>
                                        <input type="text" id="passport_number" name="passport_number" class="form-control"
                                               placeholder="Passport Number" required value="{{ old('passport_number') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="language" class="font-weight-bold">Language</label>
                                        <select name="language" id="language" class="form-control">
                                            @foreach(config('app.locales') as $key => $locale)
                                                <option value="{{ $key }}">{{ $locale }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="arrival_time" class="font-weight-bold">Arrival time</label>
                                        <input type="datetime-local" id="arrival_time" name="arrival_time" class="form-control"
                                               placeholder="arrival_time" required value="{{ old('arrival_time') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="departure_time" class="font-weight-bold">Departure time</label>
                                        <input type="datetime-local" id="departure_time" name="departure_time" class="form-control"
                                               placeholder="departure_time" required value="{{ old('departure_time') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="room_id" class="font-weight-bold">Room</label>
                                        <select name="room_id" id="room_id" class="form-control">
                                            <option value="">Выбрать</option>
                                            @foreach(get_free_rooms() as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


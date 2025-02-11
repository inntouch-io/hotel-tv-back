<?php
/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 08.02.2025 / 16:55
 */

$room = new \Domain\Rooms\Entities\Room();

?>

@extends('layouts.main')
@section('title', 'Добавить Комнату')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Добавить Комнату
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
                        @if (session('success'))
                            <div class="alert alert-success border-0 alert-dismissible col-6">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold mr-1">Well done!!!</span>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.rooms.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="roomNumber" class="font-weight-bold">Номер комнаты</label>
                                        <input type="text" id="roomNumber" name="roomNumber" class="form-control"
                                            placeholder="Номер комнаты" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="roomStatus" class="font-weight-bold">Статус номера</label>
                                        <select name="roomStatus" id="roomStatus" class="form-control">
                                            @foreach ($room::STATUSES as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="categoryId" class="font-weight-bold">Category номера</label>
                                        <select name="categoryId" id="categoryId" class="form-control">
                                            @foreach (room_categories() as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="deviceId" class="font-weight-bold">Идентификатор устройства</label>
                                        <input type="text" id="deviceId" name="deviceId" class="form-control"
                                            placeholder="Идентификатор устройства" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="device_ip" class="font-weight-bold">IP-адрес устройства</label>
                                        <input type="text" id="device_ip" name="device_ip" class="form-control"
                                            placeholder="IP-адрес устройства" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="max_volume" class="font-weight-bold">Макс. громкость</label>
                                        <input type="number" id="max_volume" name="max_volume" class="form-control"
                                            placeholder="Макс. громкость" required>
                                    </div>

                                    <div class="form-group">
                                        <p class="font-weight-bold">Статус</p>

                                        <div class="border p-3 rounded">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <span class="mr-2">Нет</span>
                                                <input type="checkbox" name="isActive" class="custom-control-input"
                                                    id="isActive" value="1">
                                                <label class="custom-control-label" for="isActive">Да</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-outline-success"
                                            onclick="submitForm(this)">
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

@section('script-js')
    <script>
        function submitForm(btn) {
            // disable the button
            btn.disabled = true;
            // submit the form
            btn.form.submit();
        }
    </script>
@endsection

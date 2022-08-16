<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 21.07.2022 / 10:46
 */

/** @var \Domain\Rooms\Entities\Room $room */
?>

@extends('layouts.main')
@section('title', 'Редактировать комнату')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Редактировать комнату
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('rooms.infobar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if(is_null($room))
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

                            <form action="{{ route('admin.rooms.update', ['room' => $room->getId()]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label for="roomNumber" class="font-weight-bold">Номер комнаты</label>
                                            <input type="text" id="roomNumber" name="roomNumber" class="form-control"
                                                   placeholder="Номер комнаты" value="{{ $room->getRoomNumber() }}"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <label for="deviceId" class="font-weight-bold">Идентификатор устройства</label>
                                            <input type="text" id="deviceId" name="deviceId" class="form-control"
                                                   placeholder="Идентификатор устройства" value="{{ $room->getDeviceId() }}"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <p class="font-weight-semibold">Верификация</p>

                                            <div class="border p-3 rounded">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <span class="mr-2">Нет</span>
                                                    @if($room->getIsVerified())
                                                        <input type="checkbox" name="isVerified" class="custom-control-input" id="isVerified" value="1" checked>
                                                    @else
                                                        <input type="checkbox" name="isVerified" class="custom-control-input" id="isVerified" value="1">
                                                    @endif
                                                    <label class="custom-control-label" for="isVerified">Да</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="max_volume" class="font-weight-bold">Макс. громкость</label>
                                            <input type="number" id="max_volume" name="max_volume" class="form-control"
                                                   placeholder="Макс. громкость" value="{{ $room->getMaxVolume() }}"
                                                   required>
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

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 22.04.2022 / 16:05
 */

/** @var \Domain\Iptv\Entities\IptvCountry $country */
?>

@extends('layouts.main')
@section('title', is_null($country) ? 'Системная ошибка' : $country->getTitle())

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        {{ is_null($country) ? 'Системная ошибка' : $country->getTitle() }}
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('iptv.country.infobar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if (is_null($country))
                            <div class="alert alert-danger border-0 alert-dismissible mb-0">
                                <span class="font-weight-semibold">Oh snap!!!</span>
                                Системная ошибка
                            </div>
                        @else
                            @if (session('success'))
                                <div class="alert alert-success border-0 alert-dismissible col-6">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <span class="font-weight-semibold mr-1">Well done!!!</span>
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('admin.iptv.country.update', ['id' => $country->getId()]) }}"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title" class="font-weight-bold">Название</label>
                                            <input type="text" id="title" name="title" class="form-control"
                                                placeholder="Название" value="{{ $country->getTitle() }}" required>
                                        </div>

                                        <div class="form-group">
                                            <p class="font-weight-semibold">Фото каналов</p>

                                            <div class="border p-3 rounded d-flex align-items-center">
                                                <input type="file" name="image"
                                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                                <div style="max-height: 100px; line-height: 100px">
                                                    <img src="{{ asset($country->image->getFullPath()) }}" alt="image"
                                                        id="image" style="max-height: 100px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <p class="font-weight-semibold">Статус</p>

                                            <div class="border p-3 rounded">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <span class="mr-2">Нет</span>
                                                    @if ($country->getIsVisible())
                                                        <input type="checkbox" name="isVisible" class="custom-control-input"
                                                            id="isVisible" value="1" checked>
                                                    @else
                                                        <input type="checkbox" name="isVisible" class="custom-control-input"
                                                            id="isVisible" value="1">
                                                    @endif
                                                    <label class="custom-control-label" for="isVisible">Да</label>
                                                </div>
                                            </div>
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

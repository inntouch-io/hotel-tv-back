<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 11.01.2023 / 11:00
 */

/** @var \Domain\Media\Entities\Media $screensaver */
?>

@extends('layouts.main')

@section('title')
    Изменить заставку
@endsection

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Изменить заставку
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('media.sidebar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if(is_null($screensaver))
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

                            <form action="{{ route('admin.media.screensaver.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <p class="font-weight-semibold">Экранная заставка</p>
                                                <div class="border p-3 rounded d-flex align-items-center">
                                                    <input type="file" name="video" onchange="document.getElementById('video').src = window.URL.createObjectURL(this.files[0])">
                                                    <div style="max-height: 100px; line-height: 100px">
                                                        <video controls src="{{ asset($screensaver->getFullPath()) }}" id="video" style="max-height: 100px"></video>
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

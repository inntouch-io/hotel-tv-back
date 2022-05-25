<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.04.2022 / 16:14
 */

/** @var Application $application */

use Domain\Applications\Entities\Application;

?>
@extends('layouts.main')
@section('title', is_null($application) ? 'Системная ошибка' : $application->getName())

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        {{ is_null($application) ? 'Системная ошибка' : $application->getName() }}
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('applications.infobar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if(is_null($application))
                            <div class="alert alert-danger border-0 alert-dismissible mb-0">
                                <span class="font-weight-semibold">Oh snap!!!</span>
                                {{ $error ?? 'Системная ошибка' }}
                            </div>
                        @else
                            @if(session('success'))
                                <div class="alert alert-success border-0 alert-dismissible col-6">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <span class="font-weight-semibold mr-1">Well done!!!</span>
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(!is_null($error) || session('error'))
                                <div class="alert alert-danger border-0 alert-dismissible col-6">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <span class="font-weight-semibold mr-1">Oh snap!!!</span>
                                    {{ $error ?? session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('admin.applications.update', ['application' => $application->getId()]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="font-weight-bold">Название</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                   placeholder="Название" value="{{ $application->getName() }}"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <label for="url" class="font-weight-bold">Линк</label>
                                            <input type="text" id="url" name="url" class="form-control"
                                                   placeholder="Url" value="{{ $application->getUrl() }}"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <p class="font-weight-semibold">Статус</p>

                                            <div class="border p-3 rounded">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <span class="mr-2">Нет</span>
                                                    @if($application->getIsVisible())
                                                        <input type="checkbox" name="isVisible" class="custom-control-input" id="isVisible" value="1" checked>
                                                    @else
                                                        <input type="checkbox" name="isVisible" class="custom-control-input" id="isVisible" value="1">
                                                    @endif
                                                    <label class="custom-control-label" for="isVisible">Да</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <p class="font-weight-semibold">Image</p>

                                            <div class="border p-3 rounded d-flex align-items-center">
                                                <input type="file" name="image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                                <div style="max-height: 100px; line-height: 100px">
                                                    <img src="{{ asset($application->image->getFullPath()) }}" alt="image" id="image" style="max-height: 100px">
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


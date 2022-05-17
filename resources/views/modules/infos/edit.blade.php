<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 26.04.2022 / 17:43
 */
/** @var \Domain\Modules\Entities\ModuleInfo $moduleInfo */

use Domain\Modules\Entities\ModuleInfo;

?>

@extends('layouts.main')
@section('title', is_null($moduleInfo) ? 'Системная ошибка' : $moduleInfo->getName())

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        {{ is_null($moduleInfo) ? 'Системная ошибка' : $moduleInfo->getName() }}
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('modules.infos.infobar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if(is_null($moduleInfo))
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

                            <form action="{{ route('admin.modules.infos.update', ['id' => $moduleInfo->getId()]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="font-weight-bold">Название</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                   placeholder="Название" value="{{ $moduleInfo->getName() }}"
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

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 22.04.2022 / 16:05
 */

/** @var Module $module */

/** @var ModuleInfo $moduleInfo */

use App\Models\Module;
use App\Models\ModuleInfo;

?>

@extends('layouts.main')
@section('title', $module->getModuleName())

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        {{ is_null($module) ? 'Системная ошибка' : $module->getModuleName() }}
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('modules.infobar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if(is_null($module))
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

                            <form action="{{ route('admin.modules.edit', ['id' => $module->getId()]) }}" method="post">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="module_name" class="font-weight-bold">Название</label>
                                            <input type="text" id="module_name" name="module_name" class="form-control"
                                                   placeholder="Название" value="{{ $module->getModuleName() }}"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <p class="font-weight-semibold">Статус</p>

                                            <div class="border p-3 rounded">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <span class="mr-2">Нет</span>
                                                    @if($module->getStatus())
                                                        <input type="checkbox" name="status" class="custom-control-input" id="status" value="1" checked>
                                                    @else
                                                        <input type="checkbox" name="status" class="custom-control-input" id="status" value="1">
                                                    @endif
                                                    <label class="custom-control-label" for="status">Да</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                <i class="far fa-save"></i>
                                                Сохранить
                                            </button>

                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <i class="far fa-trash-alt"></i>
                                                Удалить
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

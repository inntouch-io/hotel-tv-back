<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 22.04.2022 / 14:36
 */

/** @var Module $module */

/** @var ModuleInfo $moduleInfo */

use App\Models\Module;
use App\Models\ModuleInfo;

?>

@extends('layouts.main')
@section('title', 'Модули')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Модули
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
                        @include('modules.sidebar')
                    </ul>
                </div>
            </div>
        </div>

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if(is_null($list) || count($list) === 0)
                            <div class="alert alert-primary border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">Oh snap!!!</span>
                                Ничего не найдено
                            </div>
                        @else
                            <div class="card card-table table-responsive shadow-none mb-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Название</th>
                                        <th>Название информации</th>
                                        <th>Фото</th>
                                        <th>Позиция</th>
                                        <th>Статус</th>
                                        <th>Добавлен</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($list as $module)
                                        <tr>
                                            <td>
                                                <div class="font-weight-semibold">{{ $module->getId() }}</div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.modules.edit', ['module' => $module->getId()]) }}" class="font-weight-semibold">
                                                    {{ $module->getModuleName() }}
                                                </a>
                                            </td>
                                            <td>
                                                @foreach($module->infos as $moduleInfo)
                                                    <li>
                                                        <a href="#" class="font-weight-semibold">
                                                            [{{ config('app.locales')[$moduleInfo->getLocale()] }}] -
                                                            {{ $moduleInfo->getName() }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </td>
                                            <td>
                                                <img src="{{ asset($module->getModuleIcon()) }}" alt="image">
                                            </td>
                                            <td>
                                                <div class="badge badge-success">{{ $module->getOrderPosition() }}</div>
                                            </td>
                                            <td>
                                                @if($module->getStatus())
                                                    <div class="badge badge-success">Активный</div>
                                                @else
                                                    <div class="badge badge-danger">Неактивный</div>
                                                @endif
                                            </td>
                                            <td>{{ $module->getCreatedAt() }}</td>
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




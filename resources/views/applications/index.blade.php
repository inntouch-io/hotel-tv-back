<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.04.2022 / 15:30
 */

/** @var Application $application */

use Domain\Applications\Entities\Application;

?>

@extends('layouts.main')
@section('title', 'Программы')

@section('content')
    @can('index', Application::class)
        <div class="page-header">
            <div class="page-header-content header-elements-lg-inline">
                <div class="page-title d-flex">
                    <h4>
                    <span class="font-weight-bold">
                        Программы
                    </span>
                    </h4>
                </div>
            </div>
        </div>
    @endcan

    <div class="page-content pt-0">
        <div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
            <div class="sidebar-content">
                <div class="sidebar-section">
                    <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                        @include('applications.sidebar')
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
                                        <th>Фото</th>
                                        <th>Позиция</th>
                                        <th>Статус</th>
                                        <th>Добавлен</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($list as $application)
                                        <tr>
                                            <td>
                                                <div class="font-weight-semibold">{{ $application->getId() }}</div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.applications.edit', ['application' => $application->getId()]) }}" class="font-weight-semibold">
                                                    {{ $application->getName() }}
                                                </a>
                                            </td>
                                            <td>
                                                <div style="line-height: 60px">
                                                    <img src="{{ asset($application->image->getFullPath()) }}" alt="image" style="max-width: 100px">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="badge badge-success">{{ $application->getOrderPosition() }}</div>
                                            </td>
                                            <td>
                                                @if($application->getIsVisible())
                                                    <div class="badge badge-success">Активный</div>
                                                @else
                                                    <div class="badge badge-danger">Неактивный</div>
                                                @endif
                                            </td>
                                            <td>{{ $application->getCreatedAt() }}</td>
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

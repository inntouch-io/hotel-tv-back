<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 06.07.2022 / 12:31
 */

/** @var \Domain\Menus\Entities\Menu $menu */
/** @var \Domain\Menus\Entities\MenuInfo $info */
?>

@extends('layouts.main')
@section('title', 'Menu')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                <span class="font-weight-bold">
                    Menu
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
                        @include('menus.menu.sidebar')
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
                        @if(count($menus) === 0)
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
                                        <th>Название информации</th>
                                        <th>Фото</th>
                                        <th>Статус</th>
                                        <th>Позиция</th>
                                        <th>Добавлен</th>
                                        <th>Type</th>
                                        <th>Редактировать</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($menus as $menu)
                                        <tr>
                                            <td>
                                                <div class="font-weight-semibold">{{ $menu->getId() }}</div>
                                            </td>
                                            <td>
                                                @foreach($menu->infos as $info)
                                                    <li>
                                                        <a href="{{ route('admin.menus.infos.edit', ['info' => $info->getId()]) }}" class="font-weight-semibold">
                                                            [{{ config('app.locales')[$info->getLocale()] }}] -
                                                            {{ $info->getTitle() }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </td>
                                            <td>
                                                <div style="line-height: 60px">
                                                    <img src="{{ asset($menu->image->getFullPath()) }}" alt="image" style="max-width: 100px">
                                                </div>
                                            </td>
                                            <td>
                                                @if($menu->getIsVisible())
                                                    <div class="badge badge-success">Активный</div>
                                                @else
                                                    <div class="badge badge-danger">Неактивный</div>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-success">{{ $menu->getOrderPosition() }}</span>
                                            </td>
                                            <td>{{ $menu->getCreatedAt() }}</td>
                                            <td>
                                                <span class="font-weight-semibold badge badge-secondary">{{ $menu->getType() }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.menus.menu.edit', ['menu' => $menu->getId()]) }}" class="badge badge-secondary">
                                                    <i class="fas fa-edit"></i>
                                                    Редактировать
                                                </a>

                                                <form action="{{ route('admin.menus.menu.destroy', ['menu' => $menu->getId()]) }}" method="post" class="mt-1">
                                                    {{ csrf_field() }}
                                                    @method('DELETE')
                                                    <button type="submit" class="badge badge-danger outline-0 border-0" onclick="return confirm('Are you sure you want to delete this item')">
                                                        <i class="fas fa-trash"></i>
                                                        Удалить
                                                    </button>
                                                </form>
                                            </td>
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

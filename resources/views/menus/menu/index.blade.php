<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 06.07.2022 / 12:31
 */

/** @var \Domain\Menus\Entities\Menu $menu */
/** @var \Domain\Menus\Entities\MenuInfo $info */
/** @var \Illuminate\Database\Eloquent\Collection $menus */
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

                <form method="GET" action="{{ route('admin.menus.menu.index') }}">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="type">Фильтр по Типу:</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Все</option>
                                @foreach($types as $key => $type)
                                    <option value="{{ $key }}" {{ request('type') == $key ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="category">Фильтр по Категории:</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Все</option>
                                @foreach($categories as $key => $category)
                                    <option value="{{ $key }}" {{ request('category') == $key ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 align-self-end">
                            <button type="submit" class="btn btn-primary">Фильтровать</button>
                            <a href="{{ route('admin.menus.menu.index') }}" class="btn btn-secondary">Сбросить</a>
                        </div>
                    </div>
                </form>

                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success border-0 alert-dismissible col-6">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold mr-1">Well done!!!</span>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if($menus->count() === 0)
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
                                        <th>Фото меню</th>
                                        <th>Статус</th>
                                        <th>Позиция</th>
                                        <th>Добавлен</th>
                                        <th>Тип</th>
                                        <th>Категория</th>
                                        <th>Карточки</th>
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
                                                <span class="font-weight-semibold badge badge-primary">{{ config('app.types')[$menu->getType()] ?? $menu->getType() }}</span>
                                            </td>
                                            <td>
                                                <span class="font-weight-semibold badge badge-success">{{ config('app.menu_categories')[$menu->getCategory()] ?? $menu->getCategory() }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.menus.cards.card.index', ['menu_id' => $menu->getId()]) }}" class="font-weight-bold">
                                                    Посмотреть
                                                </a>
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

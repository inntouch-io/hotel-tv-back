<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 18.08.2022 / 16:05
 */

/** @var \Domain\Gallery\Entities\Gallery $photo */
?>

@extends('layouts.main')
@section('title', 'Галерея')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Галерея
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
                        @include('galleries.sidebar')
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
                            @if(session('success'))
                                <div class="alert alert-success border-0 alert-dismissible col-6">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <span class="font-weight-semibold mr-1">Well done!!!</span>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card card-table table-responsive shadow-none mb-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Order position</th>
                                        <th>Добавлен</th>
                                        <th>Редактировать</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($list as $photo)
                                        <tr>
                                            <td>
                                                <div class="font-weight-semibold">{{ $photo->getId() }}</div>
                                            </td>
                                            <td>
                                                <div style="line-height: 60px">
                                                    <img src="{{ asset($photo->image->getFullPath()) }}" alt="image" style="max-width: 100px">
                                                </div>
                                            </td>
                                            <td>
                                                @if($photo->getIsVisible())
                                                    <div class="badge badge-success">Активный</div>
                                                @else
                                                    <div class="badge badge-danger">Неактивный</div>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-secondary">
                                                    {{ $photo->getOrderPosition() }}
                                                </span>
                                            </td>
                                            <td>{{ $photo->getCreatedAt() }}</td>
                                            <td>
                                                    <a href="{{ route('admin.galleries.edit', ['gallery' => $photo->getId()]) }}" class="badge badge-secondary">
                                                    <i class="fas fa-edit"></i>
                                                    Редактировать
                                                </a>

                                                <form action="{{ route('admin.galleries.destroy', ['gallery' => $photo->getId()]) }}" method="post" class="mt-1">
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


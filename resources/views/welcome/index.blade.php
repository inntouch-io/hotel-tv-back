<?php
/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 13.02.2025 / 10:05
 */

/** @var \Domain\Welcome\Entities\Welcome $welcome */
?>

@extends('layouts.main')
@section('title', 'Приветствия')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Приветствия
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
                        @include('welcome.sidebar')
                    </ul>
                </div>
            </div>
        </div>

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if (is_null($welcome) || count($welcome) === 0)
                            <div class="alert alert-primary border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">Oh snap!!!</span>
                                Ничего не найдено
                            </div>
                        @else
                            @if (session('success'))
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
                                            <th>Заголовок</th>
                                            <th>Слоган</th>
                                            <th>Язык</th>
                                            <th>Редактировать</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($welcome as $welcome)
                                            <tr>
                                                <td>
                                                    <div class="font-weight-semibold">{{ $welcome->id }}</div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.welcome.edit', ['welcome' => $welcome->id]) }}"
                                                        class="font-weight-semibold">
                                                        {{ $welcome->text }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="font-weight-semibold">
                                                        {{ Str::limit($welcome->slogan) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="font-weight-semibold">{{ $welcome->language }}</div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.welcome.edit', ['welcome' => $welcome->id]) }}"
                                                        class="badge badge-secondary">
                                                        <i class="fas fa-edit"></i>
                                                        Редактировать
                                                    </a>

                                                    <form
                                                        action="{{ route('admin.welcome.destroy', ['welcome' => $welcome->id]) }}"
                                                        method="POST" class="mt-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="badge badge-danger outline-0 border-0"
                                                            onclick="return confirm('Вы уверены, что хотите удалить?')">
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

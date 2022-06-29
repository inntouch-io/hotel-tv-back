<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.06.2022 / 16:57
 */

/** @var \Domain\Messages\Entities\Message $message */
/** @var \Domain\Messages\Entities\MessageInfo $info */

?>

@extends('layouts.main')
@section('title', 'Сообщения')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                <span class="font-weight-bold">
                    Сообщения
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
                        @include('messages.message.sidebar')
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
                        @if(count($messages) === 0)
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
                                        <th>Добавлен</th>
                                        <th>Карточки</th>
                                        <th>Редактировать</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($messages as $message)
                                        <tr>
                                            <td>
                                                <div class="font-weight-semibold">{{ $message->getId() }}</div>
                                            </td>
                                            <td>
                                                @foreach($message->infos as $info)
                                                    <li>
                                                        <a href="{{ route('admin.messages.infos.edit', ['id' => $info->getId()]) }}" class="font-weight-semibold">
                                                            [{{ config('app.locales')[$info->getLang()] }}] -
                                                            {{ $info->getTitle() }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </td>
                                            <td>
                                                <div style="line-height: 60px">
                                                    <img src="{{ asset($message->image->getFullPath()) }}" alt="image" style="max-width: 100px">
                                                </div>
                                            </td>
                                            <td>{{ $message->getCreatedAt() }}</td>
                                            <td>
                                                <a href="{{ route('admin.messages.message.cards.index', ['id' => $message->getId()]) }}" class="font-weight-semibold">
                                                    Посмотреть
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.messages.message.edit', ['id' => $message->getId()]) }}" class="badge badge-secondary">Редактировать</a>
                                                <a href="{{ route('admin.messages.message.destroy', ['id' => $message->getId()]) }}" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item')">Удалить</a>
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

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
                                        <th>Фото сообщения</th>
                                        <th>Статус</th>
                                        <th>Позиция</th>
                                        <th>Добавлен</th>
                                        <th>Карточки</th>
                                        <th>Категория</th>
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
                                                        <a href="{{ route('admin.messages.infos.edit', ['info' => $info->getId()]) }}" class="font-weight-semibold">
                                                            [{{ config('app.locales')[$info->getLocale()] }}] -
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
                                            <td>
                                                @if($message->getIsVisible())
                                                    <div class="badge badge-success">Активный</div>
                                                @else
                                                    <div class="badge badge-danger">Неактивный</div>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-success">{{ $message->getOrderPosition() }}</span>
                                            </td>
                                            <td>{{ $message->getCreatedAt() }}</td>
                                            <td>
                                                <a href="{{ route('admin.messages.cards.card.index', ['message_id' => $message->getId()]) }}" class="font-weight-semibold">
                                                    Посмотреть
                                                </a>
                                            </td>
                                            <td>
                                                <div class="badge badge-success">{{ $message->getCategory() }}</div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.messages.message.edit', ['message' => $message->getId()]) }}" class="badge badge-secondary">
                                                    <i class="fas fa-edit"></i>
                                                    Редактировать
                                                </a>

                                                <form action="{{ route('admin.messages.message.destroy', ['message' => $message->getId()]) }}" method="post" class="mt-1">
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

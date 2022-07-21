<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 28.06.2022 / 16:49
 */

/** @var \Domain\Messages\Entities\Message $message */
/** @var \Domain\Messages\Entities\MessageCard $card */
/** @var \Domain\Messages\Entities\MessageCardInfo $info */

?>

@extends('layouts.main')
@section('title', 'Карточки')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                <span class="font-weight-bold">
                    Карточки
                </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('messages.cards.card.infobar')
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
                        @if(count($message->cards) === 0)
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
                                        <th>Фото карточки</th>
                                        <th>Статус</th>
                                        <th>Позиция</th>
                                        <th>Добавлен</th>
                                        <th>Редактировать</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($message->cards as $card)
                                        <tr>
                                            <td>
                                                <div class="font-weight-semibold">{{ $card->getId() }}</div>
                                            </td>
                                            <td>
                                                @foreach($card->infos as $info)
                                                    <li>
                                                        <a href="{{ route('admin.messages.cards.infos.edit', ['info' => $info->getId()]) }}" class="font-weight-semibold">
                                                            [{{ config('app.locales')[$info->getLocale()] }}] -
                                                            {{ $info->getTitle() }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </td>
                                            <td>
                                                <div style="line-height: 100px">
                                                    <img src="{{ asset($card->image->getFullPath()) }}" alt="image" style="max-width: 100px">
                                                </div>
                                            </td>
                                            <td>
                                                @if($card->getIsVisible())
                                                    <div class="badge badge-success">Активный</div>
                                                @else
                                                    <div class="badge badge-danger">Неактивный</div>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-success">{{ $card->getOrderPosition() }}</span>
                                            </td>
                                            <td>{{ $card->getCreatedAt() }}</td>
                                            <td>
                                                <a href="{{ route('admin.messages.cards.card.edit', ['card' => $card->getId()]) }}" class="badge badge-secondary">
                                                    <i class="fas fa-edit"></i>
                                                    Редактировать
                                                </a>

                                                <form action="{{ route('admin.messages.cards.card.destroy', ['card' => $card->getId()]) }}" method="post">
                                                    {{ csrf_field() }}
                                                    @method('DELETE')
                                                    <button type="submit" class="badge badge-danger border-0 mt-1" onclick="return confirm('Are you sure you want to delete this item')">
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

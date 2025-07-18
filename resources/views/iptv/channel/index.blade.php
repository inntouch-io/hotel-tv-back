<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 25.07.2022 / 14:37
 */

/** @var \Domain\Iptv\Entities\IptvChannel $channel */
/** @var \Domain\Iptv\Entities\IptvChannelInfo $channelInfo */
?>

@extends('layouts.main')
@section('title', 'Channels')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Channels
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        <div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
            <div class="sidebar-content">
                <div class="sidebar-section">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        @include('iptv.channel.sidebar')
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
                                        <th>Название</th>
                                        <th>Название информации</th>
                                        <th>Фото модуля</th>
                                        <th>Позиция</th>
                                        <th>Статус</th>
                                        <th>Добавлен</th>
                                        <th>Редактировать</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($list as $channel)
                                        <tr>
                                            <td>
                                                <div class="font-weight-semibold">{{ $channel->getId() }}</div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.iptv.channel.edit', ['channel' => $channel->getId()]) }}" class="font-weight-semibold">
                                                    {{ $channel->getTitle() }}
                                                </a>
                                            </td>
                                            <td>
                                                @foreach($channel->infos as $channelInfo)
                                                    <li>
                                                        <a href="{{ route('admin.iptv.infos.edit', ['info' => $channelInfo->getId()]) }}" class="font-weight-semibold">
                                                            [{{ config('app.locales')[$channelInfo->getLocale()] }}] -
                                                            {{ $channelInfo->getTitle() }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </td>
                                            <td>
                                                <div style="line-height: 60px">
                                                    <img src="{{ asset($channel->image->getFullPath()) }}" alt="image" style="max-width: 100px">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="badge badge-success">{{ $channel->getOrderPosition() }}</div>
                                            </td>
                                            <td>
                                                @if($channel->getIsVisible())
                                                    <div class="badge badge-success">Активный</div>
                                                @else
                                                    <div class="badge badge-danger">Неактивный</div>
                                                @endif
                                            </td>
                                            <td>{{ $channel->getCreatedAt() }}</td>
                                            <td>
                                                <a href="{{ route('admin.iptv.channel.edit', ['channel' => $channel->getId()]) }}" class="badge badge-secondary">
                                                    <i class="fas fa-edit"></i>
                                                    Редактировать
                                                </a>

                                                <form action="{{ route('admin.iptv.channel.destroy', ['channel' => $channel->getId()]) }}" method="post" class="mt-1">
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

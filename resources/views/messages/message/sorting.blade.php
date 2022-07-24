<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 22.07.2022 / 14:52
 */

/** @var \Domain\Messages\Entities\Message $message */

?>

@extends('layouts.main')
@section('title', 'Сортировка')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('vendor/nestable/nestable.min.css') }}">
@endsection

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-semibold">
                        Сортировка
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
                        @include('messages.message.sidebar')
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dd" data-toggle="sort-list">
                                        <ol class="dd-list">
                                            @foreach($list as $message)
                                                <li class="dd-item dd-item-alt" data-id="{{ $message->getId() }}">
                                                    <div class="dd-handle"></div>
                                                    <div class="dd-content">
                                                        {{ $message->getOrderPosition() . ') ' }}
                                                        {{ $message->infos->where('locale', '=', 'en')->first()['title'] }}
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
    <script src="{{ asset('vendor/nestable/jquery.nestable.js') }}"></script>
@endsection

@section('script-js')
    <script>
        'use strict';

        let token = '{{ csrf_token() }}';

        $('[data-toggle="sort-list"]').nestable({
            maxDepth: 1,
            callback: function(l, e) {
                $.post(
                    '{{ route('admin.messages.message.sorting') }}',
                    {
                        messages: this.toArray(),
                        _token: token
                    }
                );
            }
        });
    </script>
@endsection

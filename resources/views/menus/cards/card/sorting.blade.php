<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 22.07.2022 / 14:52
 */

/** @var \Domain\Menus\Entities\Menu $menu */
/** @var \Domain\Menus\Entities\MenuCard $card */

$list = $menu->cards;
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
            @include('menus.cards.card.infobar')
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
                                            @foreach($list as $card)
                                                @if($card->infos->count())
                                                    <li class="dd-item dd-item-alt" data-id="{{ $card->getId() }}">
                                                        <div class="dd-handle"></div>
                                                        <div class="dd-content">
                                                            {{ $card->getOrderPosition() . ') ' }}
                                                            {{ $card->infos->first()['title'] }}
                                                        </div>
                                                    </li>
                                                @else
                                                    <li class="dd-item dd-item-alt" data-id="{{ $card->getId() }}">
                                                        <div class="dd-handle"></div>
                                                        <div class="dd-content">
                                                            {{ $card->getOrderPosition() . ') ' }}
                                                            -
                                                        </div>
                                                    </li>
                                                @endif
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
                    '{{ route('admin.menus.cards.card.sorting') }}',
                    {
                        cards: this.toArray(),
                        _token: token
                    }
                );
            }
        });
    </script>
@endsection

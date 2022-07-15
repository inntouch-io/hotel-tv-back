<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 15:46
 */

/** @var \Domain\Messages\Entities\MessageCardInfo $cardInfo */

$message = $cardInfo->card->message;
?>

@extends('layouts.main')
@section('title', is_null($cardInfo) ? 'Системная ошибка' : $cardInfo->getTitle())

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        {{ is_null($cardInfo) ? 'Системная ошибка' : $cardInfo->getTitle() }}
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('messages.cards.infos.infobar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if(is_null($cardInfo))
                            <div class="alert alert-danger border-0 alert-dismissible mb-0">
                                <span class="font-weight-semibold">Oh snap!!!</span>
                                Системная ошибка
                            </div>
                        @else
                            @if(session('success'))
                                <div class="alert alert-success border-0 alert-dismissible col-6">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <span class="font-weight-semibold mr-1">Well done!!!</span>
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('admin.messages.cards.infos.update', ['info' => $cardInfo->getId()]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title" class="font-weight-bold">Название</label>
                                            <input type="text" id="title" name="title" class="form-control"
                                                   placeholder="Название" value="{{ $cardInfo->getTitle() }}"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="font-weight-bold">Описание</label>
                                            <input type="text" id="description" name="description" class="form-control"
                                                   placeholder="Описание" value="{{ $cardInfo->getDescription() }}"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <label for="subDescription" class="font-weight-bold">Подробное описание</label>
                                            <input type="text" id="subDescription" name="subDescription" class="form-control"
                                                   placeholder="Подробное описание" value="{{ $cardInfo->getSubDescription() }}"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                <i class="far fa-save"></i>
                                                Сохранить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form action="{{ route('admin.messages.cards.infos.destroy', ['info' => $cardInfo->getId()]) }}" method="post" class="mt-1 position-absolute" style="bottom: 40px; left: 150px">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this item')">
                                    <i class="fas fa-trash"></i>
                                    Удалить
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

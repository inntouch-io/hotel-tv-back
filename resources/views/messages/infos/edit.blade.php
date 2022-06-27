<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 26.04.2022 / 17:43
 */
/** @var \Domain\Messages\Entities\MessageInfo $messageInfo */

?>

@extends('layouts.main')
@section('title', is_null($messageInfo) ? 'Системная ошибка' : $messageInfo->getTitle())

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        {{ is_null($messageInfo) ? 'Системная ошибка' : $messageInfo->getTitle() }}
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('messages.infos.infobar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if(is_null($messageInfo))
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

                            <form action="{{ route('admin.messages.infos.update', ['id' => $messageInfo->getId()]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title" class="font-weight-bold">Название</label>
                                            <input type="text" id="title" name="title" class="form-control"
                                                   placeholder="Название" value="{{ $messageInfo->getTitle() }}"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="font-weight-bold">Описание</label>
                                            <input type="text" id="description" name="description" class="form-control"
                                                   placeholder="Описание" value="{{ $messageInfo->getDescription() }}"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <label for="longDescription" class="font-weight-bold">Подробное описание</label>
                                            <input type="text" id="longDescription" name="longDescription" class="form-control"
                                                   placeholder="Подробное описание" value="{{ $messageInfo->getLongDescription() }}"
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

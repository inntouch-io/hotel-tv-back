<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 22.04.2022 / 16:05
 */

/** @var \Domain\Iptv\Entities\IptvChannel $channel */
?>

@extends('layouts.main')
@section('title', is_null($channel) ? 'Системная ошибка' : $channel->getTitle())

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        {{ is_null($channel) ? 'Системная ошибка' : $channel->getTitle() }}
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('iptv.channel.infobar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if (is_null($channel))
                            <div class="alert alert-danger border-0 alert-dismissible mb-0">
                                <span class="font-weight-semibold">Oh snap!!!</span>
                                Системная ошибка
                            </div>
                        @else
                            @if (session('success'))
                                <div class="alert alert-success border-0 alert-dismissible col-6">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <span class="font-weight-semibold mr-1">Well done!!!</span>
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('admin.iptv.channel.update', ['channel' => $channel->getId()]) }}"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title" class="font-weight-bold">Название</label>
                                            <input type="text" id="title" name="title" class="form-control"
                                                placeholder="Название" value="{{ $channel->getTitle() }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="country_id" class="font-weight-bold">Country</label>
                                            <select name="country_id" id="country_id" class="form-control" required>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ $channel->country_id == $country->id ? 'selected' : '' }}>
                                                        {{ $country->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="stream_url" class="font-weight-bold">URL трансляции</label>
                                            <input type="text" id="stream_url" name="stream_url" class="form-control"
                                                placeholder="URL трансляции" value="{{ $channel->getStreamUrl() }}"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <p class="font-weight-semibold">Фото каналов</p>

                                            <div class="border p-3 rounded d-flex align-items-center">
                                                <input type="file" name="image"
                                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                                <div style="max-height: 100px; line-height: 100px">
                                                    <img src="{{ asset($channel->image->getFullPath()) }}" alt="image"
                                                        id="image" style="max-height: 100px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <p class="font-weight-semibold">Статус</p>

                                            <div class="border p-3 rounded">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <span class="mr-2">Нет</span>
                                                    @if ($channel->getIsVisible())
                                                        <input type="checkbox" name="isVisible" class="custom-control-input"
                                                            id="isVisible" value="1" checked>
                                                    @else
                                                        <input type="checkbox" name="isVisible" class="custom-control-input"
                                                            id="isVisible" value="1">
                                                    @endif
                                                    <label class="custom-control-label" for="isVisible">Да</label>
                                                </div>
                                            </div>
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

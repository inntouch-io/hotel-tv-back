<?php
/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * @link    https://karaev.uz
 * Created: 07.02.2025 / 17:43
 */
/** @var \Domain\Iptv\Entities\IptvCountryInfo $info */
?>

@extends('layouts.main')
@section('title', is_null($info) ? 'Системная ошибка' : $info->getTitle())

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        {{ is_null($info) ? 'Системная ошибка' : $info->getTitle() }}
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('iptv.country.infos.infobar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if (is_null($info))
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

                            <form action="{{ route('admin.iptv.country.infos.update', ['id' => $info->getId()]) }}"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title" class="font-weight-bold">Название</label>
                                            <input type="text" id="title" name="title" class="form-control"
                                                placeholder="Название" value="{{ $info->getTitle() }}" required>
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

                            <form action="{{ route('admin.iptv.country.infos.destroy', ['id' => $info->getId()]) }}"
                                method="post" class="mt-1 position-absolute" style="bottom: 40px; left: 150px">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this item')">
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

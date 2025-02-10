<?php
/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 61.02.2025 / 14:48
 */

/** @var \Domain\Iptv\Entities\IptvCountry $country */
?>

@extends('layouts.main')
@section('title', 'Добавить перевод')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Добавить перевод
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('iptv.country.infobar')
        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success border-0 alert-dismissible col-6">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold mr-1">Well done!!!</span>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.iptv.country.infos.store', ['countryId' => $country->getId()]) }}"
                            method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title" class="font-weight-bold">Название</label>
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Название" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="locale" class="font-weight-bold">Язык</label>
                                        <select name="locale" id="locale" class="form-control" required>
                                            @foreach (config('app.locales') as $locale => $lang)
                                                @if (in_array($locale, $country->infos->pluck('locale')->toArray()))
                                                    <option value="{{ $locale }}">{{ $lang }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-outline-success"
                                            onclick="submitForm(this)">
                                            <i class="far fa-save"></i>
                                            Сохранить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-js')
    <script>
        function submitForm(btn) {
            // disable the button
            btn.disabled = true;
            // submit the form
            btn.form.submit();
        }
    </script>
@endsection

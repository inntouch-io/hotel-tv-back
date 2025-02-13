<?php
/**
 * Hotel-alphazet.
 *
 * @author  Farrux Orziyev
 * Created: 13.02.2025 / 05:10
 */
?>

@extends('layouts.main')
@section('title', 'Добавить Приветствия')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Добавить Приветствия
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
                        @include('welcome.sidebar')
                    </ul>
                </div>
            </div>
        </div>

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

                        <form action="{{ route('admin.welcome.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('POST')

                            <div class="row">
                                <div class="col-6">
                                    
                                    <div class="form-group">
                                        <label for="title" class="font-weight-bold">Title</label>
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Title" required value="{{ old('title') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="text" class="font-weight-bold">Приветствия</label>
                                        <textarea name="text" id="editor" class="form-control" rows="5" required>{{ old('text') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="slogan" class="font-weight-bold">Slogan</label>
                                        <input type="text" id="slogan" name="slogan" class="form-control"
                                            placeholder="Slogan" required value="{{ old('slogan') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="language" class="font-weight-bold">Language</label>
                                        <select name="language" id="language" class="form-control">
                                            @foreach (config('app.locales') as $key => $locale)
                                                <option value="{{ $key }}">{{ $locale }}</option>
                                            @endforeach
                                        </select>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<?php
/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 08.02.2025 / 16:55
 */
?>

@extends('layouts.main')
@section('title', 'Добавить Module')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-bold">
                        Добавить Module
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
                        @include('modules.module.sidebar')
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

                        <form action="{{ route('admin.modules.module.store') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="module_name" class="font-weight-bold">Название</label>
                                        <input type="text" id="module_name" name="module_name" class="form-control"
                                            placeholder="Название" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="type" class="font-weight-bold">Тип</label>
                                        <input type="text" id="type" name="type" class="form-control"
                                            placeholder="Тип" required>
                                    </div>

                                    <div class="form-group">
                                        <p class="font-weight-bold">Фото модули</p>

                                        <div class="border p-3 rounded d-flex align-items-center">
                                            <input type="file" name="image">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <p class="font-weight-bold">Статус</p>

                                        <div class="border p-3 rounded">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <span class="mr-2">Нет</span>
                                                <input type="checkbox" name="isVisible" class="custom-control-input"
                                                    id="isVisible" value="1">
                                                <label class="custom-control-label" for="isVisible">Да</label>
                                            </div>
                                        </div>
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

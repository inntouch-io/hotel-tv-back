<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.05.2022 / 14:36
 */

?>

@extends('layouts.main')
@section('title', 'Сменить пароль')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-semibold">Сменить пароль</span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        @include('profile.sidebar')

        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible col-6">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.profile.updatePassword') }}" method="post">
                            {{ csrf_field() }}
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="current_password">Текущий пароль</label>
                                        <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Текущий пароль">
                                    </div>

                                    <div class="form-group">
                                        <label for="new_password">Новый пароль</label>
                                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Новый пароль">
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirm">Подтверждение пароля</label>
                                        <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Подтверждение пароля">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-success">
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


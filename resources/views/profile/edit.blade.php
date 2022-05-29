<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.05.2022 / 13:19
 */

?>

@extends('layouts.main')
@section('title', admin()->getFullName())

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-semibold">{{ admin()->getFullName() }}</span>
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

                        <form action="{{ route('admin.profile.update') }}" method="post">
                            {{ csrf_field() }}
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Имя пользователя</label>
                                        <input type="text" id="username" class="form-control" value="{{ admin()->getUsername() }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="full_name">Полное имя</label>
                                        <input type="text" name="full_name" id="full_name" class="form-control" value="{{ admin()->getFullName() }}">
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

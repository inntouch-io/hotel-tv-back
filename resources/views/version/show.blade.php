<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 16.08.2022 / 11:37
 */

/** @var \Domain\AppVersions\Entities\AppVersion $version */

?>

@extends('layouts.main')
@section('title', "Версия приложения")

@section('content')
    <div class="page-header px-5">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-semibold">Версия приложения</span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0 px-5">
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

                        <form action="{{ route('admin.version.upgrade') }}" method="post">
                            {{ csrf_field() }}
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="app_system">Система приложений</label>
                                        <input type="text" id="app_system" class="form-control" value="{{ $version->getAppSystem() }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="app_type">Система приложений</label>
                                        <input type="text" id="app_type" class="form-control" value="{{ $version->getAppType() }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="app_version">Версия приложения</label>
                                        <input type="text" name="app_version" id="app_version" class="form-control" value="{{ $version->getAppVersion() }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="apk_file">APK-файл - <span class="font-weight-bold">{{ $version->getApkFile() }}</span></label>
                                        <input type="file" name="apk_file" id="apk_file">
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

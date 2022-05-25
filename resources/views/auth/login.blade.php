<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 17.05.2022 / 06:13
 */

?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mirfayz Nosirov">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <title>Авторизоваться</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('limitless/global_assets/css/icons/icomoon/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/layout_4/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/layout_4/assets/css/bootstrap_limitless.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/layout_4/assets/css/layout.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/layout_4/assets/css/components.min.css') }}">
</head>
<body>
<div class="page-content">
    <div class="content-wrapper">
        <div class="content d-flex justify-content-center align-items-center">
            <form class="login-form" action="{{ route('admin.auth.login') }}" method="post">
                {{ csrf_field() }}
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            <span class="font-weight-semibold">Ой ой!</span>
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/hotel.png') }}" alt="BILLING HOTEL TV" class="p-3 mb-3 mt-1">
                            <h5 class="mb-0">Вход в свой аккаунт</h5>
                            <span class="d-block text-muted">Введите свои учетные данные ниже</span>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="text" name="username" class="form-control" placeholder="Имя пользователя" title="Имя пользователя">

                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" name="password" class="form-control" placeholder="Пароль" title="Пароль">

                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                Войти в систему
                                <i class="icon-circle-right2 ml-2"></i>
                            </button>
                        </div>

                        <div class="text-center">
                            <a href="#">Забыли пароль?</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

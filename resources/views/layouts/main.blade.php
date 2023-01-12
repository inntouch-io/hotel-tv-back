<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 19.04.2022 / 17:11
 */

/** @var Admin $admin */

use Domain\Admins\Entities\Admin;

$admin = auth()->user();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mirfayz Nosirov">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') :: Панель управления Hotel TV</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('limitless/global_assets/css/icons/icomoon/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/global_assets/css/icons/fontawesome/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/layout_4/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/layout_4/assets/css/bootstrap_limitless.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/layout_4/assets/css/layout.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/layout_4/assets/css/components.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/layout_4/assets/css/colors.min.css') }}">

    @yield('page-css')

    <script src="{{ asset('limitless/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>

    @yield('page-js')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
<body>

<div class="navbar navbar-expand-lg navbar-dark navbar-static">
    <div class="d-flex flex-1 d-lg-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-paragraph-justify3"></i>
            <span class="badge badge-mark border-warning m-1"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link" data-toggle="dropdown">
                    <i class="icon-pulse2"></i>
                    <span class="d-lg-none ml-3">Activity</span>
                    <span class="badge badge-mark border-warning ml-auto ml-lg-0"></span>
                </a>

                <div class="dropdown-menu dropdown-content wmin-lg-350">
                    <div class="dropdown-content-header">
                        <span class="font-weight-semibold">Последняя активность</span>
                    </div>

                    <div class="dropdown-content-body dropdown-scrollable">
                        <ul class="media-list">
                            <li class="media">
                                <div class="media-body">
                                    Shipping cost to the Netherlands has been reduced, database updated
                                    <div class="font-size-sm text-muted mt-1">Feb 8, 11:30</div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown-content-footer bg-light">
                        <a href="#" class="text-body mr-auto">
                            Вся активность
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
        <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
            <a href="#" class="navbar-nav-link navbar-nav-link-toggler d-inline-flex align-items-center h-100 dropdown-toggle" data-toggle="dropdown">
                <img src="" class="rounded-pill" height="34" alt="">
                <span class="d-none d-lg-inline-block ml-2">{{ is_null($admin) ? "Unknown" : $admin->getFullName() }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile.edit') }}" class="dropdown-item"><i class="far fa-id-badge"></i> My profile</a>
                <a href="{{ route('admin.profile.editPassword') }}" class="dropdown-item"><i class="fas fa-key"></i> Сменить пароль</a>
                <a href="{{ route('admin.auth.logout') }}" class="dropdown-item">
                    <i class="icon-switch2"></i>
                    Выйти
                </a>
            </div>
        </li>
    </ul>
</div>

<div class="navbar navbar-expand navbar-light px-0 px-lg-3">
    <div class="overflow-auto overflow-lg-visible scrollbar-hidden flex-1">
        <ul class="navbar-nav flex-row text-nowrap">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="navbar-nav-link">
                    <i class="icon-home4 mr-2"></i>
                    Главная
                </a>
            </li>

            @can('show', \Domain\AppVersions\Entities\AppVersion::class)
            <li class="nav-item">
                <a href="{{ route('admin.version.show') }}" class="navbar-nav-link">
                    <i class="icon-versions"></i>
                    Версия
                </a>
            </li>
            @endcan

            @can('index', \Domain\Rooms\Entities\Room::class)
            <li class="nav-item">
                <a href="{{ route('admin.rooms.index') }}" class="navbar-nav-link">
                    <i class="fas fa-align-left"></i>
                    Комнаты
                </a>
            </li>
            @endcan

            @can('index', \Domain\Modules\Entities\Module::class)
                <li class="nav-item">
                    <a href="{{ route('admin.modules.module.index') }}" class="navbar-nav-link">
                        <i class="fas fa-align-left"></i>
                        Модули
                    </a>
                </li>
            @endcan

            @can('index', \Domain\Applications\Entities\Application::class)
                <li class="nav-item">
                    <a href="{{ route('admin.applications.index') }}" class="navbar-nav-link">
                        <i class="fas fa-edit"></i>
                        Программы
                    </a>
                </li>
            @endcan

            @can('index', \Domain\Messages\Entities\Message::class)
                <li class="nav-item">
                    <a href="{{ route('admin.messages.message.index') }}" class="navbar-nav-link">
                        <i class="fas fa-save"></i>
                        Сообщения
                    </a>
                </li>
            @endcan

            @can('index', \Domain\Menus\Entities\Menu::class)
                <li class="nav-item">
                    <a href="{{ route('admin.menus.menu.index') }}" class="navbar-nav-link">
                        <i class="fas fa-server"></i>
                        Menu
                    </a>
                </li>
            @endcan

            @can('index', \Domain\Iptv\Entities\IptvChannel::class)
            <li class="nav-item">
                <a href="{{ route('admin.iptv.channel.index') }}" class="navbar-nav-link">
                    <i class="icon-tv"></i>
                    IPTV
                </a>
            </li>
            @endcan

            @can('index', \Domain\Gallery\Entities\Gallery::class)
            <li class="nav-item">
                <a href="{{ route('admin.galleries.index') }}" class="navbar-nav-link">
                    <i class="icon-gallery"></i>
                    Галерея
                </a>
            </li>
            @endcan

            <li class="nav-item">
                <a href="{{ route('admin.media.logo.edit') }}" class="navbar-nav-link">
                    <i class="icon-media"></i>
                    Media
                </a>
            </li>

        </ul>
    </div>
</div>

@if ($errors->any())
    <div class="container text-center mt-3 w-50">
        <div class="alert alert-danger">
            <ul style="list-style: none">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@yield('content')

<div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Footer
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">
        <span class="navbar-text">
            &copy; 05/2019 - {{ date('m/Y') }}.
            Разработано в <a href="https://turontelecom.uz/">Турон Телеком</a>.
        </span>

        <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link font-weight-semibold" target="_blank">
                    <span class="text-pink-400">
                        <i class="icon-lifebuoy mr-2"></i>
                        Техническая поддержка
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="navbar-nav-link font-weight-semibold" target="_blank">
                    <span class="text-grey-600">
                        <i class="icon-github mr-2"></i>
                        Mirfayz Nasirov
                    </span>
                </a>
            </li>
        </ul>

        <span class="navbar-text">
            <strong>/ Версия приложения {{ app()->version() }} /</strong>
        </span>
    </div>
</div>

@yield('script-js')
</body>
</html>


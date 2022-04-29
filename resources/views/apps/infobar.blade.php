<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.04.2022 / 16:54
 */

declare(strict_types=1);
/** @var App $app */

use App\Models\App;

$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($app))
                    <li class="nav-item">
                        <a href="{{ route('admin.apps.edit', ['app' => $app->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.apps.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить</span>
                        </a>
                    </li>
                @endif

                @include('apps.sidebar')
            </ul>
        </div>
    </div>
</div>


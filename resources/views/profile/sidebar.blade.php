<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.05.2022 / 13:20
 */

$route_name = request()->route()->getName();

?>

<div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start">
    <div class="sidebar-content">
        <div class="card-body p-0">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item">
                    <a href="{{ route('admin.profile.edit') }}" class="nav-link {{ $route_name === 'admin.profile.edit' ? 'active' : '' }}">
                        <i class="far fa-id-badge"></i>
                        <span>Профиль</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.profile.editPassword') }}" class="nav-link {{ $route_name === 'admin.profile.editPassword' ? 'active' : '' }}">
                        <i class="fas fa-key"></i>
                        <span>Сменить пароль</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

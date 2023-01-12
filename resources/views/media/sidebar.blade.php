<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 15:23
 */

$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                <li class="nav-item">
                    <a href="{{ route('admin.media.logo.edit') }}"
                       class="nav-link {{ $route_name === 'admin.media.logo.edit' ? 'active' : '' }}">
                        <i class="far fa-image"></i>
                        <span>Изменить логотип</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.media.backgroundImage.edit') }}"
                       class="nav-link {{ $route_name === 'admin.media.backgroundImage.edit' ? 'active' : '' }}">
                        <i class="far fa-images"></i>
                        <span>Изменить фоновое изображение</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.media.screensaver.edit') }}"
                       class="nav-link {{ $route_name === 'admin.media.screensaver.edit' ? 'active' : '' }}">
                        <i class="far fa-file-video"></i>
                        <span>Изменить заставку</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

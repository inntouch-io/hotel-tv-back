<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 15:23
 */

/** @var \Domain\Menus\Entities\Menu $menu */

$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($menu))
                    <li class="nav-item">
                        <a href="{{ route('admin.menus.menu.edit', ['menu' => $menu->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.menus.menu.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.menus.infos.create', ['menu_id' => $menu->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.menus.infos.create' ? 'active' : '' }}">
                            <i class="fas fa-plus"></i>
                            <span>Добавить перевод</span>
                        </a>
                    </li>

                    <li class="nav-item-divider"></li>
                @endif

                @include('menus.menu.sidebar')
            </ul>
        </div>
    </div>
</div>

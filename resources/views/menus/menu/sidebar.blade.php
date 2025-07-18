<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 27.06.2022 / 14:13
 */

declare(strict_types=1);

$route_name = request()->route()->getName();
?>

<li class="nav-item">
    <a href="{{ route('admin.menus.menu.index') }}" class="nav-link {{ $route_name === 'admin.menus.menu.index' ? 'active' : '' }}">
        <i class="icon-stack"></i>
        <span>Список</span>
    </a>
    <a href="{{ route('admin.menus.menu.create') }}" class="nav-link {{ $route_name === 'admin.menus.menu.create' ? 'active' : '' }}">
        <i class="fas fa-plus"></i>
        <span>Добавить</span>
    </a>
    <a href="{{ route('admin.menus.menu.typesList') }}" class="nav-link {{ $route_name === 'admin.menus.menu.typesList' ? 'active' : '' }}">
        <i class="icon-sort"></i>
        <span>Сортировка</span>
    </a>
</li>

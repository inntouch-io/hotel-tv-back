<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 22.04.2022 / 15:14
 */
declare(strict_types=1);
$route_name = request()->route()->getName();
?>

<li class="nav-item">
    <a href="{{ route('admin.modules.module.index') }}"
        class="nav-link {{ $route_name === 'admin.modules.module.index' ? 'active' : '' }}">
        <i class="icon-stack"></i>
        <span>Список</span>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.modules.module.create') }}"
        class="nav-link {{ $route_name === 'admin.modules.module.create' ? 'active' : '' }}">
        <i class="fas fa-plus"></i>
        <span>Добавить</span>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.modules.module.sortingList') }}"
        class="nav-link {{ $route_name === 'admin.modules.module.sortingList' ? 'active' : '' }}">
        <i class="icon-sort"></i>
        <span>Сортировка</span>
    </a>
</li>

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 01.02.2025 / 15:14
 */
declare(strict_types=1);
$route_name = request()->route()->getName();
?>

<li class="nav-item">
    <a href="{{ route('admin.iptv.country.index') }}"
        class="nav-link {{ $route_name === 'admin.iptv.country.index' ? 'active' : '' }}">
        <i class="icon-stack"></i>
        <span>Список</span>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.iptv.country.create') }}"
        class="nav-link {{ $route_name === 'admin.iptv.country.create' ? 'active' : '' }}">
        <i class="fas fa-plus"></i>
        <span>Добавить</span>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.iptv.country.sortingList') }}"
        class="nav-link {{ $route_name === 'admin.iptv.country.sortingList' ? 'active' : '' }}">
        <i class="icon-sort"></i>
        <span>Сортировка</span>
    </a>
</li>

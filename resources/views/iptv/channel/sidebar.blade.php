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
    <a href="{{ route('admin.iptv.channel.index') }}" class="nav-link {{ $route_name === 'admin.iptv.channel.index' ? 'active' : '' }}">
        <i class="icon-stack"></i>
        <span>Список</span>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.iptv.channel.create') }}" class="nav-link {{ $route_name === 'admin.iptv.channel.create' ? 'active' : '' }}">
        <i class="fas fa-plus"></i>
        <span>Добавить</span>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.iptv.channel.sortingList') }}" class="nav-link {{ $route_name === 'admin.iptv.channel.sortingList' ? 'active' : '' }}">
        <i class="icon-sort"></i>
        <span>Сортировка</span>
    </a>
</li>


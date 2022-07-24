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
    <a href="{{ route('admin.messages.message.index') }}" class="nav-link {{ $route_name === 'admin.messages.message.index' ? 'active' : '' }}">
        <i class="icon-stack"></i>
        <span>Список</span>
    </a>
    <a href="{{ route('admin.messages.message.create') }}" class="nav-link {{ $route_name === 'admin.messages.message.create' ? 'active' : '' }}">
        <i class="fas fa-plus"></i>
        <span>Добавить</span>
    </a>
    <a href="{{ route('admin.messages.message.sortingList') }}" class="nav-link {{ $route_name === 'admin.messages.message.sortingList' ? 'active' : '' }}">
        <i class="icon-sort"></i>
        <span>Сортировка</span>
    </a>
</li>

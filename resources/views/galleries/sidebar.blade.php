<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 18.08.2022 / 16:33
 */

declare(strict_types=1);

$route_name = request()->route()->getName();

?>

<li class="nav-item">
    <a href="{{ route('admin.galleries.index') }}" class="nav-link {{ $route_name === 'admin.galleries.index' ? 'active' : '' }}">
        <i class="icon-stack"></i>
        <span>Список</span>
    </a>
    <a href="{{ route('admin.galleries.create') }}" class="nav-link {{ $route_name === 'admin.galleries.create' ? 'active' : '' }}">
        <i class="fas fa-plus"></i>
        <span>Добавить</span>
    </a>
{{--    <a href="{{ route('admin.messages.message.sortingList') }}" class="nav-link {{ $route_name === 'admin.messages.message.sortingList' ? 'active' : '' }}">--}}
{{--        <i class="icon-sort"></i>--}}
{{--        <span>Сортировка</span>--}}
{{--    </a>--}}
</li>

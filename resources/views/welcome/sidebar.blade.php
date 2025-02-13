<?php
/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 13.02.2025 / 10:14
 */
declare(strict_types=1);
$route_name = request()->route()->getName();
?>

<li class="nav-item">
    <a href="{{ route('admin.welcome.index') }}"
        class="nav-link {{ $route_name === 'admin.welcome.index' ? 'active' : '' }}">
        <i class="icon-stack"></i>
        <span>Список</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.welcome.create') }}"
        class="nav-link {{ $route_name === 'admin.welcome.create' ? 'active' : '' }}">
        <i class="icon-add"></i>
        <span>Добавить</span>
    </a>
</li>

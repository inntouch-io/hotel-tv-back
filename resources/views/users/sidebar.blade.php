<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 21.07.2022 / 10:14
 */
declare(strict_types=1);
$route_name = request()->route()->getName();
?>

<li class="nav-item">
    <a href="{{ route('admin.users.index') }}" class="nav-link {{ $route_name === 'admin.users.index' ? 'active' : '' }}">
        <i class="icon-stack"></i>
        <span>Список</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.users.create') }}" class="nav-link {{ $route_name === 'admin.users.create' ? 'active' : '' }}">
        <i class="icon-add"></i>
        <span>Добавить</span>
    </a>
</li>

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
    <a href="{{ route('admin.modules.index') }}" class="nav-link {{ $route_name === 'admin.modules.index' ? 'active' : '' }}">
        <i class="icon-stack"></i>
        <span>Список</span>
    </a>
</li>


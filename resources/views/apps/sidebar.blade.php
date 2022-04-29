<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.04.2022 / 15:32
 */

declare(strict_types=1);
/** @var App $application */

use App\Models\App;

$route_name = request()->route()->getName();
?>

<li class="nav-item">
    <a href="{{ route('admin.apps.index') }}" class="nav-link {{ $route_name === 'admin.apps.index' ? 'active' : '' }}">
        <i class="icon-stack"></i>
        <span>Список</span>
    </a>
</li>

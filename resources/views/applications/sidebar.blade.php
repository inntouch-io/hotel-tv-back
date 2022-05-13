<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.04.2022 / 15:32
 */

declare(strict_types=1);
/** @var Application $application */

use App\Domain\Applications\Entities\Application;

$route_name = request()->route()->getName();
?>

<li class="nav-item">
    <a href="{{ route('admin.applications.index') }}" class="nav-link {{ $route_name === 'admin.applications.index' ? 'active' : '' }}">
        <i class="icon-stack"></i>
        <span>Список</span>
    </a>
</li>

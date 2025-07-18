<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 15:23
 */

/** @var \Domain\Modules\Entities\ModuleInfo $moduleInfo */

use Domain\Modules\Entities\ModuleInfo;

$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($moduleInfo))
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.infos.edit', ['id' => $moduleInfo->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.modules.infos.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить перевод</span>
                        </a>
                    </li>
                @endif

                @include('modules.module.sidebar')
            </ul>
        </div>
    </div>
</div>

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 15:23
 */

/** @var \Domain\Modules\Entities\Module $module */

use Domain\Modules\Entities\Module;

$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if (!is_null($module))
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.module.edit', ['id' => $module->getId()]) }}"
                            class="nav-link {{ $route_name === 'admin.modules.module.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('admin.modules.infos.create', ['moduleId' => $module->getId()]) }}"
                        class="nav-link {{ $route_name === 'admin.modules.infos.create' ? 'active' : '' }}">
                        <i class="fas fa-plus"></i>
                        <span>Добавить перевод</span>
                    </a>
                </li>

                @include('modules.module.sidebar')
            </ul>
        </div>
    </div>
</div>

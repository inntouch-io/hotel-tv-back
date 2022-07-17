<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 14:07
 */

/** @var \Domain\Menus\Entities\MenuCardInfo $info */
$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($info))
                    <li class="nav-item">
                        <a href="{{ route('admin.menus.cards.infos.edit', ['info' => $info->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.menus.cards.infos.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить перевод</span>
                        </a>
                    </li>
                @endif

                @if(!is_null($menu))
                    <li class="nav-item">
                        <a href="{{ route('admin.menus.cards.card.index', ['menu_id' => $menu->getId()]) }}" class="nav-link {{ $route_name === 'admin.menus.cards.card.index' ? 'active' : '' }}">
                            <i class="icon-stack"></i>
                            <span>Карточки</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>

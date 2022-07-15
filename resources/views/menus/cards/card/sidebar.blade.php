<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 01.07.2022 / 16:21
 */

/** @var \Domain\Menus\Entities\MenuCard $card */
/** @var \Domain\Menus\Entities\Menu $menu */

$route_name = request()->route()->getName();
?>
<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($card))
                    <li class="nav-item">
                        <a href="{{ route('admin.menus.cards.card.edit', ['card' => $card->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.menus.cards.card.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.menus.cards.infos.create', ['card_id' => $card->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.menus.cards.infos.create' ? 'active' : '' }}">
                            <i class="fas fa-plus"></i>
                            <span>Добавить перевод</span>
                        </a>
                    </li>

                    <li class="nav-item-divider"></li>
                @endif

                @if(!is_null($menu))
                    <li class="nav-item">
                        <a href="{{ route('admin.menus.cards.card.index', ['menu_id' => $menu->getId()]) }}" class="nav-link {{ $route_name === 'admin.menus.cards.index' ? 'active' : '' }}">
                            <i class="icon-stack"></i>
                            <span>Карточки</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>

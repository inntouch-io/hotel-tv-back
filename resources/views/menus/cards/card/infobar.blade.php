<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 15:23
 */

/** @var \Domain\Menus\Entities\Menu $menu */

$route_name = request()->route()->getName();

?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($menu))
                    <li class="nav-item">
                        <a href="{{ route('admin.menus.cards.card.index', ['menu_id' => $menu->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.menus.cards.card.index' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Карточки</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.menus.cards.card.create', ['menu_id' => $menu->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.menus.cards.card.create' ? 'active' : '' }}">
                            <i class="fas fa-plus"></i>
                            <span>Добавить</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.menus.cards.card.sortingList', ['menu_id' => $menu->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.menus.cards.card.sortingList' ? 'active' : '' }}">
                            <i class="icon-sort"></i>
                            <span>Сортировка</span>
                        </a>
                    </li>

                    <li class="nav-item-divider"></li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('admin.menus.menu.index') }}" class="nav-link {{ $route_name === 'admin.menus.menu.index' ? 'active' : '' }}">
                        <i class="icon-stack"></i>
                        <span>Список</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

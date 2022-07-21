<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 21.07.2022 / 10:56
 */

$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($room))
                    <li class="nav-item">
                        <a href="{{ route('admin.rooms.edit', ['room' => $room->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.rooms.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить</span>
                        </a>
                    </li>
                @endif

                @include('rooms.sidebar')
            </ul>
        </div>
    </div>
</div>

<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 15:23
 */

/** @var \Domain\Messages\Entities\Message $message */

$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($message))
                    <li class="nav-item">
                        <a href="{{ route('admin.messages.message.edit', ['id' => $message->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.messages.message.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.messages.infos.create', ['id' => $message->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.messages.infos.create' ? 'active' : '' }}">
                            <i class="fas fa-plus"></i>
                            <span>Добавить перевод</span>
                        </a>
                    </li>

                    <li class="nav-item-divider"></li>
                @endif

                @include('messages.message.sidebar')
            </ul>
        </div>
    </div>
</div>

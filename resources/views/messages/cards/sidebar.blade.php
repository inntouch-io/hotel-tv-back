<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 01.07.2022 / 16:21
 */

/** @var \Domain\Messages\Entities\MessageCard $card */
/** @var \Domain\Messages\Entities\Message $message */

$route_name = request()->route()->getName();
?>
<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($card))
                    <li class="nav-item">
                        <a href="{{ route('admin.messages.cards.edit', ['card' => $card->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.messages.cards.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                           class="nav-link {{ $route_name === 'admin.messages.infos.create' ? 'active' : '' }}">
                            <i class="fas fa-plus"></i>
                            <span>Добавить перевод</span>
                        </a>
                    </li>

                    <li class="nav-item-divider"></li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('admin.messages.cards.index', ['message_id' => $message->getId()]) }}" class="nav-link {{ $route_name === 'admin.messages.cards.index' ? 'active' : '' }}">
                        <i class="icon-stack"></i>
                        <span>Карточки</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

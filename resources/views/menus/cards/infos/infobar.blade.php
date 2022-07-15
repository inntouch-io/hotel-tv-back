<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 14:07
 */

/** @var \Domain\Messages\Entities\MessageCardInfo $cardInfo */
$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($cardInfo))
                    <li class="nav-item">
                        <a href="{{ route('admin.messages.cards.infos.edit', ['info' => $cardInfo->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.messages.cards.infos.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить перевод</span>
                        </a>
                    </li>
                @endif

                @if(!is_null($message))
                    <li class="nav-item">
                        <a href="{{ route('admin.messages.cards.card.index', ['message_id' => $message->getId()]) }}" class="nav-link {{ $route_name === 'admin.messages.cards.index' ? 'active' : '' }}">
                            <i class="icon-stack"></i>
                            <span>Карточки</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>

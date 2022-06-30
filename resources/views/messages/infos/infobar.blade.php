<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 15:23
 */

/** @var \Domain\Messages\Entities\MessageInfo $messageInfo */

$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($messageInfo))
                    <li class="nav-item">
                        <a href="{{ route('admin.messages.message.infos.edit', ['info' => $messageInfo->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.messages.message.infos.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить перевод</span>
                        </a>
                    </li>
                @endif

                @include('messages.message.sidebar')
            </ul>
        </div>
    </div>
</div>

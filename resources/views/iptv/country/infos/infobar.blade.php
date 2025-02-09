<?php
/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * @link    https://karaev.uz
 * Created: 07.02.2025 / 15:23
 */

/** @var \Domain\Iptv\Entities\IptvCountryInfo $info */

$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if (!is_null($info))
                    <li class="nav-item">
                        <a href="{{ route('admin.iptv.country.infos.edit', ['id' => $info->getId()]) }}"
                            class="nav-link {{ $route_name === 'admin.iptv.country.infos.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить перевод</span>
                        </a>
                    </li>

                    <li class="nav-item-divider"></li>
                @endif

                @include('iptv.country.sidebar')
            </ul>
        </div>
    </div>
</div>

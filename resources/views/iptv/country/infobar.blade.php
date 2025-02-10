<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 15:23
 */

/** @var \Domain\Iptv\Entities\IptvCountry $country */

$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if (!is_null($country))
                    <li class="nav-item">
                        <a href="{{ route('admin.iptv.country.edit', ['id' => $country->getId()]) }}"
                            class="nav-link {{ $route_name === 'admin.iptv.country.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.iptv.country.infos.create', ['countryId' => $country->getId()]) }}"
                            class="nav-link {{ $route_name === 'admin.iptv.country.infos.create' ? 'active' : '' }}">
                            <i class="fas fa-plus"></i>
                            <span>Добавить перевод</span>
                        </a>
                    </li>

                    <li class="nav-item-divider"></li>
                @endif

                @include('iptv.country.sidebar')
            </ul>
        </div>
    </div>
</div>

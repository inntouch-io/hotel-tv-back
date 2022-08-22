<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 22.08.2022 / 14:08
 */

/** @var \Domain\Gallery\Entities\Gallery $gallery */
$route_name = request()->route()->getName();
?>

<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <ul class="nav nav-sidebar my-2" data-nav-type="accordion">
                @if(!is_null($gallery))
                    <li class="nav-item">
                        <a href="{{ route('admin.galleries.edit', ['gallery' => $gallery->getId()]) }}"
                           class="nav-link {{ $route_name === 'admin.galleries.edit' ? 'active' : '' }}">
                            <i class="far fa-edit"></i>
                            <span>Изменить</span>
                        </a>
                    </li>

                    <li class="nav-item-divider"></li>
                @endif

                @include('galleries.sidebar')
            </ul>
        </div>
    </div>
</div>

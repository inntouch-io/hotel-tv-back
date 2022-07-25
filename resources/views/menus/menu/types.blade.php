<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 25.07.2022 / 12:05
 */

?>

@extends('layouts.main')
@section('title', 'Types')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <span class="font-weight-semibold">
                        Types
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">
        <div class="sidebar sidebar-light sidebar-secondary sidebar-expand-lg align-self-start">
            <div class="sidebar-content">
                <div class="sidebar-section">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        @include('menus.menu.sidebar')
                    </ul>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                               <ul>
                                   @foreach(config('app.types') as $slug => $type)
                                       <li>
                                           <a href="{{ route('admin.menus.menu.sortingList', ['type' => $slug]) }}" class="font-weight-bold">{{ $type }}</a>
                                       </li>
                                   @endforeach
                               </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

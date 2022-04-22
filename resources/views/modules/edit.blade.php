<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 22.04.2022 / 16:05
 */

/** @var Module $module */
/** @var ModuleInfo $moduleInfo */

use App\Models\Module;
use App\Models\ModuleInfo;

?>

@extends('layouts.main')
@section('title', $module->getModuleName())

@section('content')

@endsection

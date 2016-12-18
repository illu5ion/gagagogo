@extends('installer.layout')
@section('title', trans('installer.updater'))

@section('content')

<h2>{{ trans('installer.update') }} {{ Config::get('site.application_name') }}</h2>
<hr>

<a href="{{ URL::to('updater/update') }}">{{ trans('installer.update_confirmation') }}</a>

@stop
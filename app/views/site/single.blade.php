@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Site
@stop

{{-- New Laravel 4 Feature in use --}}
@section('styles')
@parent
body {
	background: #f2f2f2;
}
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>{{ $site->url }}</h1>
</div>



@stop

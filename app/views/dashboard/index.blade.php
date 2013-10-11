@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Account
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
	<h1>Dashboard</h1>
</div>

<table class="table">
	<tr>
		<th>ID</th>
		<th>Path</th>
		<th>Added By</th>
	</tr>
	@foreach ($sites as $site)
		<tr>
			<td><?php echo $site->id; ?></td>
	    	<td><?php echo $site->url; ?></td>
	    	<td><?php
	    		$user = User::find($site->created_by);
	    		echo $user->email;
	    	?></td>
		</tr>
	@endforeach
</table>

@stop

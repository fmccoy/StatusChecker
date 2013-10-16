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
		<th></th>
		<th></th>
	</tr>
	@foreach ($sites as $site)
		<tr>
			<td><?php echo $site->id; ?></td>
	    	<td><?php echo $site->url; ?></td>
	    	<td><?php
	    		$user = User::find($site->created_by);
	    		echo $user->email;
	    	?></td>
	    	<td><a href="{{ route('site.show', $site->id ) }}" class="btn btn-primary btn-lg"><i class="icon icon-eye-open"></i></a></td>
	    	<td><a data-toggle="modal" href="#modal-<?php echo $site->id; ?>" class="btn btn-primary btn-lg"><i class="icon icon-trash"></i></a></td>
		</tr>


		<div class="modal fade" id="modal-<?php echo $site->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h4 class="modal-title">Delete</h4>
		        </div>
		        <div class="modal-body">
		         <p>Are you sure you want to delete {{ $site->url }}?</p>
		        </div>
		        <div class="modal-footer">
		        	{{ Form::open(array('action' => array('SiteController@destroy', $site->id ), 'method' => 'delete')) }}
		          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		          		
		          		{{ Form::submit('Confirm', array('class' => 'btn btn-primary')) }}
		          	{{ Form::close() }}
		        </div>
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->
	@endforeach
</table>



@stop

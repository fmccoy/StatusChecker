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
	<h1>New Site</h1>
</div>

{{ Form::open(array('route' => 'site.store', 'method' => 'post', 'class' => 'form-horizontal' )) }}


	<!-- CSRF Token -->
	<input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />

	<!-- Protocol -->
	<div class="control-group {{{ $errors->has('protocol') ? 'error' : '' }}}">
		<label class="control-label" for="protocol">Protocol</label>
		
	</div>
	<!-- ./ Protocol -->

	<!-- Path -->
	<div class="control-group {{{ $errors->has('path') ? 'error' : '' }}}">
		<label class="control-label" for="path">Path</label>
		<div class="controls">
			<select name="protocol" id="protocol" class="form-control">
			  <option value="http://">http://</option>
			  <option value="https://">https://</option>
			</select>
			{{{ $errors->first('protocol') }}}
		</div>
		<div class="controls">
			<input type="text" name="path" id="path" value="{{{ Input::old('path') }}}" />
			{{{ $errors->first('path') }}}
		</div>
	</div>
	<!-- ./ Path -->

	<!-- Login button -->
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Submit</button>
		</div>
	</div>
	<!-- ./ login button -->

</form>



@stop

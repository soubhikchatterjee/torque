@extends('layouts.connect')
@section('connection')
@include('blocks.notification')
<section class="login_content">
		<form method="post" action="{{ url('/connect') }}">

		<h1>{{ trans('main.connect_redis') }}</h1>
		<div>
			<select name="sel_language" id="sel_language" class="form-control" >
				<option value="english" {{ (Session::get('locale') == 'en') ? 'selected' : '' }}>English</option>
				<option value="french" {{ (Session::get('locale') == 'fr') ? 'selected' : '' }}>Français</option>
			</select>
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<br/>
		<div>
			<input type="text" name="txt_hostname" id="txt_hostname" class="form-control" placeholder="{{ trans('main.enter_hostname') }}" required="" />
		</div>
		<div>
			<input type="text" class="form-control" placeholder="{{ trans('main.enter_port') }}" required="required" name="txt_port" id="txt_port" />
		</div>
		<div>
			<button type="submit" class="btn btn-default submit">{{ trans('main.connect') }}</button>
		</div>
		<div class="clearfix"></div>
		<div class="separator">
			<div class="clearfix"></div>
			<br />
			<div>
				<h1>
					<image src="{{URL::asset('images/logo/torque_logo_30p.png')}}"> 
					{{ trans('main.name')}}
				</h1>
				<div class="weblink">
					<a href="http://torqueapp.org" target="_blank">www.torqueapp.org</a>
				</div>

				<p>{!! trans('main.maintained_by') !!}</p>
			</div>
		</div>
		<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
	</form>
</section>
@endsection('connection')
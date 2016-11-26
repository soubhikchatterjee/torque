@extends('layouts.main')
@section('data-table')
@include('blocks.notification')

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{ trans('main.server_information') }}</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
			<pre>{{ $data }}</pre>
			</div>
		</div>
	</div>
</div>
@endsection
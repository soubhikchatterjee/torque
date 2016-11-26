@extends('layouts.main')
@section('data-table')
@include('blocks.notification')

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{ $key_name }}</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				{{ trans('type/zset.score') }}: {!! $score !!}
			</div>
			<div class="x_content">
				{!! nl2br(base64_decode($data)) !!}
			</div>			
		</div>
		<button type="button" class="btn btn-dark" onclick="location.href='{{ url('/view') }}/{{ $key_name }}'">{{ trans('main.back') }}</button>
	</div>
</div>
@endsection
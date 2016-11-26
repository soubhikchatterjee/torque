@extends('layouts.main')
@section('data-table')
@include('blocks.notification')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{ trans('main.configuration') }}</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
			@if (isset($config))
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Configuration</th>
							<th>Value</th>
						</tr>
					</thead>
					<tbody>
						@foreach($config as $key => $value)
						<tr>
							<td>{{ $key }}</td>
							<td>{{ $value }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			@endif				
			</div>
		</div>
	</div>
</div>
@endsection
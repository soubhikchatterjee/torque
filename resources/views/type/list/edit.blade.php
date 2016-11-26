@extends('layouts.main')
@section('data-table')
@include('blocks.notification')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{ str_limit($key_name, 120) }}</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="post" action="{{ url('/list/edit') }}">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel2">{{ trans('type/list.edit_title') }}</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
						<label class="control-label col-md-3 col-lg-3 col-xs-12" for="first-name">{{ trans('main.value') }} <span class="required">*</span>
							</label>
							<div class="col-md-6 col-lg-6 col-xs-12">
								<textarea id="txt_value" required="required" class="form-control" name="txt_value" data-parsley-minlength="1" data-parsley-validation-threshold="0" data-parsley-id="40" style="height: 150px;" tabindex="1">{{ $data }}</textarea>          
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
						<input type="hidden" name="_key" value="{{{ $key_name }}}" />
						<input type="hidden" id="_index" name="_index" value="{{ $index }}"/>
						<input type="hidden" name="_method" value="PUT"/>
						<button type="submit" class="btn btn-primary">{{ trans('main.update') }}</button>
					</div>
				</form>



			</div>
		</div>
		<button type="button" class="btn btn-dark" onclick="location.href='{{ url('/view') }}/{{ $key_name }}'">{{ trans('main.back') }}</button>
	</div>
</div>
@endsection
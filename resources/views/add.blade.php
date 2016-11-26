@extends('layouts.main')
@section('data-table')
@include('blocks.notification')

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{ trans('main.add_new_key') }}</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="post" action="{{ url('/addSubmit') }}">
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Type <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" id="sel_data_type" name="sel_data_type">
								<option value="string">String</option>
								<option value="hash">Hash</option>
								<option value="list">List</option>
								<option value="set">Set</option>
								<option value="zset">ZSet</option>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_key">{{ trans('main.key') }} <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="txt_key" name="txt_key" required="required" class="form-control col-md-7 col-xs-12" tabindex="1">
						</div>
					</div>
					<div id="dv_hash_key" class="item form-group hidden">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_hash_key">{{ trans('main.hash_key') }} <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="txt_hash_key" name="txt_hash_key" class="form-control col-md-7 col-xs-12" tabindex="2">
						</div>
					</div>					
					<div id="dv_score" class="item form-group hidden">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_score">{{ trans('main.score') }} <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="txt_score" name="txt_score"  data-validate-minmax="1,10000" class="form-control col-md-7 col-xs-12" tabindex="4">
						</div>
					</div>					
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_value">{{ trans('main.value') }} <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea id="txt_value" class="form-control" name="txt_value" data-parsley-id="40" tabindex="5"></textarea>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_value">{{ trans('main.set_expiry') }} ({{ trans('main.seconds') }})
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="txt_expiry" name="txt_expiry" required="required" class="form-control col-md-7 col-xs-12 width100 center" tabindex="6" value="-1"> 
								&nbsp;<span class="line-height35">({{ trans('main.expiry_tips') }})</span>
						</div>
					</div>					
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
							<button id="send" type="submit" class="btn btn-primary">{{ trans('main.add') }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
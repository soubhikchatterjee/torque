<div class="modal fade hash-add" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="post" action="{{ url('/hash/add') }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">{{ trans('type/hash.add_title') }}</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-md-3 col-lg-3 col-xs-12" for="txt_hash_key">{{ trans('type/hash.hash_key') }} <span class="required">*</span>
            </label>
            <div class="col-md-6 col-lg-6 col-xs-12">
            <input type="text" id="txt_hash_key" name="txt_hash_key" required="required" class="form-control col-md-7 col-xs-12" tabindex="1">          
            </div>
          </div>          
          <div class="form-group">
            <label class="control-label col-md-3 col-lg-3 col-xs-12" for="txt_value">{{ trans('main.value') }} <span class="required">*</span>
            </label>
            <div class="col-md-6 col-lg-6 col-xs-12">
              <textarea id="txt_value" class="form-control" name="txt_value" data-parsley-minlength="1" data-parsley-id="40" style="height: 150px;" tabindex="1"></textarea>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <input type="hidden" name="_key" value="{{{ $key_name }}}" />
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('main.close') }}</button>
          <button type="submit" class="btn btn-primary">{{ trans('main.save') }}</button>
        </div>
      </div>
    </div>
  </div>
</form>
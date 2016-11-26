<div class="modal fade key-edit" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="post" action="{{ url('/editSubmit') }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">{{ trans('main.edit_key') }}</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="col-md-12 col-lg-12 col-xs-12">
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_key">{{ trans('main.key') }} <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="txt_key" name="txt_key" required="required" class="form-control col-md-7 col-xs-12" tabindex="1" value="{{ $key_name }}">
                </div>
              </div>         
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_value">{{ trans('main.set_expiry') }} ({{ trans('main.seconds') }})
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="txt_expiry" name="txt_expiry" required="required" class="form-control col-md-7 col-xs-12 width100 center" tabindex="6" value="{{ $ttl }}"> 
                    &nbsp;<span class="line-height35">({{ trans('main.expiry_tips') }})</span>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <input type="hidden" name="_method" value="PUT"/>
          <input type="hidden" name="_old_key" value="{{{ $key_name }}}" />
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('main.close') }}</button>
          <button type="submit" class="btn btn-primary">{{ trans('main.update') }}</button>
        </div>
        </form>
      </div>
    </div>
  </div>
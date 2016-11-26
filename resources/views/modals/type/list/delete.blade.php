<div class="modal fade list-delete" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="post" action="{{ url('/list/delete') }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">{{ trans('main.confirmation') }}</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="col-md-12 col-lg-12 col-xs-12">
              <h2 id="head_delete">{{ trans('main.delete_description') }}</h2> 
              <h6><label><input type="checkbox" name="remove_all_elements" value="1"> {{ trans('main.remove_all_elements') }}</label></h6>     
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <input type="hidden" name="_key" value="{{{ $key_name }}}" />
          <input type="hidden" id="_txt_value" name="_txt_value" value="{{{ $key_name }}}" />
          <input type="hidden" name="_method" value="DELETE"/>
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('main.close') }}</button>
          <button type="submit" class="btn btn-danger">{{ trans('main.delete') }}</button>
        </div>
        </form>
      </div>
    </div>
  </div>
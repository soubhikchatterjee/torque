@extends('layouts.main')
@section('data-table')
@include('blocks.notification')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
      <h2>{{ str_limit($key_name, 100) }}</h2>
          <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target=".key-delete">{{ trans('main.delete_key') }}</button>
          <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target=".key-edit">{{ trans('main.edit_key') }}</button>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

       @include('blocks.key-info')

        <div class="float-right margin-bottom45">
          @include('modals/key/edit')
          @include('modals/key/delete')
          @include('modals/type/string/add')
          @include('modals/type/string/delete')
        </div>
        <table class="table table-striped table-bordered margin-top40">
          <thead>
            <tr>
              <th>{{ trans('main.values') }}</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td title="{{ $data }}">{{ str_limit($data, 100) }}</td>

              <td align="center" width="100"><a href="{{ url('/string/view') }}/{{ $key_name }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> {{ trans('main.view') }} </a></td>
              
              <td align="center" width="100"><a href="{{ url('/string/edit') }}/{{ $key_name }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {{ trans('main.edit') }} </a></td>
              
              <td align="center" width="100"><a href="javascript:;" onclick="document.getElementById('_txt_value').value = '{{ $data }}'" data-toggle="modal" data-target=".string-delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> {{ trans('main.delete') }} </a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

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

        <div class="float-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".zset-add">{{ trans('main.add_value') }}</button>
          @include('modals/key/edit')
          @include('modals/key/delete')
          @include('modals/type/zset/add')
          @include('modals/type/zset/delete')
        </div>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>{{ trans('main.score') }}</th>
              <th>{{ trans('main.value') }}</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          @foreach($data as $record => $score)
            <tr>
              <td>{{ $score }}</td>
              <td title="{{ $record }}">{{ str_limit($record, 100) }}</td>

              <td align="center" width="100"><a href="{{ url('/zset/view') }}/{{ $key_name }}/{{ base64_encode($record) }}/{{ $score }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> {{ trans('main.view') }} </a></td>
              
              <td align="center" width="100"><a href="{{ url('/zset/edit') }}/{{ $key_name }}/{{ base64_encode($record) }}/{{ $score }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {{ trans('main.edit') }} </a></td>
              
              <td align="center" width="100"><a href="javascript:;" onclick="document.getElementById('_zset_key').value = '{{ $record }}'" data-toggle="modal" data-target=".zset-delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> {{ trans('main.delete') }} </a></td>
            </tr>
          @endforeach  
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

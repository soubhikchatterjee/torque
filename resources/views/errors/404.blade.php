@extends('layouts.main')
@section('data-table')
      <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">{{ trans('error.404') }}</h1>
              <h2>{{ trans('error.cannot_find_page') }}</h2>
              <p>{{ trans('error.page_does_not_exits') }}</p>
              <div class="mid_center">
              <button type="button" class="btn btn-dark" onclick="location.href='{{ url('/home') }}'">{{ trans('main.dashboard') }}</button>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->
@endsection
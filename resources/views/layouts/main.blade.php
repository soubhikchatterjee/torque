<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ trans('main.name')}} - {{ trans('main.slogan')}}</title>
    @php
      $public = ''
    @endphp
    <!-- Bootstrap -->
    <link href="{{ asset($public . 'vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset($public . 'vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset($public . 'vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset($public . 'vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset($public . 'vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset($public . 'vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset($public . 'vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset($public . 'vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset($public . 'vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset($public . 'build/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset($public . 'custom/css/developer.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('home') }}" class="site_title">
              <image src="{{URL::asset('images/logo/torque_logo__white_30p.png')}}"> 
              <span>{{ trans('main.name') }}</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="form-group1  top_search">
                  <div class="input-group">
                    <input type="text" id="search_input" class="form-control" placeholder="Filter Keys">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">&nbsp;</button>
                    </span>
                  </div>
                </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li class="active"><a><i class="fa fa-key"></i> Keys <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" id="search_list" style="display: block;">
                    @if (isset($keys))
                      @foreach ($keys as $key)
                      <li><a href="/view/{{ $key }}" title="{{ $key }}">{{ str_limit($key, 60) }}</a></li>
                      @endforeach  
                    @endif
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a href="{{ route('home') }}" data-toggle="tooltip" data-placement="top" title="{{ trans('main.home') }}">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
              </a>
              <a href="{{ url('/add') }}" data-toggle="tooltip" data-placement="top" title="{{ trans('main.add_key') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              </a>              
              <a href="{{ url('/info') }}" data-toggle="tooltip" data-placement="top" title="{{ trans('main.server_information') }}">
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
              </a>
              <a href="{{ url('/disconnect') }}" data-toggle="tooltip" data-placement="top" title="{{ trans('main.disconnect') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main1">
          <div class="">
            <div class="clearfix"></div>
              <div id="data-table">
                  @yield('data-table')
              </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            {!! trans('main.footer') !!}
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset($public . 'vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset($public . 'vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset($public . 'vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset($public . 'vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset($public . 'vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset($public . 'vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset($public . 'vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset($public . 'vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset($public . 'vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset($public . 'vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset($public . 'vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset($public . 'vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset($public . 'vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset($public . 'vendors/parsleyjs/dist/parsley.min.js') }}"></script>
    <script src="{{ asset($public . 'vendors/fastlivefilter/jquery.fastlivefilter.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset($public . 'build/js/custom.js') }}"></script>
    <script src="{{ asset($public . 'custom/js/developer.js') }}"></script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {

          $('#datatable').dataTable();

          $.listen('parsley:field:validate', function() {
            validateFront();
          });

          $('#demo-form2 .btn').on('click', function() {
            $isValid = $('#demo-form2').parsley().validate();
            validateFront();
            if ($isValid) {
              parent.location.reload();
            }
          });

          var validateFront = function() {
            if (true === $('#demo-form2').parsley().isValid()) {
              $('.bs-callout-info').removeClass('hidden');
              $('.bs-callout-warning').addClass('hidden');
            } else {
              $('.bs-callout-info').addClass('hidden');
              $('.bs-callout-warning').removeClass('hidden');
            }
          };

      });


    </script>
    <!-- /Datatables -->
  </body>
</html>
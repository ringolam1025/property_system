<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name', 'MyHome') }}</title>
    <link href="{{asset('assets/img/ico_logo.png')}}" rel="shortcut icon"/>
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <!--<link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet">--> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pace.min.css') }}" rel="stylesheet">

    @yield('css')
    <link href="{{ asset('css/coreui-chartjs.css') }}" rel="stylesheet">
    @yield('tmp')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    
    {{-- ChartStyle --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('app-assets/css/select2/select2.css')}}" />

  </head>

  <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      @include('dashboard.shared.nav-builder')
      @include('dashboard.shared.header')
      <div class="c-body">
        <main class="c-main">
          <div class="container-fluid">
            <div class="animated fadeIn">
              <!-- Message -->
              @if (session()->has('success'))
              <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i>Great!</h4>
                  {{ Session::get('success')}}
              </div>
              @endif

              @if(session()->has('info'))
              <div class="alert alert-info alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-info"></i>You should know</h4>
                  {{ Session::get('info')}}
              </div>
              @endif

              @if(session()->has('warning'))
              <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-warning"></i>Be careful!</h4>
                  {{ Session::get('warning')}}
              </div>
              @endif

              @if(session()->has('danger'))
              <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i>Danger!</h4>
                  {{ Session::get('danger')}}
              </div>
              @endif
              <!-- Message -->
              
              @yield('content') 
            </div>
          </div>
        </main>
      </div>
      @include('dashboard.shared.modal-area')
      @include('dashboard.shared.footer')
    </div>

    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/pace.min.js') }}"></script> 
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>

    <!-- Added -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!-- Added -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    @yield('javascript')
    <script type="text/javascript">
      $(document).ready(function(){
        $(".alert").delay(5000).fadeOut(300);});
        $('.select2').select2();
        $('.summernote').summernote({ height:300, });
    </script>
    @yield('customjs')
  </body>
</html>

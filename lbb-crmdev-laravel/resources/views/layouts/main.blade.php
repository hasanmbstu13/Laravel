<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>SimpleAdmin - Responsive Admin Dashboard Template</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta content="Coderthemes" name="author" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name = "csrf-token" content="{{ csrf_token() }}">
      <link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">

      <!-- DataTables -->
      <link href="{{ asset('plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('plugins/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('plugins/datatables/dataTables.colVis.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('plugins/datatables/fixedColumns.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>

      {{-- Select Picker --}}
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="{{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">

      <!-- Bootstrap core CSS -->
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      {{-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet"> --}}
      <!-- Icons CSS -->
      <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
      {{-- <link href="{{ asset('plugins/noty/lib/noty.css') }}" rel="stylesheet"> --}}
   </head>
   <body>
      <div id="page-wrapper">

         <!-- Top Bar Start -->
         @include('partials.nav')
         <!-- Top Bar End -->


         <!-- Page content start -->
         <div class="page-contentbar">

            <!-- START PAGE CONTENT -->
            <div id="page-right-content">

               @yield('content')
               <!-- end container -->
               @section('footer')
                  @include('partials.footer')
               @show
               <!-- end footer -->              
            </div>
            <!-- End #page-right-content -->

            <div class="clearfix"></div>
         </div>
         <!-- end .page-contentbar -->
      </div>
      <!-- End #page-wrapper -->

      @section('script')
      <!-- js placed at the end of the document so the pages load faster -->
      <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
      <script src="{{ asset('plugins/noty/jquery.noty.packaged.min.js') }}" type="text/javascript"></script>
      <!-- Latest compiled and minified JavaScript -->
      <script src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

      <script src="{{ asset('js/main.js') }}"></script>
      @show

      @stack('child-script')
      
      <div class="loader"></div>
   </body>
</html>
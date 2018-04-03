<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SimpleAdmin - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
		
		 <!-- DataTables -->
        <link href="{{ asset('plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('plugins/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('plugins/datatables/dataTables.colVis.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('plugins/datatables/fixedColumns.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
		
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Icons CSS -->
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
		
    </head>


    <body>

        <div id="page-wrapper">

            <!-- Top Bar Start -->
             @include('partials.lead-selection-nav')
            <!-- Top Bar End -->


              @yield('content')



                    <div class="footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="pull-right hidden-xs">
                                        Project Completed <strong class="text-custom">43%</strong>.
                                    </div>
                                    <div>
                                        <strong>Simple Admin</strong> - Copyright &copy; 2017
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end footer -->

                </div>
                <!-- End #page-right-content -->

                <div class="clearfix"></div>

            </div>
            <!-- end .page-contentbar -->
        </div>
        <!-- End #page-wrapper -->



        @include('partials.footer-script')

    </body>
</html>
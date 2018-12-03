<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Falcon | @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets') }}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets') }}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets') }}/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ URL::asset('assets') }}/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" /> --}}
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ URL::asset('assets') }}/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ URL::asset('assets') }}/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ URL::asset('assets') }}/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets') }}/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ URL::asset('assets') }}/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->

{{-- 
    styel sheet url --}}
       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link rel="shortcut icon" href="favicon.ico" />
    <style type="text/css">
    .crimsonred
    {
        color: rgb(243, 83, 105) !important;
    }
</style>
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
    @include('layouts.dashboard.topnav')
    @include('layouts.dashboard.sidebar')

    <div class="page-content-wrapper" style="">
            <div class="page-content" >
                @yield('content')
                <div class="page-footer">
                    <div class="page-footer-inner"> &copy; {{ date('Y') }} -
                        All Right Reserved by
                        <a href="https://fwl.com.pk" class="crimsonred" target="_BLANK">
                            <strong>Falcon</strong>
                        </a>
                    </div>
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- BEGIN CORE PLUGINS -->
<script src="{{ URL::asset('assets') }}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ URL::asset('assets') }}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ URL::asset('assets') }}/global/plugins/js.cookie.min.js" type="text/javascript"></script>
{{-- <script src="{{ URL::asset('assets') }}/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> --}}
<script src="{{ URL::asset('assets') }}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ URL::asset('assets') }}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
{{-- <script src="{{ URL::asset('assets') }}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> --}}
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ URL::asset('assets') }}/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ URL::asset('assets') }}/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{ URL::asset('assets') }}/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{ URL::asset('assets') }}/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/
jquery.dataTables.js"></script>
<script type="" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
        $('#myTable1').DataTable();
    } );
</script>




{{-- //script yield --}}

@yield('script')
{{-- //stylesheet --}}

<style type="text/css">

.portlet.light{
    width: 106%!important;
    margin-left: -35px!important;
}
th{
    color: #000!important;
}
td{
    color: #000!important;
}

</style>
</body>
</html>
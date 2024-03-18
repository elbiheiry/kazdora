<html lang="en">
    <head>
        <!-- Meta Tags
        ======================-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="">
        <meta name="copyright" content="">
    
        <!-- Title Name
        ================================-->
        <title> Kazdorah | Enjoy Your Time</title>
    
        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('assets/admin/images/fav-icon.png')}}">
    
        <!-- Css Base And Vendor 
        ===================================-->
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/picker/picker.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/uppy/uppy.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/select/select-min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/datatable/datatables.min.css')}}">
    
        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
    
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        @yield('models')
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        <div class="main">
            @yield('content')
        </div><!--End Main-->
        <div class="loader">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
        <!-- JS Base And Vendor 
        ==========================================-->
        <script src="{{asset('assets/admin/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.form.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="{{asset('assets/admin/vendor/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/picker/moment.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/picker/date_range_picker.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/picker/timepicker.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/select/select2.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/datatable/datatables.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/uppy/uppy.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/main.js')}}"></script>
        <script src="{{asset('assets/admin/js/admin.js')}}"></script>
        @yield('js')
    </body>
</html>
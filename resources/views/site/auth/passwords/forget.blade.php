<html lang="en">
    <head>
        <!-- Meta Tags
        ================================-->
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
        <link rel="shortcut icon" href="{{asset('assets/site/images/fav-icon.png')}}">

        <!-- Css Base And Vendor
        ===================================-->
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/picker/picker.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/select/select-min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/animation/animate.css')}}">

        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="login-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 logo">
                        <img src="{{asset('assets/site/images/logo.png')}}">
                    </div>
                    <div class="col-md-7">
                        <div class="content">
                            <form class="login-form" method="post" action="{{route('password.email')}}">
                                @csrf
                                <a href="{{route('site.index')}}" class="close-btn">X</a>
                                <div class="head-title">
                                    Reset Password
                                </div>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="form-cont">
                                    <div class="form-group">
                                        <label>Please Enter Your Emaill Address </label>
                                        <input autocomplete="email" autofocus
                                               type="email" class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{old('email')}}" required>
                                        @error('email')
                                            <span class="col-md-12"><i class="error-data" style="text-align:center; color: #D10508; display: none; font-size: 14px;">{{$message}}</i></span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <button class="custom-btn" type="submit"> Send link </button>
                                    </div>
                                </div>
                            </form>
                            <span>© Copyright 2020 - Kazdorah. All Rights Reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loader">
            <div class="loader-cont">
                <div class="spin"></div>
                <img src="{{asset('assets/site/images/logo.png')}}">
            </div>
        </div>
        <!-- JS Base And Vendor
         ==========================================-->
        <script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/picker/moment.js')}}"></script>
        <script src="{{asset('assets/site/vendor/picker/date_range_picker.js')}}"></script>
        <script src="{{asset('assets/site/vendor/jquery.countTo.js')}}"></script>
        <script src="{{asset('assets/site/vendor/select/select2.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/swiper/swiper.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/animation/wow.min.js')}}"></script>
        <script src="{{asset('assets/site/js/main.js')}}"></script>
        <script>
            wow = new WOW(
                {
                    animateClass: 'animated',
                    offset: 80,
                    callback: function(box) {
                        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                    }
                }
            );
            wow.init();
        </script>
    </body>
</html>
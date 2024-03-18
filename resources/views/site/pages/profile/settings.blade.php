@extends('site.layouts.master')
@section('content')
    <!-- Start Welcome
        =================================== -->
    <div class="page-head">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h3> {{$member->getName()}}</h3>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i>Home / </a></li>
                        <li class="active"> {{$member->getName()}} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Page Content
    =================================== -->
    <div class="page-content">
        <section class="section-setting section-color">
            <div class="container">
                <div class="row text-center">
                    @include('site.pages.profile.templates.sidebar')
                    <div class="col-lg-9">
                        <div class="profile-cont">
                            <div class="profile-cont-head">
                                <i class="fa fa-cog"></i> Account Settings
                            </div>
                            <form class="profile-cont-form ajax-form-email" method="post" action="{{route('site.profile.email')}}">
                                @csrf
                                <span class="col-md-12"><i class="error-data-email" style="text-align:center; color: #D10508; display: none; font-size: 14px;"></i></span>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-title">
                                            change Email Address :
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Email address : </label>
                                            <input type="email" class="form-control" placeholder="Email" value="{{$member->email}}" name="email">
                                        </div><!--End Form Group-->
                                    </div><!--End Col-md-6-->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> Password : </label>
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div><!--End Form Group-->
                                    </div><!--End Col-md-6-->
                                    <div class="col-md-12 col-sm-12">
                                        <button class="custom-btn" type="submit">
                                            save information
                                        </button>
                                    </div><!--End Col-md-12-->
                                </div>
                            </form>
                            <div class="col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <form class="profile-cont-form ajax-form-password" method="post" action="{{route('site.profile.password')}}">
                                @csrf
                                <span class="col-md-12"><i class="error-data-password" style="text-align:center; color: #D10508; display: none; font-size: 14px;"></i></span>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-title">
                                            change Password :
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>old Password : </label>
                                            <input type="password" class="form-control" placeholder="Old Password" name="old_password">
                                        </div><!--End Form Group-->
                                    </div><!--End Col-md-6-->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> New Password : </label>
                                            <input type="password" class="form-control" placeholder="New Password" name="new_password">
                                        </div><!--End Form Group-->
                                    </div><!--End Col-md-6-->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> Confirm New Password : </label>
                                            <input type="password" class="form-control" placeholder="Confirm New Password" name="re_password">
                                        </div><!--End Form Group-->
                                    </div><!--End Col-md-6-->
                                    <div class="col-md-12 col-sm-12">
                                        <button class="custom-btn" type="submit">
                                            save information
                                        </button>
                                    </div><!--End Col-md-12-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--End Row-->
            </div><!--End Container-->
        </section><!--End Section-->
    </div>
@endsection
@section('js')
    <script>
        $('.ajax-form-email').on('submit' , function (e) {
            e.preventDefault();
            var $this = $(this);
            var formData = new FormData($this[0]);

            $.ajax({
                method: $this.attr('method'),
                url: $this.attr('action'),
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    if(response.status === 'success') {
                        location.reload();
                    }
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    $('.error-data-email').css('display' , 'block');
                    $('.error-data-email').html(response.data);

                    setTimeout( function () {
                        $('.error-data-email').css('display' ,'none');
                        $('.error-data-email').html('');
                    }, 3000);
                }
            });
        });

        $('.ajax-form-password').on('submit' , function (e) {
            e.preventDefault();
            var $this = $(this);
            var formData = new FormData($this[0]);

            $.ajax({
                method: $this.attr('method'),
                url: $this.attr('action'),
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    if(response.status === 'success') {
                        location.reload();
                    }
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    $('.error-data-password').css('display' , 'block');
                    $('.error-data-password').html(response.data);

                    setTimeout( function () {
                        $('.error-data-password').css('display' ,'none');
                        $('.error-data-password').html('');
                    }, 3000);
                }
            });
        });
    </script>
@endsection
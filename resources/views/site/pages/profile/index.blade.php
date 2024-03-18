@extends('site.layouts.master')
@section('content')
    <!-- Start Welcome
        =================================== -->
    <div class="page-head">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h3>{{$member->getName()}}</h3>
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
                                <i class="fa fa-user"></i> profile
                            </div>
                            <form class="profile-cont-form ajax-form" method="post" action="{{route('site.profile')}}">
                                @csrf
                                <span class="col-md-12"><i class="error-data" style="text-align:center; color: #D10508; display: none; font-size: 14px;"></i></span>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label> First Name : </label>
                                            <input type="text" class="form-control" placeholder="First Name" value="{{$member->first_name}}" name="first_name">
                                        </div><!--End Form Group-->
                                    </div><!--End Col-md-6-->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label> Last Name : </label>
                                            <input type="text" class="form-control" placeholder="Last Name" value="{{$member->last_name}}" name="last_name">
                                        </div><!--End Form Group-->
                                    </div><!--End Col-md-6-->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label> Phone Number : </label>
                                            <input type="text" class="form-control" placeholder="Phone number" value="{{$member->phone}}" name="phone">
                                        </div><!--End Form Group-->
                                    </div><!--End Col-md-6-->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> address : </label>
                                            <input type="text" class="form-control" placeholder="Address" value="{{$member->address}}" name="address">
                                        </div><!--End Form Group-->
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Choose Image </label>
                                            <div class="uplaod-wrap">
                                                <input type="file" name="image">
                                                <span class="path"></span>
                                                <span class="button">Select File</span>
                                            </div>
                                        </div>
                                    </div>
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
    </div><!--End Page Content-->
@endsection
@section('js')
    <script>
        $('.ajax-form').on('submit' , function (e) {
            e.preventDefault();
            var $this = $(this);
            var formData = new FormData($this[0]);

            $.ajax({
                type: $this.attr('method'),
                url: $this.attr('action'),
                data: formData,
                dataType: $this.data('type'),
                contentType:false,
                cache: false,
                processData:false,
                success: function (response) {
                    if(response.status === 'success') {
                        location.reload();
                    }
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    $('.error-data').css('display' , 'block');
                    $('.error-data').html(response.data);

                    setTimeout( function () {
                        $('.error-data').css('display' ,'none');
                        $('.error-data').html('');
                    }, 3000);
                }
            });
        });
    </script>
@endsection
@extends('site.layouts.master')
@section('content')
    <!-- Start Welcome
        =================================== -->
    <div class="page-head">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h3> {{auth()->user()->getName()}} </h3>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i>Home / </a></li>
                        <li class="active"> {{auth()->user()->getName()}} </li>
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
                                <i class="fa fa-list"></i> My Ads
                            </div>
                            <div class="profile-cont-form">
                                <div class="text-right">
                                    <a href="{{route('site.profile.ads.add')}}" class="custom-btn">
                                        <span> + add New Chalet</span>
                                    </a>
                                </div>
                                <div class="row text-center">
                                    @foreach($products as $product)
                                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                                            <div class="chalet-item">
                                                <div class="top-info">
                                                    <a href="{{route('site.profile.ads.edit' , ['slug' => $product->slug])}}">
                                                        <i class="fa fa-edit"></i>
                                                        edit
                                                    </a>
                                                    <button data-url="{{route('site.profile.ads.delete' , ['id' => $product->id])}}" class="icon-btn deleteBTN">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                                <img src="{{asset('storage/uploads/products/'.$product->images[0]->image)}}">
                                                <a href="{{route('site.ad' , ['slug' => $product->slug])}}" class="cont">
                                                    <h3> {{$product->title}}</h3>
                                                    <ul class="rate">
                                                        <li class="far fa-star"></li>
                                                        <li class="far fa-star"></li>
                                                        <li class="far fa-star"></li>
                                                        <li class="far fa-star"></li>
                                                        <li class="far fa-star"></li>
                                                    </ul>
                                                </a>
                                            </div><!--End chalet Item-->
                                        </div><!--Ed col-->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->
            </div><!--End Container-->
        </section><!--End Section-->
    </div>
@endsection
@section('js')
    <script>
        $('.deleteBTN').on('click' ,function () {
            var url = $(this).data('url');

            window.location.href = url;
        });
    </script>
@endsection
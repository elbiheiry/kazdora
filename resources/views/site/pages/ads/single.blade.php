@extends('site.layouts.master')
@section('content')
    <div class="page-content">
        <!-- Start Section
        ====================================-->
        <section class="chalet-head">
            <img src="{{asset('assets/site/images/chalet_head.jpg')}}">
            <div class="cont container">
                <h3> {{$product->title}}</h3>
                <div class="address">
                    <i class="fa fa-map-marker"></i>
                    {{$product->address}}
                </div>
                <div class="w-100">
                    <ul class="rate">
                        <li class="far fa-star"></li>
                        <li class="far fa-star"></li>
                        <li class="far fa-star"></li>
                        <li class="far fa-star"></li>
                        <li class="far fa-star"></li>
                    </ul>
                    @if (!auth()->guest() && !auth()->user()->wishlists()->where('product_id' , $product->id)->first())
                        <button data-url="{{route('site.ads.wishlist' , ['id' => $product->id])}}" data-token="{!! csrf_token() !!}" class="custom-btn WishlistBTN">
                            <i class="fa fa-heart"></i>
                            Add to wishlist
                        </button>
                    @endif
                    <button class="custom-btn disabled" id="wishlist-done"
                            style="display: {{!auth()->guest() && auth()->user()->wishlists()->where('product_id' , $product->id)->first() ? 'inline-block' : 'none'}};">
                        <i class="fas fa-heart"></i>
                        Added to wishlist
                    </button>
                </div>
                <div class="price">
                    <span>{{$product->price}} </span> AED / Night
                </div>
            </div><!--End cont-->
        </section><!--End Section-->
        <!-- Start Section
        ====================================-->
        <section class="section-setting section-color chalet">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                @foreach($product->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{asset('storage/uploads/products/'.$image->image)}}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach($product->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{asset('storage/uploads/products/'.$image->image)}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <ul class="main_info">
                            <li>
                                <img src="{{asset('assets/site/images/amenities/area.png')}}">
                                {{$product->area}}  m<sub>2</sub>
                            </li>
                            <li>
                                <img src="{{asset('assets/site/images/amenities/bed.png')}}">
                                {{$product->no_of_beds}} Bedrooms
                            </li>
                            <li>
                                <img src="{{asset('assets/site/images/amenities/guest.png')}}">
                                {{$product->no_of_guests}} Max guest
                            </li>
                        </ul>
                        <div class="w-100"></div>
                        <p>{{$product->description}}</p>
                        <div class="w-100"></div>
                        <div class="amenities">
                            <h3>AMENITIES</h3>
                            <ul class="amenities-list">
                                @foreach($amenities as $amenity)
                                    <li>
                                        <img src="{{asset('storage/uploads/amenities/'.$amenity->image)}}">
                                        {{$amenity->name}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="book-form" id="book-form">
                            Book Information
                            <form class="search-box">
                                <div class="form-group">
                                    <label>No.Nights</label>
                                    <input type="text" class="form-control" value="5">
                                </div>
                                <div class="form-group">
                                    <label> Date :</label>
                                    <input type="text" class="form-control" name="date_range" value="From : 02/15/2020    To : 02/20/2020">
                                </div>
                                <div class="form-group">
                                    <label>Adults Number</label>
                                    <input type="text" class="form-control" value="3">
                                </div>
                                <div class="form-group">
                                    <button class="custom-btn">
                                        Book Now <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--End row-->
            </div><!--End Container-->
        </section><!--End Section-->
    </div>
@endsection
@section('js')
    <script>
        $('.WishlistBTN').on('click' , function () {
            var url = $(this).data('url');

            $.ajax({
                url : url,
                method : 'post',
                dataType : 'json',
                data : {
                    _token : $(this).data('token')
                },
                success : function (response) {
                    $('.WishlistBTN').remove();
                    $('#wishlist-done').css('display' , 'inline-block');
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
            return false;
        });
    </script>
@endsection
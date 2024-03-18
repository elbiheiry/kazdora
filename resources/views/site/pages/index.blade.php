@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="main-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="wel-text wow fadeInUp">
                        <h1>Kazdorah</h1>
                        <h3>Enjoy Your Time</h3>
                    </div>
                    <form class="search-box wow fadeInUp">
                        <div class="form-group">
                            <label>select destination</label>
                            <select class="select form-control">
                                <option>ALL</option>
                                <option>Abu Dhabi</option>
                                <option>Dubai</option>
                                <option>Sharjah</option>
                                <option>Umm Al Quwain</option>
                                <option>Fujairah</option>
                                <option>Ajman</option>
                                <option>Ras al Khaimah</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Check in/out</label>
                            <input type="text" class="form-control"  name="date_range">
                        </div>
                        <div class="form-group">
                            <label>Property Type</label>
                            <select class="select form-control">
                                <option>ALL</option>
                                <option>Chalets</option>
                                <option>Farmer</option>
                                <option>Swimming pools</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="custom-btn"> Search </button>
                        </div>
                    </form>
                </div><!--End col-->
            </div><!--End row-->
        </div><!--End Container-->
        <a href="#next" class="scroll"></a>
    </section><!--End Section-->
    <!-- Start Section
    ====================================-->
    <section class="section-setting section-color" id="next">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="section-title wow fadeInUp">
                        <h3> Latest offers </h3>
                        <p>
                            with the everlasting beauty that stood for many years comes a fine resort to serve its name with the everlasting beauty that stood for many years comes a fine resort to serve its name
                        </p>
                    </div>
                </div><!--End col-->
                <div class="w-100"></div>
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <div class="chalet-item">
                        <div class="top-info">
                            <span>10 % Off</span>
                            <button class="icon-btn">
                                <i class="fa fa-heart"></i>
                            </button>
                        </div>
                        <img src="assets/images/chal7.jpg">
                        <a href="chalet.html" class="cont">
                            <h3> 10 days  at Chalet in Emirates</h3>
                            <ul class="rate">
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                            </ul>
                            <div class="offer-price">
                                <s> 1000 </s> 900 AED
                            </div>
                        </a>
                    </div><!--End chalet Item-->
                </div><!--Ed col-->
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <div class="chalet-item">
                        <div class="top-info">
                            <span>30 % Off</span>
                            <button class="icon-btn">
                                <i class="fa fa-heart"></i>
                            </button>
                        </div>
                        <img src="assets/images/chal8.jpg">
                        <a href="chalet.html" class="cont">
                            <h3> 10 days  at Chalet in Emirates</h3>
                            <ul class="rate">
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                            </ul>
                            <div class="offer-price">
                                <s> 1000 </s> 700 AED
                            </div>
                        </a>
                    </div><!--End chalet Item-->
                </div><!--Ed col-->
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <div class="chalet-item">
                        <div class="top-info">
                            <span>20 % Off</span>
                            <button class="icon-btn">
                                <i class="fa fa-heart"></i>
                            </button>
                        </div>
                        <img src="assets/images/chal1.jpg">
                        <a href="chalet.html" class="cont">
                            <h3> 10 days  at Chalet in Emirates</h3>
                            <ul class="rate">
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                            </ul>
                            <div class="offer-price">
                                <s> 1000 </s> 800 AED
                            </div>
                        </a>
                    </div><!--End chalet Item-->
                </div><!--Ed col-->
                <div class="w-100"></div>
                <div class="col text-center wow fadeInUp">
                    <a href="offers.html" class="custom-btn">
                        See More Offers <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
    <!-- Start Section
    ====================================-->
    <section class="section-setting">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title wow fadeInUp">
                        <h3>Latest Chalets </h3>
                        <p>
                            with the everlasting beauty that stood for many years comes a fine resort to serve its name with the everlasting beauty that stood for many years comes a fine resort to serve its name
                        </p>
                    </div>
                </div><!--End col-->
                <div class="w-100"></div>
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <div class="offer-item">
                        <div class="top-info">
                            <span> 60 AED / Night</span>
                            <button class="icon-btn">
                                <i class="fa fa-heart"></i>
                            </button>
                        </div>
                        <img src="assets/images/chal1.jpg">
                        <a href="chalet.html" class="cont">
                            <h3>  Chalets For Rent in Emirates</h3>
                            <ul class="rate">
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                            </ul>
                            <p>
                                <i class="fa fa-map-marker"></i> Dubai
                            </p>
                        </a>
                    </div><!--End Offer Item-->
                </div><!--Ed col-->
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <div class="offer-item">
                        <div class="top-info">
                            <span>80 AED / Night</span>
                            <button class="icon-btn">
                                <i class="fa fa-heart"></i>
                            </button>
                        </div>
                        <img src="assets/images/chal2.jpg">
                        <a href="chalet.html" class="cont">
                            <h3>  Chalets For Rent in Emirates</h3>
                            <ul class="rate">
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                            </ul>
                            <p>
                                <i class="fa fa-map-marker"></i> Abu Dhabi
                            </p>
                        </a>
                    </div><!--End Offer Item-->
                </div><!--Ed col-->
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <div class="offer-item">
                        <div class="top-info">
                            <span>30 AED / Night</span>
                            <button class="icon-btn">
                                <i class="fa fa-heart"></i>
                            </button>
                        </div>
                        <img src="assets/images/chal3.jpg">
                        <a href="chalet.html" class="cont">
                            <h3>  Chalets For Rent in Emirates</h3>
                            <ul class="rate">
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                                <li class="far fa-star"></li>
                            </ul>
                            <p>
                                <i class="fa fa-map-marker"></i> Sharjah
                            </p>
                        </a>
                    </div><!--End Offer Item-->
                </div><!--Ed col-->
                <div class="w-100"></div>
                <div class="col text-center wow fadeInUp">
                    <a href="category.html" class="custom-btn">
                        See More  <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
    <!-- Start Section
    ====================================-->
    <section class="section-setting section-color">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title wow fadeInUp">
                        <h3> our destination </h3>
                        <p>
                            with the everlasting beauty that stood for many years comes a fine resort to serve its name with the everlasting beauty that stood for many years comes a fine resort to serve its name
                        </p>
                    </div>
                </div><!--End col-->
                <div class="w-100"></div>
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <a href="destination.html" class="destination-item">
                        <img src="assets/images/item1.jpg">
                        <div class="cont">
                            <h3> Dubia </h3>
                            <p>
                                <i class="fa fa-buliding"></i>  345 Items
                            </p>
                        </div>
                    </a><!--End destination-item-->
                </div><!--Ed col-->
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <a href="destination.html" class="destination-item">
                        <img src="assets/images/item2.jpg">
                        <div class="cont">
                            <h3> Abu Dhabi</h3>
                            <p>
                                <i class="fa fa-buliding"></i>  145 Items
                            </p>
                        </div>
                    </a><!--End destination-item-->
                </div><!--Ed col-->
                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <a href="destination.html" class="destination-item">
                        <img src="assets/images/item3.jpg">
                        <div class="cont">
                            <h3> Sharjah </h3>
                            <p>
                                <i class="fa fa-buliding"></i>  300 Items
                            </p>
                        </div>
                    </a><!--End destination-item-->
                </div><!--Ed col-->
                <div class="col-lg-3 col-md-6 wow fadeInUp">
                    <a href="destination.html" class="destination-item">
                        <img src="assets/images/item4.jpg">
                        <div class="cont">
                            <h3> Umm Al Quwain </h3>
                            <p>
                                <i class="fa fa-buliding"></i>  241 Items
                            </p>
                        </div>
                    </a><!--End destination-item-->
                </div><!--Ed col-->
                <div class="col-lg-3 col-md-6 wow fadeInUp">
                    <a href="destination.html" class="destination-item">
                        <img src="assets/images/item5.jpg">
                        <div class="cont">
                            <h3> Fujairah</h3>
                            <p>
                                <i class="fa fa-buliding"></i>  145 Items
                            </p>
                        </div>
                    </a><!--End destination-item-->
                </div><!--Ed col-->
                <div class="col-lg-3 col-md-6 wow fadeInUp">
                    <a href="destination.html" class="destination-item">
                        <img src="assets/images/item6.jpg">
                        <div class="cont">
                            <h3> Ajman </h3>
                            <p>
                                <i class="fa fa-buliding"></i>  300 Items
                            </p>
                        </div>
                    </a><!--End destination-item-->
                </div><!--Ed col-->
                <div class="col-lg-3 col-md-6 wow fadeInUp">
                    <a href="destination.html" class="destination-item">
                        <img src="assets/images/item7.jpg">
                        <div class="cont">
                            <h3> Ras aL Khaimah </h3>
                            <p>
                                <i class="fa fa-buliding"></i>  241 Items
                            </p>
                        </div>
                    </a><!--End destination-item-->
                </div><!--Ed col-->
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
    <!-- Start Section
    ====================================-->
    <section class="section-setting hint">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="wel-text wow fadeInUp">
                        <h1> Kazdorah</h1>
                        <h3>Enjoy Your Time</h3>
                        <ul class="counter">
                            <li><span class="timer" data-to="3225" data-speed="2000"> 3225</span> Happy Clients</li>
                            <li><span class="timer" data-to="431" data-speed="2000">431</span> CHALET </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--End Section-->
    <!-- Start Section
    ====================================-->
    <section class="section-setting be-host">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-left wow fadeInLeft">
                    <div class="section-title">
                        <h3> Rent  your Chalet</h3>
                        <p>
                            with the everlasting beauty that stood for many years comes a fine resort to serve its name with the everlasting beauty that stood for many years comes a fine resort to serve its name
                        </p>
                        <a href="" class="custom-btn">
                            Register now <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div><!--End col-->
                <div class="col-lg-6 wow fadeInRight">
                    <img src="assets/images/vendor.png">
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
@endsection
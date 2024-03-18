@extends('site.layouts.master')
@section('models')
    <div class="modal fade" id="mess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <i class="fa fa-smile"></i>
                    <div class="head-title">
                        The announcement will be reviewed with the administration and you will be contacted
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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
                                <i class="fa fa-plus"></i> Add New Chalet
                            </div>
                            <form class="profile-cont-form add_ads_form ajax-form" action="{{route('site.profile.ads.add')}}" method="post">
                                @csrf
                                <span class="col-md-12"><i class="error-data" style="text-align:center; color: #D10508; display: none; font-size: 14px;"></i></span>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label> Chalet title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label> Chalet details</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Number of Beds :</label>
                                        <input type="text" class="form-control" name="no_of_beds">
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Max Number of guest :</label>
                                        <input type="text" class="form-control" name="no_of_guests">
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label> area  [ m<sub>2</sub> ] :</label>
                                        <input type="text" class="form-control" name="area">
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label> Price / Night :</label>
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>city</label>
                                        <select class="select form-control" name="city_id">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>region</label>
                                        <input class="form-control" type="text" name="region">
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Address</label>
                                        <input class="form-control" type="text" name="address">
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>PROPERTY TYPE :</label>
                                        <div class="radio-wrap">
                                            <input id="prop1" type="radio" name="type" value="Chalet">
                                            <label for="prop1"><span>Chalets</span></label>
                                        </div>
                                        <div class="radio-wrap">
                                            <input id="prop2" type="radio" name="type" value="Farmer">
                                            <label for="prop2"><span>Farmer</span></label>
                                        </div>
                                        <div class="radio-wrap">
                                            <input id="prop3" type="radio" name="type" value="Swimming pool">
                                            <label for="prop3"><span>Swimming pools</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Amenities:</label>
                                        @foreach($amenities as $amenity)
                                            <div class="radio-wrap">
                                                <input id="amenities{{$amenity->id}}" type="checkbox" name="amenities[]" value="{{$amenity->id}}">
                                                <label for="amenities{{$amenity->id}}"><span>{{$amenity->name}}</span></label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <div class="upload-btn">
                                            <input type="file" id="file" name="images[]" accept="image/*" multiple>
                                            <button class="custom-btn" type="button">
                                                <span><i class="fa fa-image"></i> upload Property Photos</span>
                                            </button>
                                        </div>
                                        <div class="gallery"></div>
                                        <div class="thumb" style='display:none'>
                                            <img src="" alt="">
                                            <button class="icon-btn"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button class="custom-btn" type="submit">
                                            <i class="fa fa-plus"></i> Add Chalet
                                        </button>
                                    </div>
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
                        setTimeout(function () {
                            $('#mess').modal('show');
                        } , 4000);
                        window.location.href = response.url;
                    }
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);
                    window.scrollTo({
                        top : 0,
                        behavior : "smooth"
                    });

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
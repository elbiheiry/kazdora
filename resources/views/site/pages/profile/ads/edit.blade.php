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
                                <i class="fa fa-plus"></i> Edit Chalet
                            </div>
                            <form class="profile-cont-form add_ads_form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label> Chalet title</label>
                                        <input type="text" class="form-control" value="{{$product->title}}" name="title">
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label> Chalet details</label>
                                        <textarea class="form-control" name="description">{{$product->description}}</textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Number of Beds :</label>
                                        <input type="text" class="form-control" value="{{$product->no_of_beds}}" name="no_of_beds">
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Max Number of guest :</label>
                                        <input type="text" class="form-control" value="{{$product->no_of_guests}}" name="no_of_guests">
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label> area  [ m<sub>2</sub> ] :</label>
                                        <input type="text" class="form-control" value="{{$product->area}}" name="area">
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label> Price / Night :</label>
                                        <input type="text" class="form-control" value="{{$product->price}}" name="price">
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>city</label>
                                        <select class="select form-control" name="city_id">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" @if($city->id == $product->city_id){{'selected'}}@endif>{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <label>region</label>
                                        <input class="form-control" type="text" value="{{$product->region}}" name="region">
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Address</label>
                                        <input class="form-control" type="text" value="{{$product->address}}" name="address">
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>PROPERTY TYPE :</label>
                                        <div class="radio-wrap">
                                            <input id="prop1" type="radio" name="type" value="Chalet" @if($product->type == 'Chalet'){{'checked'}}@endif>
                                            <label for="prop1"><span>Chalets</span></label>
                                        </div>
                                        <div class="radio-wrap">
                                            <input id="prop2" type="radio" name="type" value="Farmer" @if($product->type == 'Farmer'){{'checked'}}@endif>
                                            <label for="prop2"><span>Farmer</span></label>
                                        </div>
                                        <div class="radio-wrap">
                                            <input id="prop3" type="radio" name="type" value="Swimming pool" @if($product->type == 'Swimming pool'){{'checked'}}@endif>
                                            <label for="prop3"><span>Swimming pools</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Amenities:</label>
                                        @php
                                            $product_amenities = json_decode($product->amenities)
                                        @endphp
                                        @foreach($amenities as $amenity)
                                            <div class="radio-wrap">
                                                <input id="amenities{{$amenity->id}}" @if(in_array($amenity->id , $product_amenities)){{'checked'}}@endif type="checkbox" name="amenities[]" value="{{$amenity->id}}">
                                                <label for="amenities{{$amenity->id}}"><span>{{$amenity->name}}</span></label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <div class="upload-btn">
                                            <input type="file" id="file" accept="image/*" multiple name="images[]">
                                            <button class="custom-btn" type="button">
                                                <span><i class="fa fa-image"></i> upload Property Photos</span>
                                            </button>
                                        </div>
                                        <div class="gallery">
                                            @foreach($product->images as $image)
                                                <div class="thumb">
                                                    <img src="{{asset('storage/uploads/products/'.$image->image)}}" alt="">
                                                    <button class="icon-btn" type="button"><i class="fa fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="thumb" style="display:none">
                                            <img src="" alt="">
                                            <button class="icon-btn" type="button"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button class="custom-btn" type="submit">
                                            <i class="fa fa-info"></i> Save Information
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
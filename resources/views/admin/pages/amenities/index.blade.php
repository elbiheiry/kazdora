@extends('admin.layouts.master')
@section('models')
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" id="delete-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this amenity ?</h5>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="custom-btn red-bc">
                        <i class="fa fa-trash"></i> delete
                    </button>
                    <button type="button" class="custom-btn" data-dismiss="modal">
                        <i class="fa fa-times"></i>close
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div id="common-modal" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit amenity</h5>
                </div>
                <div class="modal-data">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Page content
            ==========================================-->
    <div class="page-head">
        <i class="fas fa-th-list"></i>
        Amenities
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Amenities</li>
        </ul>
    </div>
    <div class="page-content">
        <div class="widget">
            <div class="widget-title">
                Add new Amenity
            </div>
            <div class="widget-content">
                <form class="submit-form" action="{{route('admin.amenities')}}" method="post">
                    @csrf
                    <div class="alert alert-danger alert-dismissible error-data col-md-6 col-sm-6" role="alert">

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>image </label>
                                <div class="uplaod-wrap">
                                    <input type='file' name="image">
                                    <span class='path'></span>
                                    <span class='button'>Select File</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Name :</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="custom-btn">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--End widget Content-->
        </div><!--End Widget-->
        <div class="widget">
            <div class="widget-title">
                All amenities
            </div><!-- end Widget title-->
            <div class="widget-content">
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($amenities as $index => $amenity)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td><img src="{{asset('storage/uploads/amenities/' .$amenity->image)}}" class="table-img"></td>
                                    <td>{{$amenity->name}}</td>

                                    <td>
                                        <button data-url="{{route('admin.amenities.info',['id' => $amenity->id])}}" class="icon-btn green-bc btn-modal-view " title="edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button data-url="{{route('admin.amenities.delete',['id' => $amenity->id])}}"
                                                class="icon-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end Widget Content-->
        </div><!-- end Widget -->
    </div>
@endsection
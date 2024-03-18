<form class="submit-form" action="{{route('admin.amenities.edit',['id' => $amenity->id])}}" method="post"
      enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group">
            <label>image </label>
            <div class="uplaod-wrap">
                <input type='file' name="image">
                <span class='path'></span>
                <span class='button'>Select File</span>
            </div>
        </div>
        <div class="form-group">
            <label>Amenity name</label>
            <input class="form-control" type="text" name="name" value="{{$amenity->name}}">
        </div>
        <div class="modal-footer text-center">
            <button type="submit" class="custom-btn green-bc">
                <i class="fa fa-plus"></i> edit
            </button>
            <button type="button" class="custom-btn" data-dismiss="modal">
                <i class="fa fa-times"></i> close
            </button>
        </div>
    </div>
</form>
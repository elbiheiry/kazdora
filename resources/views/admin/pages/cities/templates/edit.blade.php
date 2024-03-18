<form class="submit-form" action="{{route('admin.cities.edit',['id' => $city->id])}}" method="post"
      enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group">
            <label>city name</label>
            <input class="form-control" type="text" name="name" value="{{$city->name}}">
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
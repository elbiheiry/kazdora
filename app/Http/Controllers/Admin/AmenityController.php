<?php

namespace App\Http\Controllers\Admin;

use App\Amenity;
use App\Http\Requests\Admin\AmenityRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmenityController extends Controller
{
    //
    public function getIndex()
    {
        $amenities = Amenity::orderBy('id' ,'DESC')->get();

        return view('admin.pages.amenities.index' ,compact('amenities'));
    }

    public function getInfo($id)
    {
        $amenity = Amenity::find($id);

        return view('admin.pages.amenities.templates.edit' ,compact('amenity'));
    }

    public function postIndex(AmenityRequest $request)
    {
        $request->store();

        return response()->json(['status' => 'success'] , 200);
    }

    public function postEdit(AmenityRequest $request , $id)
    {
        $request->edit($id);

        return response()->json(['status' => 'success'] , 200);
    }

    public function getDelete($id)
    {
        $amenity = Amenity::find($id);

        $amenity->delete();

        return redirect()->back();

    }
}

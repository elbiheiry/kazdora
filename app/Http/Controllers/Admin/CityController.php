<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Requests\Admin\CityRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    //
    public function getIndex()
    {
        $cities = City::orderBy('id' ,'DESC')->get();

        return view('admin.pages.cities.index' ,compact('cities'));
    }

    public function getInfo($id)
    {
        $city = City::find($id);

        return view('admin.pages.cities.templates.edit' ,compact('city'));
    }

    public function postIndex(CityRequest $request)
    {
        $request->store();

        return response()->json(['status' => 'success'] , 200);
    }

    public function postEdit(CityRequest $request , $id)
    {
        $request->edit($id);

        return response()->json(['status' => 'success'] , 200);
    }

    public function getDelete($id)
    {
        $city = City::find($id);

        $city->delete();

        return redirect()->back();

    }
}

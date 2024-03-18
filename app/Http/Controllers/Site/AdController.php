<?php

namespace App\Http\Controllers\Site;

use App\Amenity;
use App\City;
use App\Http\Requests\Site\ProductRequest;
use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    //member ads
    public function getIndex()
    {
        $products = auth()->user()->products()->orderBy('id' , 'DESC')->get();


        return view('site.pages.profile.ads.index' ,compact('products'));
    }
    public function getSingleAd($slug)
    {
        $product = Product::where('slug' , $slug)->first();
        $amenities = Amenity::whereIn('id' , json_decode($product->amenities))->get();

        return view('site.pages.ads.single' , compact('product' , 'amenities'));
    }

    //add new ad
    public function getAddAd()
    {
        $cities = City::all();
        $amenities = Amenity::all();

        return view('site.pages.profile.ads.add' , compact('cities' , 'amenities'));
    }
    public function postIndex(ProductRequest $request)
    {
        $request->store();

        return response()->json(['status' => 'success' , 'data' => 'Ad has been added successfully' , 'url' => route('site.profile.ads')] , 200);
    }
    public function getDeleteProduct($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->back();
    }
    public function getEditAd($slug)
    {
        $product = Product::where('slug' , $slug)->first();
        $cities = City::all();
        $amenities = Amenity::all();

        return view('site.pages.profile.ads.edit' ,compact('product' , 'cities' , 'amenities'));
    }

    //add ad to wislist
    public function postWishlist($id)
    {
        if (auth()->guest()){
            return response()->json(['status' => 'error' , 'data' => 'You must login to add this ad to your wishlist'] , 500);
        }

        if (!auth()->guest() && auth()->user()->wishlists()->where('product_id' , $id)->first()){
            return response()->json(['status' => 'error' , 'data' => 'Ad already is in your wishlist'] , 500);
        }

        $wishlist = new Wishlist();

        $wishlist->product_id = $id;
        $wishlist->user_id = auth()->id();

        if ($wishlist->save()){
            return response()->json(['status' => 'success' , 'data' => 'Item has been added to your wishlst'] , 200);
        }
    }
}

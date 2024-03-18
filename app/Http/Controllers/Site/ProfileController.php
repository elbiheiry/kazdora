<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ProfileRequest;
use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function getIndex()
    {
        $member = auth()->user();

        return view('site.pages.profile.index' ,compact('member'));
    }
    public function postIndex(ProfileRequest $request)
    {
        $request->edit();

        return ['status' => 'success' , 'data' => 'profile has been updated successfully'];
    }

    //profile settings page functions
    public function getSetting()
    {
        $member = auth()->user();

        return view('site.pages.profile.settings' ,compact('member'));
    }
    public function postEditEmail(Request $request)
    {
        $v = validator($request->all() ,[
            'email' => 'required|email|unique:users,email,'.auth()->id(),
            'password' => 'required|min:8'
        ] , [
            'email.required' => 'Please enter your email address',
            'email.email' => 'Email is invalid',
            'email.unique' => 'This email is already taken',
            'password.required' => 'Please enter your password',
            'password.min' => 'Password must be at least 8 characters'
        ]);

        if ($v->fails()){
            return response()->json(['status' => 'error' , 'data' => $v->errors()->first()] , 500);
        }

        $user = auth()->user();

        if(Hash::check($request->password, $user->password)){

            $user->email = $request->email;
            $user->save();

            return response()->json(['status' => 'success'] , 200);
        }else{
            return response()->json(['status' => 'error' , 'data' => 'Some data is wrong ,please check it again'] , 500);
        }
    }
    public function postEditPassword(Request $request)
    {
        $v = validator($request->all() ,[
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            're_password' => 'required|same:new_password'
        ] ,[
            'old_password.required' => 'Please enter your account old password',
            'old_password.min' => 'Old password is very short',
            'new_password.required' => 'Please enter your account new password',
            'new_password.min' => 'New password is very short',
            're_password.required' => 'Please repeat your new password',
            're_password.same' => 'Password mismatch'
        ]);

        if($v->fails()){
            return response()->json(['status' => 'error' , 'data' => $v->errors()->first()] , 500);
        }

        $user = auth()->user();

        if(Hash::check($request->old_password, $user->password)){

            $user->password = bcrypt($request->new_password);
            $user->save();

            return response()->json(['status' => 'success'] , 200);
        }else{
            return response()->json(['status' => 'error' , 'data' => 'Some data is wrong ,please check it again'] , 500);
        }
    }

    //wishlist
    public function getWishlist()
    {
        $wishlists = auth()->user()->wishlists()->get();

        return view('site.pages.profile.wishlist' ,compact('wishlists'));
    }

    public function getDeleteWishlist($id)
    {
        $wishlist = Wishlist::find($id);

        $wishlist->delete();

        return redirect()->back();
    }
}

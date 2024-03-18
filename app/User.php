<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','phone','image','address','provider', 'provider_id','slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImage()
    {
        if (!file_exists(storage_path('uploads/users/'.$this->image)) && $this->image != null){
            return $this->image;
        }else if (file_exists(storage_path('uploads/users/'.$this->image)) && $this->image != null){
            return asset('storage/uploads/users/'.$this->image);
        }else{
            $hash = md5(strtolower(trim($this->email)));
            $image = 'http://www.gravatar.com/avatar/'.$hash;

            return $image;
        }
    }

    public function getName()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function products()
    {
        return $this->hasMany('App\Product' , 'user_id');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Wishlist' , 'user_id');
    }
}

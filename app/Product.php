<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User' , 'user_id');
    }

    public function images()
    {
        return $this->hasMany('App\ProductImage' , 'product_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City' , 'city');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Wishlist' , 'product_id');
    }

    public function delete()
    {
        foreach ($this->images() as $image) {
            @unlink(storage_path('uploads/products/'.$image->image));
            $image->delete();
        }
        $this->wishlists()->delete();
        return parent::delete();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function products()
    {
        return $this->hasMany('App\Product' , 'product_id');
    }
}

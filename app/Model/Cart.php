<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
     public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function cartItems()
    {
        return $this->hasMany('App\Model\CartItem');
    }
}

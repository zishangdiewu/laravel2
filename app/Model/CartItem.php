<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //
    public function cart()
    {
        return $this->belongsTo('App\Model\Cart');
    }

    public function product()
    {
        return $this->belongsTo('App\Modle\Good');
    }
}

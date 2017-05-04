<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public function sort()
    {
        return $this->belongsTo('App\Model\Sort');
    }
    public function sku()
    {
        return $this->hasMany('App\Model\Sku');
    }

    public function comment()
    {
        return $this->hasMany('App\Model\Comment');
    }
}


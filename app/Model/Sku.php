<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    public function good()
    {
        return $this->belongsTo('App\Model\Good');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    //类与商品为1对多关系
    public function good()
    {

        return $this->hasMany('App\Model\Good');
    }
    //类与sku为远层1对多关系
    public function Sku()
    {
        return $this->hasManyThrough('App\Model\Sku','App\Model\Good');
    }
    
}
    
     




}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    //������ƷΪ1�Զ��ϵ
    public function good()
    {

        return $this->hasMany('App\Model\Good');
    }
    //����skuΪԶ��1�Զ��ϵ
    public function Sku()
    {
        return $this->hasManyThrough('App\Model\Sku','App\Model\Good');
    }
    
}
    
     




}

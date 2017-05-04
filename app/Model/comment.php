<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    public function good()
    {
        return $this->belongsTo('App\Model\Good');
    }
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function news()
    {
        return $this->hasMany('App\News');
    }
}

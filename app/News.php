<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //если название таблицы не соответствует названию модели
    //таблица множественное число, модель единственное)
    protected $table = 'news';
    protected $fillable = [
        'title',
        'content',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function getImgAttribute($value)
    {
        // return 'images/no-image.png';
        return ($value ? $value :'images/no-image.png');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }

    public function getImgToAttribute($value)
    {
        return 123;
    }
}

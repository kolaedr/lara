<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //если название таблицы не соответствует названию модели
    //таблица множественное число, модель единственное)
    protected $table = 'news';
}

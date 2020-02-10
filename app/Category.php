<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*в миграционном файле удалили метод таймштамп 
    по этому мы в моделе указываем что его 
    не нужно использовтаь*/
    public $timestamps = false;
}

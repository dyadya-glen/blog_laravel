<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at']; // не изменяемые защищённые поля
    //protected $table = 'client'; // это свойство задоётся, если название таблицы в БД не совпадает с именем класса в модели
}

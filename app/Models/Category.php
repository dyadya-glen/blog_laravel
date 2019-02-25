<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}

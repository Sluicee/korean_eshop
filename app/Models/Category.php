<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category');
    }

    public function images()
    {
        return $this->hasManyThrough('App\Models\Image', 'App\Models\Product', 'category');
    }
    use HasFactory;
}

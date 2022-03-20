<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public function images()
    {
        return $this->hasMany('App\Models\Image', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category');
    }
    
}

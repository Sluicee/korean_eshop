<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\QueryFilter;

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
    
    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
}

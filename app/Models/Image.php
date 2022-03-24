<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    
}

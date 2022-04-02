<?php

namespace App\Filters;

class ProductFilters extends QueryFilter
{
    public function category($id)
    {
        return $this->builder->where('category', $id);
    }

    public function search($keyword = '')
    {
        return $this->builder->where('name', 'like', '%'.$keyword.'%');
    }

    public function min_price($min_price)
    {
        return $this->builder->where('price', '>=', $min_price);
    }

    public function max_price($max_price)
    {
        return $this->builder->where('price', '<=', $max_price);
    }
}

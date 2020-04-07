<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function childs() {
        return $this->hasMany(Category::class, 'cate_parent', 'id');
    }
    public function products() {
        return $this->hasMany(Product::class, 'product_cate', 'id');
    }
}

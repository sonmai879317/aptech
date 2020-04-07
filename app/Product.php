<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function categories() {
        return $this->belongsTo(Category::class, 'product_cate', 'id');
    }
}

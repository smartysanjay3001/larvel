<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='amz_products';
    protected $guarded=[];

    public function category(){
        $this->belongsTo(Category::class);
    }
}

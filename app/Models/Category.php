<?php

namespace App\Models;
use App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='amz_categories';
    protected $guarded=[];
 
    public function product(){
      return  $this->hasMany(Products::class)->limit(4);
    }
   
}

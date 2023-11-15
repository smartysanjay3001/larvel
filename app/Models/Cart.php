<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='amz_carts';
    protected $guarded=[];

    public function product(){
        return $this->belongsTo(Products::class);
    }
 
}

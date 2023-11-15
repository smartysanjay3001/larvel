<?php

namespace App\Models;


use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Trend extends Model
{
    protected $table='amz_trends';
    protected $guarded=[];

    public function product(){
        $this->belongsTo(Products::class);
    }
}

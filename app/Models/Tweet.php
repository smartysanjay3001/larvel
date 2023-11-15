<?php

namespace App\Models;

use App\Likable;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table='tweety_tweets';
    use Likable;
    protected $guarded=[];
     
    public function user(){
        return $this->belongsTo(User::class);
    }
    

}

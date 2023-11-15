<?php


namespace App;
use Illuminate\Database\Eloquent\Model;


trait Followable{



    public function follows(){
        return $this->belongsToMany(User::class,'tweety_follows','user_id','following_user_id');
    }

    public function follow(User $user){
        return $this->follows()->save($user);
    }


    public function unfollow(User $user){
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user){
             $this->follows()->toggle($user);


    }

    public function following(User $user){
      if ($this->follows()->where('following_user_id',$user->id)->where('accept',0)->exists()){
        return "RequestSent";

      }
      else if($this->follows()->where('following_user_id',$user->id)->where('accept',1)->exists()){
          return 'Following';
      }
      else{
        return "follow me";
      }

    }


    public function followers(){
        return $this->belongsToMany(User::class,'tweety_follows','user_id','following_user_id')->where('accept',1);

    }
  public function requests(){
    return $this->belongsToMany(User::class,'tweety_follows','following_user_id')->where('accept',0);
  }



}

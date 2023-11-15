<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

class UserPolicy
{
    use HandlesAuthorization;

public function edit(User $currentUser,User $user){
    return $currentUser->is($user);

}
 public function checkfrd(User $currentUser,User $user){
    if(DB::table('tweety_follows')->where('following_user_id',$user->id )->where('user_id',$currentUser->id)->where('accept',1)->exists()){
        return true;
    }
    else{
        return false;
    }
 }

}

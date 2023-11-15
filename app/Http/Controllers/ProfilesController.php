<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;


class ProfilesController extends Controller
{
    public function show(User $user){
      return view('profiles.show',[
        'user'=>$user,
        "tweets"=>$user->tweets()->withLikes()->paginate(3)

      ]);  
    }

  public function edit(User $user){

  
      return view('profiles.edit',compact('user'));


  }

  public function update(User $user){
    $attribute=request()->validate([
      'username'=>['string','required','max:255','alpha_dash',Rule::unique('users')->ignore($user)],
      'name'=>['string','required','max:255'],
      'avatar'=>['file'],
      'email'=>['string','required','email','max:255',Rule::unique('users')->ignore($user)],
      'password'=>['string','required','min:8','max:255','confirmed']
    ]);

if(request('avatar')){
  $attribute['avatar']=request('avatar')->store('avatars');
}

// $attribute['password']=Hash::make(request('password'));
$user->update($attribute);
return redirect($user->path());
  }


  public function request(User $user){
    return view('request',['user'=>$user->requests]);
}


public function chats(){
  return view('chats');
}

public function hello(){
  dispatch(new TestJob);
}


}

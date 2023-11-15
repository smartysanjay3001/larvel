<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class TweetMsgController extends Controller
{
    public function msg(User $user){
        

        $msg1=DB::table('tweety_msgs')->where('user_id',auth()->user()->id)->Where('following_user_id',$user->id)->get();
        $msg2=DB::table('tweety_msgs')->where('user_id',$user->id)->where('following_user_id',auth()->user()->id)->get();
   
        
        // $msg=DB::table('tweety_follows')->join('tweety_msgs',function($join){
        //                $join
        //                ->on('tweety_follows.user_id', '=', 'tweety_msgs.user_id')
        //                ->orOn('tweety_follows.following_user_id', '=', 'tweety_msgs.following_user_id')
        //                ->where('tweety_follows.accept', '=', 1);
        // })->get();
        // ['tweety_follows.user_id', '=', auth()->user()->id],['tweety_follows.following_user_id', '=', $user->id])
   
       
        return view('message',[
            "user"=>$user,
            "message1"=>$msg1,
            'msg2'=>$msg2

            
        ]);
    }
    public function store(User $user,Request $request){
        $attributes=$request->validate(['msg'=>'required|max:255']);

        
        Message::create([
            "user_id"=>auth()->user()->id,
            'following_user_id'=>$request->id,
            'msg'=>$attributes['msg']

        ]);
        return back();


        
    }

   
    
}



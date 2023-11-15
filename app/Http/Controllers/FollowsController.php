<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;

class FollowsController extends Controller
{
    public function store(User $user){

       auth()->user()->toggleFollow($user);
        return back();

    }

    public function accept(Request $request){
        DB::table('tweety_follows')->where('user_id',$request->id)->where('following_user_id',auth()->user()->id)->update(['accept'=>1]);
        return redirect()->route('request',auth()->user());
    }
    public function decline(Request $request){
        DB::table('tweety_follows')->where('user_id',$request->id)->where('following_user_id',auth()->user()->id)->delete();
        return redirect()->route('request',auth()->user());
    }
    

    
}

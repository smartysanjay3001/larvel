<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index(Request $request){
        session(['register'=>$request->path()]);
        return view('explore',['users'=>User::paginate(6)]);
    }
}

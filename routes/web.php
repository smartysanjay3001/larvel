<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\TweetLikesController;
use App\Http\Controllers\TweetMsgController;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/tweety', function () {
    return view('tweet_welcome');
})->name('tweety');



Route::middleware('auth')->group(function () {
    Route::get('tweety/tweets',[TweetController::class,'index' ])->name('tweet_home');
    Route::post('tweety/tweets',[TweetController::class,'store' ]);
    Route::post('tweety/profile/{user}/follow',[FollowsController::class,'store'])->name('tweety_follow');
    Route::get('tweety/profile/{user}/edit',[ProfilesController::class,'edit'])->middleware('can:edit,user');
    Route::patch('tweety/profile/{user}',[ProfilesController::class,'update'])->middleware('can:edit,user');

    Route::post('tweety/tweet/{tweet}/like',[TweetLikesController::class,'store']);
    Route::delete('tweety/tweet/{tweet}/like',[TweetLikesController::class,'destroy']);
    
Route::get('tweety/profile/{user}',[ProfilesController::class,'show'])->name('tweety_profile');

Route::get('tweety/explore',[ExploreController::class,'index'])->name('explore');
Route::get('tweety/profile/{user}/request',[ProfilesController::class,'request'])->name('request');
Route::put('tweety/profile/{id}/request',[FollowsController::class,'accept'])->name('tweety_accept');
Route::delete('tweety/profile/{id}/request',[FollowsController::class,'decline'])->name('tweety_decline');
Route::post('tweety/message/{user}',[TweetMsgController::class,  'msg'])->name('msg');
Route::get('tweety/message/{user}',[TweetMsgController::class,  'msg'])->name('msg');
Route::post('tweety/msg/{id}',[TweetMsgController::class,'store' ])->name('msgstore');
Route::get('tweety/chats',[ProfilesController::class,'chats' ])->name('chats');

});

Auth::routes();
Route::get('hello',[ProfilesController::class,'hello' ]);


Route::get('amazon/home',[HomeController::class, 'index'])->name('amazon');
Route::get('amazon/home/trends',[HomeController::class, 'trends']);
Route::get('amazon/search',[CategoryController::class, 'search'])->name('amz_search');
Route::get('amazon/oneproductlist/{id}',[ProductsController::class,'oneproductlist'])->name('amz_productlist');
Route::get('amazon/cart',[CartController::class,'cart'])->name('amz_cart');
Route::get('amazon/cart/show',[CartController::class,'cart1']);
Route::post('amazon/cart/show/update',[CartController::class,'update']);
Route::post('amazon/cart/delete',[CartController::class,'delete']);
Route::post('amazon/cart/store',[CartController::class,'store']);

Route::get('amazon/cart/json/showing',[CartController::class,'showing' ]);
Route::post('amazon/cart/order/orders',[BuyController::class,'orders'])->name('order1');
Route::get('amazon/cart/order',[BuyController::class,'index'])->name('orders');
Route::post('amazon/cart/order/buy',[BuyController::class,'oneproduct']);
Route::get('amazon/cart/buy/show',[BuyController::class,'buyshow' ])->name('buyshow');




Route::middleware('admin')->group(function(){

    Route::get('amazon/admin',[AdminController::class,'index' ])->name('amz_admin');
    Route::get('amazon/admin/showing',[AdminController::class,'showing' ]);
    Route::get('amazon/admin/search',[AdminController::class,'search1' ])->name('amz_adminsearch');
Route::post('amazon/store',[AdminController::class,'store' ])->name('amz_adminstore');
Route::post('amazon/store/approve',[AdminController::class,'approve' ])->name('savetoken');
Route::get('amazon/admin/{id}/edit',[AdminController::class,'edit'])->name('amz_edit');
Route::post('amazon/admin/{id}/update',[AdminController::class,'update'])->name('amz_update');
Route::post('amazon/admin/category/add',[AdminController::class,'categoryadd'])->name('amz_admincategory');
Route::get('amazon/admin/{id}/delete',[AdminController::class,'delete'])->name('amz_delete');
Route::get('amazon/admin/category/{id}/delete',[AdminController::class,'categorydelete'])->name('amz_categorydelete');
Route::post('amazon/store/admin/delete',[AdminController::class,'delete']);
Route::post('amazon/store/admin/catdelete',[AdminController::class,'catdelete']);
Route::post('amazon/store/admin/make',[AdminController::class,'admin']);


});
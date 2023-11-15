<?php
namespace App;

use App\Models\Tweet;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Followable;

use App\Likable;
use App\Models\Message;
use Laravel\Passport\HasApiTokens; 

class User extends Authenticatable

{
   protected $table='users';

    use  HasApiTokens,Notifiable,Followable,Likable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getAvatarAttribute($value){
        // return '/images/avater.png?'.$this->email;
        return asset($value ? "storage/$value":'/images/avater.png');

    }

  
    public function setPasswordAttribute($value){
        $this->attributes['password']=bcrypt($value);

    }
  

    public function timeline(){
        $friends=$this->follows()->pluck('id');

   return Tweet::whereIn('user_id', $friends)->orWhere('user_id', $this->id)->withLikes()->latest()->paginate(50);

    }
    public function tweets(){
        return $this->hasmany(Tweet::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function path($append = ''){
     $path= route('tweety_profile',$this->username);

     return $append ? "{$path}/{$append}":$path ;
    }
 

    
}

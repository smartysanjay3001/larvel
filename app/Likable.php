<?php


namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use Illuminate\Database\Eloquent\Builder;

trait Likable{
    public function ScopeWithLikes(Builder $query){
        $query->leftJoinSub(
            'select tweet_id,sum(liked) likes,sum(!liked) dislikes from tweety_likes group by tweet_id',
            'tweety_likes',
            'tweety_likes.tweet_id',
            'tweety_tweets.id'
        );
        
    }
      

    public function like($user=null,$liked=1){
        $this->likes()->updateOrCreate([
            'user_id'=>$user ? $user->id : auth()->id()]
        , ['liked'=>$liked]);
    } 
    public function dislike($user=null){
       return $this->like($user,0);
    } 

public function isLikedBy(User $user){
return $user->likes->where('tweet_id',$this->id)->where('liked',1)->count();


}
public function isDislikedBy(User $user){
return $user->likes->where('tweet_id',$this->id)->where('liked',0)->count();


}

    public function likes(){
        return $this->hasMany(Like::class);
        
    }


}

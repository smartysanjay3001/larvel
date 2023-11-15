<ul class="link text-center ">
  <li><a href="{{ route('tweet_home') }}" class="links">Home</a></li>
  <li><a href="{{ route('explore') }}" class="links">Explore</a></li>

  <li><a href="{{ route('tweety_profile',auth()->user()) }}" class="links">Profile</a></li>
  <li><a href="{{route('request',auth()->user())}}" class="links">Notifications</a></li>
  <li><a href="{{route('chats')}}" class="links">Chats</a></li>
  <li>
    <form action="/logout" method="post">
      @csrf
<input type="submit" value="Logout" class="links border-0 bg-transparent">
    </form>
    
    
   
</ul>
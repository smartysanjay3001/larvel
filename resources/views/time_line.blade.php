



@forelse ($tweets as $tweet)

    @include('tweet')

 @empty
 <p class="p-3 border rounded text-black font-weight-bold">No tweets yet...</p>
 @endforelse
 {{ $tweets->links() }}



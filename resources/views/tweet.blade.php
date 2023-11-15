
    <div class="container p-1 ">
       

        <div class="row mt-3 border shadow rounded p-2 ">
            <div class="col p-1 ">
                <a href="{{ $tweet->user->path() }}" class="text-decoration-none text-dark "><img src="{{ $tweet->user->avatar }}" alt="your avatar" class="avater rounded-circle"> </a>
                <a href="{{  $tweet->user->path() }}" class="text-decoration-none text-dark "><span class="font-weight-bold">{{ $tweet->user->name }}</span></a></div>
            <div class="col-12 ms-1">
                <p class=" ">{{ $tweet->body }}</p>
            </div>

            <div class="col-12 d-flex gap-4">
                <form action="/tweety/tweet/{{ $tweet->id }}/like" method="POST">
                    @csrf
                    <div class="">
                        
                        <button type="submit" class=" d-flex gap-2 border-0  bg-transparent {{ $tweet->isLikedBy(auth()->user())? 'text-danger':'text-gray' }}"><i class="fa-solid fa-heart mt-1 bg-transparent"></i><span class="mb-1">{{$tweet->likes ? :0 }}</span></button>

                    </div>
                </form>
                <form action="/tweety/tweet/{{ $tweet->id }}/like" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class=>
                       
                       
                        <button type="submit" class=" d-flex gap-2 border-0 bg-transparent {{ $tweet->isDislikedBy(auth()->user())? 'text-danger':'text-gray' }}"> <i class="fa-regular fa-thumbs-down mt-1 "></i><span class="mb-1">{{$tweet->dislikes ? :0 }}</span></button>
                    </div>
                </form>


            </div>
        </div>




    </div>


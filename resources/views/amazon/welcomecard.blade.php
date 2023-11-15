<div class="shopping-category">
    <div class="row1">
        @foreach ( $card as $key=>$card1 )
        @if ($key==3)
        <div class="total-ship1">
           
            <div>
                
                <img src=" {{ asset('images/amazon/total-ship.jpg') }}">
            </div>
            @if(auth()->user())

             @else
             <div class="sign-in-activity">
                <h3>Sign in for the best experience</h3>
                <button>Sign in securely</button>
            </div>
           @endif
        </div> 


        @else

        
        <div class="col1">
            <h2>{{ $card1->title }}</h2>
            <div class="gallery-four-image">
                @foreach ( $card1->product as $product1)
             
                @if ($product1->category_id ==2 || $product1->category_id ==4)
              
                    <a href="{{ route('amz_productlist',$product1->id) }}">
                    <img src=" {{ asset("images/amazon/$product1->product_image") }} "  class='img-fluid' >
                    <p class="text-dark">{{ $product1->product_title }}</p>
                </a>
              
                 @break
                    
                @else
                <div>
              <a href="{{ route('amz_productlist',$product1->id) }}"><img src="{{ asset("images/amazon/$product1->product_image") }}">
                    <p>{{ $product1->product_title }}</p>
                </a>
                </div>
                    
                @endif
                
               
                @endforeach
            </div>
           
        </div>


        @endif


       
        @endforeach
       </div>
</div>

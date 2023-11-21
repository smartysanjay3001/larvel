

<div class="deal-carousel">
    <div class="heading">
        <h3>Exciting deals</h3>
      
    </div>
    <div class="l-btn btn-1b"><i class="fa-solid fa-chevron-left"></i></div>
    <div class="r-btn btn-1a"><i class="fa-solid fa-chevron-right"></i></div>
    <div class="row1 product-slide product-slide-1" ng-controller="HomeController as homeCtrl">

      
       

        @forelse ( $order as $order1 )
        <div class=" col1 ">
            <div class="img">
               <a href="{{ route('amz_productlist',$order1->id) }}"><img src="{{ asset("images/amazon/$order1->product_image") }}"></a> 
            </div>
            <div class="discount">
                <p>{{ round(($order1->product_price /$order1->product_priceoriginal)*100 ) }}% off</p>
                <span>Deal</span>
            </div>

            <div class="price">
                <p class="new-price"><span>₹</span>{{$order1->product_price  }}</p>
                <span>Was: <span class="old-price">₹{{ $order1->product_priceoriginal  }}</span></span>
            </div>
            <p class="item-name">{{ $order1->product_title }}</p>
        </div>
        @empty
            
        @endforelse

            
    </div>
</div>




<script>
    const leftBtn= document.querySelector(".l-btn");
const rightBtn = document.querySelector(".r-btn");


rightBtn.addEventListener("click",
    function(event){
       
        const conent=document.querySelector(".product-slide");
        conent.scrollLeft +=1100;
        event.preventDefault();

})
leftBtn.addEventListener("click",
    function(event){
        const conent=document.querySelector(".product-slide");
        conent.scrollLeft -=1100;
        event.preventDefault();

})
const leftBtn1= document.querySelector(".btn-1b");
const rightBtn1 = document.querySelector(".btn-1a");


rightBtn1.addEventListener("click",
    function(event){
        const conent=document.querySelector(".product-slide-1");
        conent.scrollLeft +=1100;
        event.preventDefault();

})
leftBtn1.addEventListener("click",
    function(event){
        const conent=document.querySelector(".product-slide-1");
        conent.scrollLeft -=1100;
        event.preventDefault();

})
</script>
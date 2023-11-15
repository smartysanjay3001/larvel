const { default: Axios } = require("axios");

var app = angular.module('myApp', []);
app.controller('CartController', function ($scope) {
    let cartCtrl = this;
    cartCtrl.cart = function ($data, $user) {
        // immage dynamically
        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     url: "/amazon/cart/show",
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function (result) {
        //       nf=result.map(function(e){
        //         return  e.product_image
        //       })


        //         const random = Math.floor(Math.random() * nf.length);


        //         document.querySelector('.nff').src =`/images/amazon/${random, nf[random]}`;
        //     //    document.querySelector('.nff').src =`/images/amazon/${e.product_image}`;



        //     }


        // })
        /*
       coloor change
        */


        //         red = Math.floor(Math.random() * 250 + 0);
        //      green = Math.floor(Math.random() * 250 + 0);
        //      blue = Math.floor(Math.random() * 250 + 0);

        //      rgbColor = 'rgb(' + red + ',' + green + ',' + blue + ')';
        //      console.log(  rgbColor );
        //   document.querySelector('.hff').style.background=rgbColor;
        //  console.log( document.querySelector('.nff'));


        obj = {
            user_id: $user.id,
            product_id: $data.id,

        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/cart/store",
            data: obj,
            type: 'POST',
            dataType: 'json',
            success: function (result) {
                $('.navo').text(result)

            }

        })

    }


});


app.controller('CartBuyController', function ($scope) {
    let cartbuyCtrl = this;
    // cartbuyCtrl.qty=1



 
        cartbuyCtrl.arr = []
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/cart/show",
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                cartbuyCtrl.arr.push(result)
                cartbuyCtrl.a = result


                // cartbuyCtrl.y = cartbuyCtrl.a.map(e => {
                //     return cartbuyCtrl.c = e.product_qty


                // })


                cartbuyCtrl.b = cartbuyCtrl.a.map(e => {
                    return cartbuyCtrl.c = e.product_price * e.product_qty
                    //   return e

                });



                if (cartbuyCtrl.b.length == 0) {
                    $('.ffd').text(0)
                }
                else {
                    cartbuyCtrl.d = cartbuyCtrl.b.reduce(function (total, num) {
                        return total + num;
                    })
                    $('.ffd').text(cartbuyCtrl.d)
                }

                cartbuyCtrl.arr2 = cartbuyCtrl.arr[0]

      

                 

            }


        })

        
  


    // update



    cartbuyCtrl.update = function (id, event) {

        cartbuyCtrl.show = true

        data = {
            product_id: id,
            product_qty: event.target.value,


        }

    



        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/cart/show/update",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (result) {
                cartbuyCtrl.a = result
                cartbuyCtrl.b = cartbuyCtrl.a.map(e => {
                    return cartbuyCtrl.c = e.product_price * e.product_qty


                });

                if (cartbuyCtrl.b.length == 0) {
                    $('.ffd').text(0)
                }
                else {

                    cartbuyCtrl.d = cartbuyCtrl.b.reduce(function (total, num) {
                        return total + num;
                    })
                   
                        $('.ffd').text(cartbuyCtrl.d)

                   

                }


            }
        })



    }




    cartbuyCtrl.delete = function (id, event) {

        data = {
            product_id: id

        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/cart/delete",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (result) {
                cartbuyCtrl.a = result



                cartbuyCtrl.b = cartbuyCtrl.a.map(e => {
                    return cartbuyCtrl.c = e.product_price * e.product_qty


                });

                if (cartbuyCtrl.b.length == 0) {
                    $('.ffd').text(0)
                }
                else {
                    cartbuyCtrl.d = cartbuyCtrl.b.reduce(function (total, num) {
                        return total + num;
                    })
                    $('.ffd').text(cartbuyCtrl.d)
                }
                if (result) {
                    event.target.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add('remove');
                }


            }


        })





    }


    cartbuyCtrl.buy=function(id,event){
        // console.log();

           obj={
          product_id:id
           }
           
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/cart/order/buy",
            type: 'POST',
            data: obj,
            dataType: 'json',
            success: function (result) {
           
            if(result){
                event.target.parentNode.parentNode.parentNode.parentNode.classList.add('remove')
                window.location.href='/amazon/cart/order'

            }

            }
    })


    }


    cartbuyCtrl.prtview = function () {



        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/cart/json/showing",
            type: 'GET',
            dataType: 'json',
            success: function (result) {

                //     function tolow(a, b) {

                //         a = a.toLowerCase();
                //         b = b.toLowerCase();

                //         return (a < b) ? -1 : (a > b) ? 1 : 0;
                //       }


                //    a= result.sort(function(a, b) {

                //         return tolow(a.product_name, b.product_name);
                //       })
                //       console.log(a);

            }


        })


    }



});  

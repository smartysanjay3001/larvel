var app = angular.module('myApp', []);
app.controller('HomeController', function ($scope) {
    let homeCtrl = this;


    arr = []

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/amazon/home/trends",

        type: 'GET',
        dataType: 'json',
        success: function (result) {

            arr.push(result)
            homeCtrl.aa = result

            if(result==0){
              $('.deal-carousel').hide()
            }
            

        }

    })

setInterval(() => {
    homeCtrl.sa=arr.flat();
},200);


});
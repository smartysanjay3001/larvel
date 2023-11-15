var myApp = angular.module("myApp", ["ngRoute"]);

myApp.config(function ($routeProvider) {
  $routeProvider
    .when("/", {
      templateUrl: "pages/signup-login.html",
      controller: "login",
    })
    .when("/page2", {
      templateUrl: "pages/page2.html",
      controller: "page2",
    })
    .when("/page4", {
      templateUrl: "pages/page4.html",
      controller: "page4",
    });
});

myApp.service("myservice", function () {

  this.total
  this.movielist=[
    {movie:"intersteller",
  time:"12:30PM",
  tickets:"5"
},
 {movie:"Spiderman",
  time:"01:05PM",
  tickets:"3"
},
 {movie:"Avengers",
  time:"03:20PM",
  tickets:"2"
},
  ]

  this.packagelist=[
    {drink:"Coke",
  rate:"70",
  num:0
},
   {drink:"Water Bottle",
  rate:"20",
   num:0
},
   {drink:"Pop Corn",
  rate:"170",
   num:0
},
  {drink:"Chicken Buff",
  rate:"280",
   num:0
},
  ]




  this.arr = [];
 
});


myApp.controller("login",function($scope,myservice){
 
        $scope.signup=function(){

          $scope.login1=false
          $scope.signup1=true

        } 
         $scope.login=function(){
           $scope.signup1=false
           $scope.login1=true
        } 

        
       $scope.sign=function(){
        if ($scope.Name && $scope.Password != "") {
          myservice.arr.push({
            name: $scope.Name,
            password: $scope.Password,
           
            email: $scope.email,
          });
          window.location.href="#!page2"
          
        } 
       }


       $scope.log=function(){
        $scope.main = myservice.arr;

        var arr = $scope.main;
        $scope.error = false;
      
       
          for (let x in arr) {
            // console.log(arr[x]);
            if (arr[x].name == $scope.name && arr[x].password == $scope.pass) {
              window.location.href = "#!page2";
            }
        
          
        };
       }

})

myApp.controller("page2",function($scope,myservice){
        $scope.movie=myservice.movielist
        var acc1= $scope.movie
        $scope.package=myservice.packagelist
        var abb= $scope.package
 
        $scope.Show=function(){
          $scope.packagelist1=false
          $scope.movielist1=true
        } 
         $scope.Bevarage=function(){
           $scope.movielist1=false
           $scope.packagelist1=true
           $scope.select1=false
        } 

   
      
         $scope.num1=function(){
                 var aaa=0
                 var bbb=0;
                 for(i=0;i<abb.length;i++){

                  aaa=abb[i].num*abb[i].rate

                  bbb=bbb+aaa
                 
                }

                $scope.num2=bbb
               myservice.total= $scope.num

         }
        

        //  booking function 
  $scope.ticketrate=200
  var ddd=$scope.quantityticket

        $scope.booking=function(x){
           $scope.gg=x.movie
           $scope.select1=true
           $scope.dis=false
           $scope.quantityticket=0
        }
 
  $scope.add1=function(){
     
        for(i=0;i<acc1.length;i++){
               
            if($scope.gg==acc1[i].movie){
             
               if($scope.quantityticket<=acc1[i].tickets){
                      $scope.amt=$scope.ticketrate*$scope.quantityticket
                      
               }
             else{
              $scope.error=true
              $scope.dis=true
             }
            }
           
        }
  }

  $scope.select=function(){
    $scope.movielist1=true
    $scope.packagelist1=false
    $scope.select1=true
  }


  $scope.rooting=function(){
    window.location.href="#!page4"
  }

})

myApp.controller("page4", function ($scope, myservice) {
  setTimeout(function(){
   window.location.href="#!"

  },4000)
});

var myApp = angular.module("myApp", ["ngRoute"]);

myApp.config(function ($routeProvider) {
  $routeProvider
    .when("/", {
      templateUrl: "pages/login.html",
      controller: "login",
    })
    .when("/signup", {
      templateUrl: "pages/signup.html",
      controller: "signup",
    })
    .when("/page3", {
      templateUrl: "pages/page3.html",
      controller: "page3",
    })
    .when("/page4", {
      templateUrl: "pages/page4.html",
      controller: "page4",
    });
});

myApp.service("myservice", function () {
  this.name;
  this.money;

  this.arr = [];
});

myApp.controller("signup", function ($scope, myservice) {
  $scope.signup = function () {
    $scope.upiid = false;
    $scope.error = false;
    $scope.suc = false;

    if ($scope.Name && $scope.Password && $scope.Phone != "") {
      $scope.random = "";
      for (i = 0; i < 6; i++) {
        $scope.random += Math.floor(Math.random() * 9);
      }
      myservice.arr.push({
        name: $scope.Name,
        password: $scope.Password,
        phone: $scope.Phone,
        upi: $scope.random,
        account: $scope.Account,
        amount: $scope.money,
      });
      console.log(myservice.arr);
      $scope.upiid = true;

      $scope.Name = "";
      $scope.Password = "";
      $scope.Phone = "";
      $scope.Account = "";
      $scope.money = "";
      $scope.suc = true;
      $scope.show = "Register completed please  Click the Login  page";
    } else {
      $scope.error = true;
      $scope.show1 = "Please completed the all details";
    }
  };
});

myApp.controller("login", function ($scope, myservice) {
  $scope.main = myservice.arr;

  var arr = $scope.main;
  $scope.error = false;

  $scope.login = function () {
    for (let x in arr) {
      // console.log(arr[x]);
      if (arr[x].name == $scope.Name && arr[x].upi == $scope.upi) {
        $scope.balance=arr[x].amount
        myservice.name = $scope.Name;
        myservice.money=$scope.balance
      
        window.location.href = "#!page3";
      }
       else {
        $scope.error = true;
        $scope.show1 = "please enter details";
      }
    }
  };
});

myApp.controller("page3", function ($scope, myservice) {
  $scope.name = myservice.name;
  $scope.money=myservice.money
   $scope.logout=function(){
    window.location.href = "#!";
   }
   $scope.arr=myservice.arr
     $scope.friendslist=false
   var arr1=$scope.arr
   var arr2=[]
   $scope.friends=function(){
       for(let x in arr1){
        if(arr1[x].name != myservice.name){
          arr2.push(arr1[x])
          $scope.friendslist=true
          // console.log(arr2);
        }
       }
   }

   $scope.arr3=arr2

    var arr4=[]
   $scope.Add=function(x){
       for(i=0;i<arr1.length;i++){
        if(x.name==arr1[i].name){
           arr4.push(x.name)
           $scope.arr5=arr4
        }
       }
   }

  $scope.View=function(x){
    for(i=0;i<arr1.length;i++){
      if(x==arr1[i].name){
         $scope.Name=arr1[i].name
      $scope.Account=arr1[i].account
      }
     }
  }
   $scope.transfer=function(x){

      
          var b = $scope.money-$scope.money1
           myservice.money=b
           $scope.money=myservice.money
           window.location.href="#!page4"
        
      
  

  //   var b = $scope.money-$scope.money1
  //  myservice.money=b
  //  $scope.money=myservice.money
  // 

   }


});


myApp.controller("page4", function ($scope, myservice) {
   setTimeout(function(){
    window.location.href="#!page3"

   },4000)
});

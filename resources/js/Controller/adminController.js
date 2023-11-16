const { default: Axios } = require("axios");

var app = angular.module('myApp', []);
app.controller('HomeController', function ($scope) {

    let homeCtrl = this;



   

    homeCtrl.packagelist = true
    homeCtrl.addnew1=true
    homeCtrl.update = false
    homeCtrl.category=false;
    homeCtrl.categorylist1=false 
    homeCtrl.using=true
    homeCtrl.pro=false
    homeCtrl.cat=true

    // category
    homeCtrl.catlist=false
    homeCtrl.user=false

    homeCtrl.Show = function () {
        homeCtrl.packagelist = false
        homeCtrl.update = true
        homeCtrl.categorylist1=false
          homeCtrl.category1=false;
          homeCtrl.addnew1=false
    
    homeCtrl.pro=false
    homeCtrl.cat=true
    homeCtrl.user=false
    homeCtrl.catlist=false
    homeCtrl.using=true

    }
    homeCtrl.Bevarage = function () {
        homeCtrl.update = false
        homeCtrl.packagelist = true
        homeCtrl.categorylist1=false
        homeCtrl.category1=false;
        homeCtrl.addnew1=true
        homeCtrl.using=true
    
    homeCtrl.pro=false
    homeCtrl.cat=true
    
    homeCtrl.user=false
    homeCtrl.catlist=false
    }
    homeCtrl.category = function () {
        homeCtrl.using=true
        homeCtrl.update = false
        homeCtrl.packagelist = false
        homeCtrl.categorylist1=false
        homeCtrl.category1=true;

        homeCtrl.addnew1=false
    
        homeCtrl.pro=true

        homeCtrl.cat=false

        homeCtrl.catlist=true
        homeCtrl.user=false

    }
    homeCtrl.categorylist= function () {
        homeCtrl.using=true
        homeCtrl.update = false
        homeCtrl.packagelist = false
        homeCtrl.category1=false;
        homeCtrl.categorylist1=true

        homeCtrl.addnew1=false
    
        homeCtrl.pro=true
        homeCtrl.cat=false

        homeCtrl.catlist=false
        homeCtrl.user=false

    }



    homeCtrl.approve = function ($id, $status,event) {
     
   
        if ($status == 0) {
            $val = 1

        }
        else {
            $val = 0

        }
        data = {
            id: $id,
            product_status: $val
        }
    console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/store/approve",
            data: data,
            type: 'POST',
            dataType: 'json',
            success:function(result){
                if(result==0){
                    event.target.classList.remove('red')
                    $(event.target).html('Approve')
                    event.target.classList.add('green')
                 
                }
                else{
                    event.target.classList.remove('green')
                    $(event.target).html('DisApprove')
                    event.target.classList.add('red')
                }

            }


        });
      

    }




    homeCtrl.delete= function (id,event) {
      
    //    console.log(event.target.parentNode.parentNode.parentNode.parentNode.parentNode);
       data={
         id:id
       }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/store/admin/delete",
            data: data,
            type: 'POST',
            dataType: 'json',
            success:function(result){
                if(result){
                    event.target.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add('remove')
                }
            
            }
        });
       
       
    }
    homeCtrl.categorydelete= function (id,event) {
        console.log(id);
        // console.log(event.target.parentNode.parentNode.parentNode.parentNode.parentNode);
      
    //    
       data={
         id:id
       }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/amazon/store/admin/catdelete",
            data: data,
            type: 'POST',
            dataType: 'json',
            success:function(result){
                if(result){
                    event.target.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add('remove')

                }
            }
        });
       
       
    }



    homeCtrl.userlist=function(){
        homeCtrl.user=true
        homeCtrl.packagelist = false
        homeCtrl.update = false
        homeCtrl.categorylist1=false
          homeCtrl.category1=false;
          homeCtrl.addnew1=false
    
    homeCtrl.pro=true
    homeCtrl.cat=true

    homeCtrl.catlist=false
    homeCtrl.using=false

    }
homeCtrl.admin=function($id, $status,event){
    
    if ($status == 1) {
        $val = 0

    }
    else {
        $val = 1

    }
    data = {
        id: $id,
        is_admin: $val
    }
    

    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/amazon/store/admin/make",
        data: data,
        type: 'POST',
        dataType: 'json',
        success:function(result){
            if(result==0){
                event.target.classList.remove('red')
                $(event.target).html('Make Admin')
                event.target.classList.add('green')
             
            }
            else{
                event.target.classList.remove('green')
                $(event.target).html('Dismiss as admin')
                event.target.classList.add('red')
                 
            }

        }


    });
  

}


});  

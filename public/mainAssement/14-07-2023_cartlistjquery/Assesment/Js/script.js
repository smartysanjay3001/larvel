var jsondata=[
  {
    id:"1",
    title:"cpu",
    image:"./Images/cpu.jpg",
    price:"2000"
  },
  {
    id:"2",
    title:"Headset",
    image:"./Images/keyboard with headset.jpg",
    price:"2000"
  },

  {
    id:"3",
    title:"keyboard",
    image:"./Images/keyboard.jpg",
    price:"2000"
  },


  {
    id:"4",
    title:"cpu",
    image:"./Images/laptop.jgp",
    price:"2000"
  },

  {
    id:"5",
    title:"cpu",
    image:"./Images/printer.jpg",
    price:"2000"
  },
  {
    id:"6",
    title:"cpu",
    image:"./Images/mouse.jpg",
    price:"2000"
  },
];



var cartitems=[];
var accountBalance=1000;

var cardContainer=$("#cardContainer")
var go=$("#goTocard")

$(document).ready(function(){
  for (var i=0;i<jsondata.length;i++){
    createCard(jsondata[i])
  }
$("#goTocard").on("click",function(){
 
  $("#cardContainer").hide()
  $("#cartitems").show()
    showcarts()
  
  
  });

  

  $("#back").click(function(){
    $("#cardContainer").show()
    $("#carritems").hide()

   
  })
})

//////////////////////////////////////
function createCard(product){
  var cardContainer=$("#cardContainer")

  var card=$("<div>").addClass("card");

   var cardimage=$("<img>").attr("src",product.image).addClass("card-image");
   card.append(cardimage);

   var cardContent=$("<div>").addClass("card-content");
   card.append(cardContent);


   var cardTitle=$("<h3>").text(product.title).addClass("card-title")

   cardContent.append(cardTitle)

   var cardPrice=$("<p>").text("$" + product.price).addClass("card-price")

   cardContent.append(cardPrice)




   var countInput=$("<input>").attr({
    type:"number",
    value:"0",
    min:"0", }).addClass("count-input");

   cardContent.append(countInput);

   var Addtocart=$("<button id='btn'>").text("Add TO cart").addClass("add");

   cardContent.append(Addtocart);



   countInput.on("input",function(){
    var count=parseInt($(this).val())

    if(isNaN(count)){
     count=0
    }
   
    $(this).val(count);
    updateCart(product,count)


   })


   cardContainer.append(card)
   
}
 $("#btn").on("click",function(){
  showcarts()
 $(this).each(function(){
  $("#carditems").css("display","none")
 })
    
    
 })



// /////////////////////////////////////////////////

function updateCart(product,count){
  var index=cartitems.findIndex(function(item){
    return item.product.title===product.tittle
  })


  if(count>0){
    if(index!==-1){
      cartitems[index].count=count
    }
    else{
      cartitems.push({product:product,count:count})
    }
  }

  else{
    if(index!==-1){
      cartitems.splice(index,1)
    }
  }
}
//////////////////////////////////////////////////////

function showcarts(){
  var cartitemscontainer=$("#carditems");
  var total=$("#total");
  cartitemscontainer.empty();
  

  if(cartitems.length===0){
    cartitemscontainer.text("no")
  }
  else{
    var totalprice=0

    for(i=0;i<cartitems.length;i++){
      var item=cartitems[i];
      var product=item.product
      var count=item.count;

      var cartitem=$("<div>").addClass("cart-item");

      var carditemimage=$("<img>").attr("src",product.image).addClass("card-item-image");
      cartitem.append(carditemimage)


      var carditeminfo=$("<div>").addClass("card-item-info");
      cartitem.append(carditeminfo)


      var carditemtitle=$("<h4>").text(product.title).addClass("card-item-title");
      carditeminfo.append(carditemtitle)


      var carditemPrice=$("<p>").text("$" + product.price).addClass("card-item-price")

      carditeminfo.append(carditemPrice)

      var Addtocart=$("<button id='btn' onclick='delete1() '>").text("Delete").addClass("add");

      carditeminfo.append(Addtocart);


      var itemtotalprice=product.price*count
      

      
      // var carditemtotalPrice=$("<p>").text("$" + itemtotalprice.toFixed(2)).addClass("card-total-price")
      // cartitemscontainer.append(carditemtotalPrice)

      cartitemscontainer.append(cartitem);
      totalprice+=itemtotalprice


     





    }
    var cartTotalPrice=$("<h3>").text("Total Price Rs:"  +         totalprice.toFixed(2)).addClass("cart-total-price")
    cartitemscontainer.append(cartTotalPrice)

   
    var myamount=10000;
    var buy=$("<button id='btn2'>").text("buy").addClass("add3");
   
    cartitemscontainer.append(buy)
      
    $('#btn2').on("click",function(){
    
        if(myamount>=totalprice){
          alert("purchase success")
        }
        else{
          alert("invalid balance")
        }
      
    })



    
  }
  
}


function delete1(){
  var selectedindex=$("input[name`selecteditem`]:checked").val()

  if(selectedindex!==undefined){
    cartitems.splice(selectedindex,1)
    showcarts()
  }
  else{
    alert("please delete")
  }
}





var jsondata = [
  {
    id: "1",
    title: "cpu",
    image: "./Images/cpu.jpg",
    price: "2000"
  },
  {
    id: "2",
    title: "Headset",
    image: "./Images/keyboard with headset.jpg",
    price: "2000"
  },

  {
    id: "3",
    title: "keyboard",
    image: "./Images/keyboard.jpg",
    price: "2000"
  },


  {
    id: "4",
    title: "cpu",
    image: "./Images/laptop.jgp",
    price: "2000"
  },

  {
    id: "5",
    title: "cpu",
    image: "./Images/printer.jpg",
    price: "2000"
  },
  {
    id: "6",
    title: "cpu",
    image: "./Images/mouse.jpg",
    price: "2000"
  },
];

var cartItems = []
var accountBalance = 100000.00;


$(document).ready(function () {
  var cardContainer = $("#cardContainer")
  var cartItemsList = $("#cartItems")
  var cartItemList = $("#cardContainer2")
  var accountBalanceElement = $("#accountBalance")

  jsondata.forEach(function (product) {
    var card = $("<div>").addClass("card");


    var cardimage = $("<img>").attr("src", product.image).addClass("card-image");
    card.append(cardimage);


    var cardContent = $("<div>").addClass("card-content");
    card.append(cardContent);

    var cardTitle = $("<h3>").text(product.title).addClass("card-title")

    cardContent.append(cardTitle)

    var cardPrice = $("<p>").text("$" + product.price).addClass("card-price")

    cardContent.append(cardPrice)


    var countInput = $("<input>").attr({
      type: "number",
      value: "0",
      min: "0",
      "data-id": product.id
    }).addClass("count-input");

    cardContent.append(countInput);

    var Addtocart = $("<button id='btn'>").text("Add TO cart").attr("data-id", product.id).addClass("add");

    cardContent.append(Addtocart);

    cardContainer.append(card)

  });

  ///////////////////////////////////////////
  $(".count-input").on("input", function () {
    var count = parseInt($(this).val())

    if (isNaN(count)) {
      count = 0
    }

    $(this).val(count);


  });


  //////////////////////////////////////////////////
  //  $("#btn").on("click",function(){
  //    add3()
  //  })


  $(".add").on("click", function () {
    var productId = ($(this).attr("data-id"))


    var countInput = $(".count-input[data-id='" + productId + "']")
    var count = parseInt(countInput.val())
    // console.log(count);

    if (count >= 0) {
      var product = jsondata.find(function (item) {
        return item.id === productId;
      });
      // console.log(product);

      var cartItem = cartItems.find(function (item) {
        console.log(item.id === productId); item.id === productId;
      })
      if (cartItem) {
        cartItem.count += count
        // console.log(cartItem.count);
      }
      else {
        cartItems.push({
          id: productId,
          title: product.title,
          count: count,
          price: product.price,
          image: product.image
        });
        // console.log(cartItems);
      }

      countInput.val(0)
      updateCartitems()

    }
  });


  ////////////////////////////////////

  function updateCartitems() {
    // cartItemsList.empty()
    //  console.log(cartItemsList);
    var totalPrice = 0;

    cartItems.forEach(function (item) {
      console.log(item);
      var listItem = $("<li>").text(item.title + "-" + item.count + "x $" + item.price)
      console.log(listItem);
      cartItemsList.append(listItem)
      // console.log(cartItemsList);

      totalPrice += item.price * item.count

    });

    $("#totalprice").text(totalPrice.toFixed(2))
  }



  function goToCartPage() {
    $("#cardContainer").hide();
    $("#cart").hide();
    $("#cartPage").show();
    updateCartPage()
  }

  /////////////////////////////////////////////////////////
  function updateCartPage() {
    cartItemList.empty()
    var totalPrice = 0;

    cartItems.forEach(function (item) {
      console.log(item);
      var card = $("<div>").addClass("card1");


      var cardimage = $("<img>").attr("src", item.image).addClass("card-image");
      card.append(cardimage);


      var cardContent = $("<div>").addClass("card-content");
      card.append(cardContent);

      var cardTitle = $("<h3>").text(item.title).addClass("card-title")

      cardContent.append(cardTitle)

      var cardPrice = $("<p>").text("$" + item.price).addClass("card-price")

      cardContent.append(cardPrice)


      var delete1 = $("<button id='btn2'>").text("Add TO cart").addClass("add1");

      cardContent.append(delete1);





      cartItemList.append(card)










      totalPrice += item.price * item.count


    });

    $("#cartTotalPrice").text(totalPrice.toFixed(2))
      ;
    accountBalanceElement.text(accountBalance.toFixed(2))
  }

  function clearCart() {
    cartItems = [];
    updateCartPage()
  }
  ///////////////
  function checkout() {

    var totalPrice = 0;

    cartItems.forEach(function (item) {

      totalPrice += item.price * item.count
    });

    if (totalPrice <= accountBalance) {
      accountBalance -= totalPrice;
      alert("checkout successful Your new account balnce is:$" + accountBalance.toFixed(2))

    }
    else {
      alert("insufficient account balance! Please remove some items from your Cart;")
    }
  }

  ////////////////////////////////

  $("#luv").on("click", function () {
    goToCartPage()
  })

  $("#luv1").on("click", function () {
    clearCart()
  })

  $("#luv2").on("click", function () {
    checkout()

  })


  $("#cart").show()

  $("#back").click(function () {
    $("#cardContainer").show();
    $("#cart").show();
    $("#cartPage").hide();
  })




  $("#btn2").on("click", function (event) {
    $(this)
      .parent()
      .fadeOut(100, function () {
        $(this).remove();
      });
    event.stopPropagation();
  });

});
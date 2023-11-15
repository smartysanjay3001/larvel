// let li=document.querySelectorAll("li")

// li.forEach((e)=>{
// e.addEventListener("click" ,(f)=>{
//     f.target.classList.add("correct")
// })
// })

// $("li").toggleClass("correct")

// $("li").click(function(){
//     console.log($(this));

//    $(this).toggleClass("correct")

// })

// fade out

// $("button").click(()=>{
//     $("div").fadeOut(1000)
// })

// FADE IN
// $("button").click(()=>{
//     $("div").fadeIn(1000)
// })

// $("button").click(()=>{
//     $("div").fadeToggle(1000)
// })

// $("button").click(()=>{
//     $("div").slideDown(1000)
// })

// $("button").click(()=>{
//     $("div").slideUp(1000)
// })

// $("button").click(()=>{
//     $("div").slideToggle(1000)
// })

$("ul").on("click", "li", function () {
  $(this).toggleClass("completed");
});

// click on X to delete todo
$("ul").on("click", "span", function (event) {
  $(this)
    .parent()
    .fadeOut(500, function () {
      $(this).remove();
    });
  event.stopPropagation();
});

$("input").keypress(function (event) {
  if (event.which == 13) {
    var todoText = $(this).val();
    $("ul").append("<li><span>X</span>" + todoText + "</li>");
    $(this).val("");
  }
});

$("p").click(function () {
  $("input").fadeToggle();
});

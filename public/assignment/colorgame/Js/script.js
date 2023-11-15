
var numSquares = 6;
var colors = generateRandomColors(numSquares);
var squares = document.querySelectorAll(".square");
var pickedColor = pickColor();
var colorDisplay = document.getElementById("colorDisplay");
var message = document.getElementById("message");
var reset = document.getElementById("reset");
var h1 = document.querySelector("h1");
var easybtn = document.querySelector("#easybtn");
var hardbtn = document.querySelector("#hardbtn");

easybtn.addEventListener("click",function(){
    message.textContent="";
    easybtn.classList.add("hardbtn");
    hardbtn.classList.remove("hardbtn");
    numSquares = 3;
    colors = generateRandomColors(numSquares);
    pickedColor = pickColor();
    colorDisplay.textContent = pickedColor;
    for(var i=0;i<squares.length;i++){
        if(colors[i])
        {
            squares[i].style.background = colors[i];
        }
        else{
            squares[i].style.display ="none";
        }
    }
   
});
hardbtn.addEventListener("click",function(){
    message.textContent="";
    easybtn.classList.remove("hardbtn");
    hardbtn.classList.add("hardbtn");
    numSquares = 6;
    colors = generateRandomColors(numSquares);
    pickedColor = pickColor();
    colorDisplay.textContent = pickedColor;
    for(var i=0;i<squares.length;i++){
        squares[i].style.background = colors[i];
        squares[i].style.display ="block";
    }
    message.textContent="";
});

reset.addEventListener("click",function(){
    colors = generateRandomColors(numSquares);
    pickedColor = pickColor();
    colorDisplay.textContent = pickedColor;
    reset.textContent = "New Colors"
    message.textContent="";
    for(var i=0;i<squares.length;i++){
        squares[i].style.background=colors[i];
    }
});

colorDisplay.textContent = pickedColor;
for(var i=0;i<colors.length;i++){
    squares[i].style.background =colors[i];
squares[i].addEventListener("click",function(){
    var clickedColor = this.style.background;
    console.log(clickedColor,pickedColor);
    if(clickedColor === pickedColor)
        {
            message.textContent = "Correct";
            reset.textContent="Play Again?"
            changedColors(clickedColor);
            h1.style.background = clickedColor;
        }
        else{
            this.style.background =  "#232323";
            message.textContent = "Try Again";
        }
});  
}
function changedColors(color){
    for(var i=0;i<squares.length;i++){
        squares[i].style.background = color;
    }   
}
function pickColor(){
    var random = Math.floor(Math.random() * colors.length);
    return colors[random];
}
function generateRandomColors(numSquares){
    var arr=[];
    for(var i=0; i<numSquares; i++){
        arr.push(randomColor())
    }
    return arr;
}
function randomColor(){
    var r = Math.floor(Math.random() * 256);
    var g = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 256);
    return "rgb(" + r + ", " + g + ", " + b +")";
}


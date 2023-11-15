// color generator

let btn = document.getElementById("btn");
let square = document.querySelector(".recatangle");

// var generator;
// let text1 = generator.text;
let sort = [];


colorStore = [];

btn.addEventListener("click", function () {
  generator = randomColor();
  color = generator.rgb;

  text1 = generator.text;
  let red = generator.red;
  let green = generator.green;
  let blue = generator.blue;
  // console.log(red);
  // console.log(green);
  // console.log(blue);

  var obj = { RED: red, GREEN: green, BLUE: blue };
sort.push(obj);

  
  // console.log(sort);

  square.style.background = color;
});

function randomColor() {
  var r = Math.floor(Math.random() * 256);
  var g = Math.floor(Math.random() * 256);
  var b = Math.floor(Math.random() * 256);

  let object1 = {
    red: r,
    green: g,
    blue: b,
    rgb: "rgb(" + r + ", " + g + ", " + b + ")",
    text: `red:${r} , green:${g}, blue:${b}`,
  };

  return object1;
}

// color generator end

//todo list first

let add = document.querySelector(".add");
let remove1 = document.querySelector(".remove");
let todolist = document.querySelector("ul");

add.addEventListener("click", function () {

  addtodo(sort);
  sort.unshift()
  console.log(sort);
});

function addtodo(todo) {
  var list = document.createElement("li");
  for (i = 0; i < todo.length; i++) {
    list.innerHTML = JSON.stringify(todo[i]);
  }

  todolist.prepend(list);
  // console.log(colorStore);
}
remove1.addEventListener("click", function () {
  remove3();
});
function remove3() {
  sort.shift();
  todolist.removeChild(todolist.firstElementChild);

  // console.log(colorStore);
}

// bottom

let add1 = document.getElementById("add1");
let remove2 = document.querySelector("#remove2");

add1.addEventListener("click", function () {
  // sort.push(text1);
  addtodo1(sort);
});

function addtodo1(todo) {
  var list = document.createElement("li");
  for (i = 0; i<todo.length; i++) {
    list.innerHTML = JSON.stringify(todo[i]);
  }

  todolist.appendChild(list);
  // console.log(colorStore);
}
remove2.addEventListener("click", function () {
  todolist.removeChild(todolist.lastElementChild);
  sort.pop();
  // console.log(colorStore);
});

// sort

let red1 = document.querySelector(".red");
let green1 = document.querySelector(".green");
let blue1 = document.querySelector(".blue");

// red

red1.addEventListener("click", function () {
  var red2 = sort.sort(function (a, b) {
    return a.RED - b.RED;
  });
  for (i = 0; i < red2.length; i++) {
    remove3();
  }
  red2.forEach((event) => {
    var list = document.createElement("li");

    list.innerHTML = JSON.stringify(event);
    todolist.appendChild(list);
  });
});

// green

green1.addEventListener("click", function () {
  var green2 = sort.sort(function (a, b) {
    return a.GREEN - b.GREEN;
  });
  for (i = 0; i < green2.length; i++) {
    remove3();
  }
  green2.forEach((event) => {
    var list = document.createElement("li");

    list.innerHTML = JSON.stringify(event);
    todolist.appendChild(list);
  });
});

// blue button

blue1.addEventListener("click", function () {
  var blue2 = sort.sort(function (a, b) {
    return a.BLUE - b.BLUE;
  });
  for (i = 0; i < blue2.length; i++) {
    remove3();
  }
  blue2.forEach((event) => {
    var list = document.createElement("li");

    list.innerHTML = JSON.stringify(event);
    todolist.appendChild(list);
  });
});

// value pass
let value1 = document.querySelector(".valuepass2");
let copy = document.querySelector(".copy");
let move = document.querySelector(".move");

copy.addEventListener("click", function () {
  // alert("snajuy")
  let startnum = document.getElementById("startnumbs").value;

  let endnum = document.getElementById("endnumber").value;
  let list2 = document.createElement("li");
  let copy1 = sort.splice(startnum, endnum);
  // console.log(copy1);
   

copy1.forEach((i)=>{
  let foo=JSON.stringify(i)
  let foo2=foo.replace(/[{}]/g,'')
  let foo3=foo2.toString()
  list2.innerHTML=foo3

})

 
    // list2.innerHTML = foo3;

  value1.append(list2);
});

move.addEventListener("click", function () {
  // alert("snajuy")
  let startnum = document.getElementById("startnumb2").value;

  let endnum = document.getElementById("endnumber2").value;
  let list2 = document.createElement("li");
  let move1 = sort.splice(startnum, endnum);
  for (i = 0; i < move1.length; i++) {
    remove3();
  }
  console.log(move1);
  move1.forEach((i)=>{
    let foo=JSON.stringify(i)
    let foo2=foo.replace(/[{}]/g,'')
    let foo3=foo2.toString()
    list2.innerHTML=foo3
    value1.prepend(list2);
  })
  
 
 
});

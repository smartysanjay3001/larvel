let focus1=document.querySelector(".focus")
let refresh=document.querySelector(".reload")
let search=document.querySelector(".search")
// input1
let inputText=document.querySelector(".task1")
let inputdate=document.querySelector(".date2")
let listnode=document.getElementById("list")




let com2=document.getElementById("Completed")

var tab=[];
var tab2=[]
var index;
// filter node
var fill5=document.querySelector("#history")


focus1.addEventListener("click",function(){
inputText.focus()
  })
  
  refresh.addEventListener("click",function(){
    
      location.reload()
  })
  
  search.addEventListener("click",function(){
  
    remove2()
    
  })
  function remove2(){
      let divtask=document.querySelector(".first")
      let task2=document.querySelector(".second1")
       divtask.style.display="none"
    task2.style.display="block"
   
  }






//  adding values
let add1=document.querySelector(".add")
let erase=document.getElementById("erase")

add1.addEventListener("click",function(){
  // alert("sanjay")
  add()

})

erase.addEventListener("click",function(){
  erase1()
    
  })
// array
// for li items
var items=document.querySelectorAll("#list li")
for(i=0;i<items.length;i++){
  var date=new Date(items[i].querySelector(".item-date").innerHTML)
  tab.push({text:items[i].querySelector(".items-text").innerHTML,

            date:date});

          };

// refresh

function refresharray(){
  tab.length=0;
  items=document.querySelectorAll("#list li")
  for(i=0;i<items.length;i++){
    var date=new Date(items[i].querySelector(".item-date").innerHTML)
    tab.push({text:items[i].querySelector(".items-text").innerHTML,
  
              date:date});
  };
  
}

var itemText=liNode.querySelector(".item-text")
  var itemDate=liNode.querySelector(".item-date")
 



function add(){
  var text=inputText.value;
  var date=inputdate.value;
  var liNode=document.createElement("li")

 if((text=="")|| (date.value=="")){
  alert("enter the value")
 }
 else{
  liNode.innerHTML+=`<span class="item-text">` + text +`</span>` +`<span class="item-date">`+ date  + `</span>` + `<button onclick="edit(this)">Edit</button>` + `<button onclick="delete1(this)" >X</button>`

  listnode.appendChild(liNode)                            
  filter1()
  
  inputText.value=""
  inputdate.value=""
 
 }
 

  
 refresharray();
  
}


// ERASE


function erase1(){` `
  inputText.value=" "
  inputdate.value=" "

}

function edit(button){
  var liNode=button.parentNode;
  var itemText=liNode.querySelector(".item-text")
  var itemDate=liNode.querySelector(".item-date")

//  var newText= itemText.innerHTML=inputText.value
  var newText=prompt("Enter new text:",itemText.innerHTML)
  var newDate=prompt("Enter new date:",itemDate.innerHTML)

  itemText.innerHTML=newText
  itemDate.innerHTML=newDate
   refresharray()
}

function delete1(button){
  var liNode=button.parentNode;
  listnode.removeChild(liNode)
  refresharray()
}


for(var i=0;i<tab.length;i++){
  var liNode=document.createElement("li");

  
  liNode.innerHTML=`<span class="item-text">` + text +`</span>` +`<span class="item-date">`+ date  + `</span>` + `<button onclick="edit(this)">Edit</button>` + `<button onclick="delete1(this)" >X</button>`


  listnode.appendChild(liNode)

}


// filiter


function filter1(){
var l=inputdate.value
var currendate=new Date();


  tab.push({text:inputText.value,

            date:l});
         

// console.log(currendate);
var oldDate=new Date(inputdate.value)
// fill5.innerHTML=''
// console.log(oldDate);

tab.forEach(function(){
  var listitem=document.createElement("li")
     listitem.innerHTML=tab[i].items
    listitem.innerHTML=`<span class="item-text">` +tab[i].text +`</span>` +`<span class="item-date">`+ tab[i].date + `</span>`
  
  // console.log(tab);
    if(oldDate<currendate){
      fill5.appendChild(listitem)
}
})

}




// completed

listnode.addEventListener("click",function(){
  alert("sanjay")
  // let li=document.createElement("li")
  //  tab2.push(tab)
  //  console.log(tab2);


  // copy1.forEach((i)=>{
  //   let foo=JSON.stringify(i)
  //   let foo2=foo.replace(/[{}]/g,'')
  //   let foo3=foo2.toString()
  //   li.innerHTML=foo3

  // })
  
   
  //     // list2.innerHTML = foo3;
  
  //     com2.appendChild(li)
})



// find

function find(){
  let filiiter=document.querySelectorAll("#list li")
  let find=document.querySelector(".task2")
  var x=find.value

  let v=tab.filter((ju)=>{
    return ju.text==x
  })

  v.forEach((fn)=>{
  filiiter.innerHTML=`<li>${fn.text} ${fn.date}</li>`
  })
}
let find1=document.querySelector(".find1")
find1.addEventListener("click", function(){
       find()
})
















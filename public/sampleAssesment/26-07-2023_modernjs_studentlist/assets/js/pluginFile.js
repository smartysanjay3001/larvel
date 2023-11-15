
var mainArray;
var update=[];
(function(pWindow) {
	// if(typeof pWindow.CustomList == "function") {
	// 	throw new Error("CustomList function already defined");
	// }

	/*===================== creating default values =============*/
	 mainArray=[];
	let CustomList= function(pId, options) {
		

		if(!(this instanceof CustomList)) {
		return new CustomList(pId, options);
			// console.log(new CustomList(pId, options))
		}
		this.domEl = document.getElementById(pId);

		if(!this.domEl) {
			throw new Error("dom not found");
		}
		this.options=options||{};
		// console.log(this.options)
		if(typeof this.options.data == "undefined") {
			this.options.data = [];
			
		}
		mainArray.push(options);
		
		// console.log(mainArray)
	this.displayList(this.domEl);
	};

	/*==================== creating new list ================*/

	CustomList.prototype.displayList = function(pId){
		// console.log(mainArray);
         let up=mainArray[0].data.students
		//  console.log(up)
		var ff=''
		up.forEach((e)=>{
	
		const{name,id,m1,m2,m3,m4,m5,img}=e
			let ss=`
		
			<div class="card card1 " onclick="edit(${id})">
			<img src="${img}" class="card-img-top pt-2 " alt="...">
			<div class="card-body">
			  <h1 class="card-text text-center">${name}</h1>
			</div>
		  </div>
	`
		  
		  ff+=ss
		  pId.innerHTML=ff
		   

		})

 	}

	pWindow.CustomList = CustomList;
	// pWindow.sanjay=sanjay

})(window);


/*///////////////////////   search////////////////// */










function edit(e){
	// console.log(e)
	let b=mainArray[0].data.students
//    console.log(b)

   var a =  b.find((ev)=>{
        return e==ev.id
     
   })
//    console.log(a)
  update.push(a)
 
 some()


}
function some(){
	var ff=''
	// console.log(update)
	update.forEach((e)=>{
		var domEl = document.getElementById("show");
		const{name,id,m1,m2,m3,m4,m5}=e
		let ss=`
        <div>
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" value="${name}" disabled>
        </div>
       


        <div>
          <label for="m1">M1:</label>
          <input type="text" class="mark" name="m1" id="m1" value="${m1}" disabled>
        </div>


        <div>
          <label for="m2">M2:</label>
          <input type="text" class="mark" name="m2" id="m2" value="${m2}" disabled>
        </div>

        <div>
          <label for="m3">M3:</label>
          <input type="text" class="mark" name="m3" id="m3" value="${m3}" disabled>
        </div>


        <div>
          <label for="m4">M4:</label>
          <input type="text" class="mark" name="m4" id="m4" value="${m4}" disabled>
        </div>

        <div>
          <label for="m5">M5:</label>
          <input type="text" class="mark" name="m5" id="m5" value="${m5}" disabled>
        </div>
              <div>
              <button onclick="edit1()" >Edit</button>
              <button onclick="Add(${id})">Save</button>
              </div>
     
`
  
       

		ff=ss
       domEl.innerHTML=ff
	   valdiation()

	})
	update.splice(0,1)
}


function Add(event){
	
	var c=mainArray[0].data.students
    
	var name1 =document.getElementById("name").value
	
	var m1 =parseInt(document.getElementById("m1").value)
	var m2 =parseInt(document.getElementById("m2").value)
	var m3 =parseInt(document.getElementById("m3").value)
	var m4 =parseInt(document.getElementById("m4").value)
	var m5 =parseInt(document.getElementById("m5").value)
	// console.log(id)
	
	var indexToupdate=c.findIndex(obj=>{
	  return obj.id==event
	  
	})
	console.log(indexToupdate)

	
	if(indexToupdate !== -1){
		c[indexToupdate].name=name1
		c[indexToupdate].m1=m1
		c[indexToupdate].m2=m2
		c[indexToupdate].m3=m3
		c[indexToupdate].m4=m4
		c[indexToupdate].m5=m5
		window.OnLoaded()
		document.getElementById("name").value=''
		document.getElementById("m1").value=''
		document.getElementById("m2").value=''
		document.getElementById("m3").value=''
		document.getElementById("m4").value=''
		document.getElementById("m5").value=''
		document.getElementById("name").disabled=true
		document.getElementById("m1").disabled=true
		document.getElementById("m2").disabled=true
		document.getElementById("m3").disabled=true
		document.getElementById("m4").disabled=true
		document.getElementById("m5").disabled=true
		
		
	}
	else{
		console.log("object not found");
	}   


}


function edit1(){

	var name1 =document.getElementById("name")
	
	
	var m1 =document.getElementById("m1")
	var m2 =document.getElementById("m2")
	var m3 =document.getElementById("m3")
	var m4 =document.getElementById("m4")
	var m5 =document.getElementById("m5")

	name1.removeAttribute("disabled")
	m1.removeAttribute("disabled")
	m2.removeAttribute("disabled")
	m3.removeAttribute("disabled")
   m4.removeAttribute("disabled")
   m5.removeAttribute("disabled")

}



/*////////////////////input filiter////////// */

function showing(){
	var input=document.getElementById("myInput").value.toUpperCase()
	var c=mainArray[0].data.students
	
	var t=c.filter((e)=>{
		return e.name.toUpperCase().includes(input)
	  
	   })
	  
  
	//    var a=t.filter(value=>
	// 	{
	// 		console.log(value.name==input)
	// 	})
	    // console.log(a)
		var ff=''
	   t.forEach((e)=>{
	      console.log(e)
		const{name,id,m1,m2,m3,m4,m5,img}=e
			let ss=`
			<div class="card card1" onclick="edit(${id})">
			<img src="${img}" class="card-img-top  mx-auto pt-2" alt="...">
			<div class="card-body">
			  <h1 class="card-text text-center">${name}</h1>
			</div>
		  </div>
	`
	ff+=ss
	document.getElementById("col1").innerHTML=ff

	   })
   
}

/*  /////////////////////////valdiation */


function valdiation(){
	let dd=document.querySelectorAll(".mark")
	dd.forEach((aa)=>{
      if(aa.value<35){
		aa.style.background="red"
		aa.style.color="white"
	  }
	  else{
		aa.style.background="white"
		aa.style.color="black"
	  }

	})
	


}




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
		this.domEl = document.querySelector(`.${pId}`);
		// console.log(this.domEl)

		// if(!this.domEl) {
		// 	throw new Error("dom not found");
		// }
		this.options=options||{};
		// console.log(this.options)
		if(typeof this.options.data == "undefined") {
			this.options.data = [];
			
		}
		mainArray.push(options);
		let showlist=document.querySelector(".showlist")
		
		showlist.addEventListener("click",function(){
			
			
		 let input1=document.querySelector(".input")
		 let demo=document.getElementById("demo")
		if(input1.value==""){
		
		 demo.innerHTML="Please Enter value"
		 demo.style.color="red"
		}
		else{
			CustomList.prototype.displayList(input1.value);
			demo.innerHTML=" "
			input1.value=""
		}

			

		})

	
	};

	/*==================== creating new list ================*/

	CustomList.prototype.displayList = function(eval){
		// console.log(mainArray);
	var	domEl = document.createElement("div");
	domEl.classList.add('container3')
	var	domE4 = document.createElement("div");
	domE4.classList.add('container4')
	var n=0
	var domE2 = document.querySelector(".container2");
         let up=mainArray[0].data.ProductCollection
	     var ff="";
		 var bb;
		 
	

		up.forEach((e,i,j)=>{
	       n+=1
		const{Name,ProductPicUrl,Price
		}=e
		bb=` <input type="text" id="myInput" class=" my-5 text-"  placeholder="Search for names.." title="Type in a name" onkeyup="showing()">
		`
		bb+=`<h1>welcome  ${eval}</h1>`
		
			 ff+=` 
			<div id="col1" class="col1">
			  <div class="product1">
			   
				<div class="product">
				<input type="checkbox" value=""  oninput="edit(${i})"/><img
				  src="${ProductPicUrl}"
				  alt="  "
				/>
				<p>${Name}</p>
				</div>
			  </div>
			</div>
			
	`
	  
	ss=`<div class="buton">
	<button onclick="some()">Add</button>
	<button onclick="cancel(${n})">Cancel</button>
  </div>`
	
		   

		})
       
		domE4.innerHTML+=bb
	domEl.innerHTML=ff

  
	domE4.appendChild(domEl)
	domE2.appendChild(domE4)
	domE4.innerHTML+=ss
        
 	}

	pWindow.CustomList = CustomList;
	// pWindow.sanjay=sanjay

})(window);


/*///////////////////////   search////////////////// */










function edit(e){
	
    
	let b=mainArray[0].data.ProductCollection
	
//    console.log(e)

   var a =  b.find((ev,c)=>{
         return e==c
     
   })
   
  update.push(a)
 



}

function some(){
	$(".show").show(200)
	var	domEl = document.createElement("div");
	domEl.classList.add('container3')
	var	domE4 = document.createElement("div");
	domE4.classList.add('container4')
	
	var domE2 = document.querySelector(".show");
         let up=mainArray[0].data.ProductCollection
	     var ff="";
		
		 
		

		update.forEach((e,i,j)=>{
	       
		const{Name,ProductPicUrl
		}=e
		
		
			 ff+=` 
			<div id="col1" class="col1">
			  <div class="product1">
			   
				<div class="product">
			<img
				  src="${ProductPicUrl}"
				  alt="  "
				/>
				<p>${Name}</p>
				</div>
			  </div>
			</div>
			
	`
	  

	domEl.innerHTML=ff
	domE4.appendChild(domEl)
	domE2.appendChild(domE4)

		   

		})
       
		
	
        
	update.splice(0,update.length)
}



// /*////////////////////input filiter////////// */

function showing(){
	
	var input=document.getElementById(`myInput`).value.toUpperCase()
	
	var c=mainArray[0].data.ProductCollection

	    
	
	var t=c.filter((e)=>{
		return e.Name.toUpperCase().includes(input)
	  
	   })
	   console.log(t)
	  
		var ff=''
	   t.forEach((e)=>{
	      console.log(e)
		  const{ProductId,Name,ProductPicUrl}=e
		  let dd=document.querySelectorAll(".container3")
		  dd.forEach((a,i)=>{
			let ss=`
			<div id="col1" class="col1${i}">
			  <div class="product1">
			   
				<div class="product">
				<input type="checkbox" value="" onclick="display(${ProductId})" /><img
				  src="${ProductPicUrl}"
				  alt="  "
				/>
				<p>${Name}</p>
				</div>
			  </div>
			</div>
	`
	  ff+=ss
     a.innerHTML=ff


		  })
			
	   })
   
}


function cancel(){
	alert()
	$(".show").hide(200)
}


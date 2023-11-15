// var a=[{name:"sanjay",items:[]}]
// let b=a[0].items
var xhrHttp=new XMLHttpRequest();
   xhrHttp.onreadystatechange = function(){
   if(this.readyState==4){
      if(this.status==200){
         var data=JSON.parse(this.responseText);
        //  console.log(data)
         		OnLoaded(data);
         		/* search(data); */
         		 }
     		   }	
         }
    xhrHttp.open('GET','assets/products.json',true);
		xhrHttp.send();

// fetch('assets/students.json')
// .then((e)=>e.json())
// .then((ev)=>OnLoaded(ev))
// .catch((ez)=>{
//   console.log("Error this json file")
// })

/*---------------onload func--------------*/
var OnLoaded = function(data) {
    sample = CustomList('container3', {data});
};
/*=========== search func============*/

/* var search =function(event){
  sample._filter(event);
}; */

 





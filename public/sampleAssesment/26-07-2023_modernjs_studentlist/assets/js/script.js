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
    xhrHttp.open('GET','assets/students.json',true);
		xhrHttp.send();

// fetch('assets/students.json')
// .then((e)=>e.json())
// .then((ev)=>console.log(ev))
// .catch((ez)=>{
//   console.log("Error this json file")
// })

/*---------------onload func--------------*/
var OnLoaded = function(data) {
    sample = CustomList('col1', {data});
};
/*=========== search func============*/

/* var search =function(event){
  sample._filter(event);
}; */



				
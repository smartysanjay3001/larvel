// for(i=1;i<=1330;i++){
//   fetch(`https://api-thirukkural.vercel.app/api?num=${i}`)
// .then(res=>{
//   if(res.ok){
//   //  console.log("done");
//   }
//   else{
//     console.log("faled")
//   }
// return res.json()})
// .then(msg=>{
//   console.log(`${msg.line1}  
// ${msg.line2}

// பொருள்; 
// ${msg.tam_exp}.`)
// })
// .catch((err)=>{
//   console.log(err)
// })

// } 

let select=document.querySelectorAll(".currency")
// console.log(select)
let btn=document.getElementById("btn")
let input=document.getElementById("input")



fetch('https://api.frankfurter.app/currencies')
.then(res=>res.json())
.then(res=>displayDropDown(res))


function displayDropDown(res){
//  console.log( Object.entries(currency) )
let currency=Object.entries(res) 
for(i=0;i<=14;i++){
 let opt = `<option value="${currency[i][0]}">${currency[i][0]}</option>`


select[0].innerHTML+=opt
select[1].innerHTML+=opt
}
}

btn.addEventListener("click",()=>{
  let curr1=select[0].value
 let curr2= select[1].value
 let inputVal=input.value

 if(curr1===curr2){
  alert('choose different currencies ')
 }
 else{
  convert(curr1,curr2,inputVal)
 }
 
})
function convert(curr1,curr2,inputVal){
  const host = 'api.frankfurter.app';
  fetch(`https://${host}/latest?amount=${inputVal}&from=${curr1}&to=${curr2}`)
  .then(resp => resp.json())
  .then((data) => {
    document.getElementById('result').value = Object.values(data.rates)[0]
  });
}
<script>
var totals=6;
var btn=document.getElementsByClassName("add")
var magac=document.getElementsByClassName("magac")
var qiimo=document.getElementsByClassName("qiimo")
var qty=document.getElementsByClassName("qty")
var total=document.getElementById("total");
var table=document.getElementById("table")
// alert(qty.length)
var title=["No","Item_Name","Price","Quantity","Action"];
var tb=document.createElement("TABLE")
tb.setAttribute("class","table table-striped")
tb.setAttribute("id","mytable")
var thead=document.createElement("thead")
thead.setAttribute("class","bg-primary text-white")
var tr=document.createElement("tr")
for(a=0; a<title.length; a+=1){
  var th=document.createElement("TH")
  var txt=document.createTextNode(`${title[a]}`)
  th.appendChild(txt)
  tr.appendChild(th)
  thead.appendChild(tr)
}
tb.appendChild(thead)
table.appendChild(tb);
r=1;
for(i=0; i<btn.length; i+=1){
  ((index)=>{
btn[index].addEventListener("click",()=>{
  // alert(magac[index].innerHTML+" "+qiimo[index].innerHTML+" "+qty[index].value)
 
  var tbody=document.createElement("tbody")
  var trs=document.createElement("tr")
trs.setAttribute("class","trs")
  var td1=document.createElement("TD")
  var td2=document.createElement("TD")
  var td3=document.createElement("TD")
  var td4=document.createElement("TD")
  var td5=document.createElement("TD")
  td1.setAttribute("id","td1")
  td2.setAttribute("id","td2")
  td3.setAttribute("id","td3")
  td4.setAttribute("id","td4")
  td2.setAttribute("class","items")
  td3.setAttribute("class","items")
  td4.setAttribute("class","items")
var txt1=document.createTextNode(`${r}`)
var txt2=document.createTextNode(`${magac[index].innerHTML}`)
var txt3=document.createTextNode(`${qiimo[index].innerHTML}`)
var txt4=document.createTextNode(`${qty[index].value}`)
var btt=document.createElement("button")
btt.setAttribute("class","btn btn-danger bg-danger text-white remove")
var txt5=document.createTextNode("Remove")
btt.appendChild(txt5);
td5.appendChild(btt);
td1.appendChild(txt1)
td2.appendChild(txt2)
td3.appendChild(txt3)
td4.appendChild(txt4)
trs.appendChild(td1)
trs.appendChild(td2)
trs.appendChild(td3)
trs.appendChild(td4)
trs.appendChild(td5)
tbody.appendChild(trs);
tb.appendChild(trs)
table.appendChild(tb);

// alert((qiimo[index].innerHTML)*(parseInt(qty[index].value)));
// parseFloat(qiimo[index].innerHTML)*parseFloat(qty[index].value)
if(qty[index].value==""){
  alert("fadlan qty soo geli");
} 
else{
totals+=parseFloat(qiimo[index].innerHTML)*(parseFloat(qty[index].value))
total.innerHTML=totals;
}

r+=1;
// var t=document.getElementsByTagName("tr")
// alert(t.length)
qty[index].value="";
var tts=document.getElementsByClassName("trs")
// alert(tts.length)
var remove=document.getElementsByClassName("remove")
// alert(remove.length+" row ")
var mytable=document.getElementById("mytable")

// for(c=0; c<tts.length; c+=1){
//   ((index)=>{
//  tts[index].addEventListener("click",()=>{
//   // alert(tb.rows[index+1].innerHTML)
//   tts[index].remove()
  
//  })
//   })(c)
// }


var tdd=document.getElementsByClassName("items")
var save=document.getElementById("save")
save.addEventListener("click",()=>{

})

})
  })(i)
  
}
</script>





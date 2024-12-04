<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- jQuery (required for your code to work) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

</body>
</html>
<?php
class table{
  public $totals=0;

function table(){
  ?>
<!-- SweetAlert2 CSS -->


<script>
  var totals=0;
var btn=document.getElementsByClassName("add")
var magac=document.getElementsByClassName("magac")
var qiimo=document.getElementsByClassName("qiimo")
var qty=document.getElementsByClassName("qty")
var total=document.getElementById("total");
var table=document.getElementById("table")
var form=document.createElement("form")
var dvtotal=document.createElement("input")
dvtotal.setAttribute("class","input")
dvtotal.setAttribute("type","hidden")
dvtotal.setAttribute("name","total")
var bf=document.createElement("button")
bf.setAttribute("class","btn btn-primary")
bf.setAttribute("id","b1")
var bt=document.createTextNode("save")
bf.appendChild(bt)
form.setAttribute("id","fm")
// form.setAttribute("method","post")
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
var guud=0;
t1=1;
t2=2;
t3=3;
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
  var inp1=document.createElement("input")
  var inp2=document.createElement("input")
  var inp3=document.createElement("input")
  var inp4=document.createElement("input")
  inp1.setAttribute("type","text")
  inp2.setAttribute("type","text")
  inp3.setAttribute("type","text")
  inp4.setAttribute("type","text")
  inp1.setAttribute("class","input")
  inp2.setAttribute("class","input")
  inp3.setAttribute("class","input")
  inp4.setAttribute("class","input")
  inp1.setAttribute("value",`${magac[index].innerHTML}`)
  inp2.setAttribute("value",`${qiimo[index].innerHTML}`)
  inp3.setAttribute("value",`${qty[index].value}`)
  inp3.setAttribute("class",`inp3`)
  inp1.setAttribute("name","item_name[]")
  inp2.setAttribute("name","price[]")
  inp3.setAttribute("name","qty[]")
  inp4.setAttribute("name","id[]")
  inp4.setAttribute("value",`${r}`)
  td1.setAttribute("id","td1")
  td2.setAttribute("id","td2")
  td3.setAttribute("id","td3")
  td4.setAttribute("id","td4")
  td2.setAttribute("class","items")
  td3.setAttribute("class","items")
  td4.setAttribute("class","items")
var txt1=document.createTextNode(`${r}`)
// var txt2=document.createTextNode(`${magac[index].innerHTML}`)
// var txt3=document.createTextNode(`${qiimo[index].innerHTML}`)
// var txt4=document.createTextNode(`${qty[index].value}`)
var btt=document.createElement("button")
btt.setAttribute("class","btn btn-danger bg-danger text-white remove")
var txt5=document.createTextNode("Remove")
btt.appendChild(txt5);
td5.appendChild(btt);
td1.appendChild(inp4)
td2.appendChild(inp1)
td3.appendChild(inp2)
td4.appendChild(inp3)
trs.appendChild(td1)
trs.appendChild(td2)
trs.appendChild(td3)
trs.appendChild(td4)
trs.appendChild(td5)
tbody.appendChild(trs);
tb.appendChild(trs)
form.appendChild(dvtotal);
form.appendChild(tb)
table.appendChild(form);
table.appendChild(bf)


var inp3=document.getElementsByClassName("inp3")

// alert((qiimo[index].innerHTML)*(parseInt(qty[index].value)));
// parseFloat(qiimo[index].innerHTML)*parseFloat(qty[index].value)

guud+=parseFloat(qiimo[index].innerHTML)*(parseFloat(qty[index].value))
total.innerHTML=guud;
dvtotal.value=guud
r+=1;
// for(j=0; j<inp3.length; j+=1){
//   ((index)=>{
//  inp3[index].addEventListener("blur",()=>{
//   alert(inp3[index].value)
//  })
//   })(j)
// }
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
//  remove[index].addEventListener("click",()=>{
//   // alert(tb.rows[index+1].innerHTML)
//   tts[index].remove()
//   // var g=parseFloat(guud)-(parseFloat(qiimo[index].innerHTML)*(parseFloat(qty[index].value)))
//   alert(qty[index].value)
  
//  })
//   })(c)
// }

var b1=document.getElementById("b1")
$("#b1").click(()=> op())
       function op() {
    $.ajax({
        url: "operation.php", // Ensure this path is correct
        data: $("#fm").serialize(), // Serialize the form data
        type: "POST", // Ensure the correct HTTP method is used
        success: function (response) {
            // Log the response to the console
            console.log("Success response:", response);

            // Using SweetAlert2 to show the success message
            Swal.fire({
                title: 'Success!',
                text: response,  // Display the response from the server
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function (xhr, status, error) {
            // Log the error to the console
            console.log("Error response:", xhr, status, error);

            // Using SweetAlert2 to show the error message
            Swal.fire({
                title: 'Error!',
                text: 'There was an error saving the data.',
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        }
    });
}

// $("#b1").click(()=>{
//   alert("save btt")
// })

})
  })(i) 
}

</script>
<?php
}
}
?>



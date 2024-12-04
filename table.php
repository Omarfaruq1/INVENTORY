<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include"boot.php"?>
</head>
<style>
  input{
      border: none;
      background-color: transparent;
      width: 30%;
    }
</style>
<body>
  <div class="container">
    <div class="row">
      <div class="col">
  <form action="operation.php" method="post">
    <table class="table" id="ta">
      <thead><tr><th>No</th><th>Item-Name</th><th>price</th><th>Quantity</th></tr></thead>
      <tbody>
      <tr><td>1</td><td><input type="text" name="txt1" value="avocado" ></td><td><input type="text" name="txt2" value="2.5" ></td><td><input type="text" name="txt3" value="5" ></td></tr>
      <tr><td>1</td><td><input type="text" name="txt1" value="avocado" ></td><td><input type="text" name="txt2" value="2.5" ></td><td><input type="text" name="txt4" value="5" ></td></tr>
    </tbody>
    </table>
   <button class="btn btn-primary">save</button>
  </form>
  <button class="btn btn-primary mt-3" id="b1">Add</button>
      </div>
      <div class="col"></div>
    </div>
  </div>
</body>
</html>
<script>
  var ta=document.getElementById("ta")
  var i=2;
  var ip=4;
 var add=document.getElementById("b1")
 add.addEventListener("click",()=>{
  var tr=document.createElement("tr")
  var td1=document.createElement("td")
  var td2=document.createElement("td")
  var td3=document.createElement("td")
  var td4=document.createElement("td")
  var inp1=document.createElement("input")
  var inp2=document.createElement("input")
  var inp3=document.createElement("input")
  var txt=document.createTextNode(i)
  td1.appendChild(txt);
  inp1.setAttribute("type","text")
  inp2.setAttribute("type","text")
  inp3.setAttribute("type","text")
  inp1.setAttribute("name","txt4")
  inp2.setAttribute("name","txt5")
  inp3.setAttribute("name","txt6")
  inp1.setAttribute("value",`fruits`)
  inp2.setAttribute("value",`1.5`)
  inp3.setAttribute("value",`3`)
  td2.appendChild(inp1)
  td3.appendChild(inp1)
  td4.appendChild(inp1)
  tr.appendChild(td1)
  tr.appendChild(td2)
  tr.appendChild(td3)
  tr.appendChild(td4)
  ta.appendChild(tr)
 i+=1;
 alert(ta.rows.length)
 })

</script>
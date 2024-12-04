<?php
include"Codes.php";
$co=new Codes();
$co->setConnect();
// echo $_FILES['txtf']['name']."<br>";
// echo $_FILES['txtf']['type']."<br>";
// echo $_FILES['txtf']['size']."<br>";
// echo $_FILES['txtf']['name']."<br>";
// echo $_FILES['txtf']['error']."<br>";
$txt1=$_REQUEST['i_name'];
$txt2=$_REQUEST['i_type'];
$txt3=$_REQUEST['i_price'];
$txt4=$_REQUEST['i_statuss'];
$img="image/";
$img.=basename($_FILES['txtfile']['name']);
if($_FILES['txtfile']['type']=="image/jpeg" || $_FILES['txtfile']['type']=="image/png" || $_FILES['txtfile']['type']=="image/jpg"){
 if(move_uploaded_file($_FILES['txtfile']['tmp_name'],$img)){
  $sql="insert into images values(null,'$txt1','$txt2','$txt3','$txt4','current_date()','$img')";
  $r=$co->db->query($sql);
  echo$r==1?"insert success":"failed";
 }else
     echo"not upload";

}else{
  echo"fadlan sawir kali soogeli";
}
?>
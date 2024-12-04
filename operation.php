<?php 
include "Codes.php";
$ob=new Codes();
// $txt1=$_REQUEST['txt1'];
// echo$txt1;
$ob->setConnect();
global $last_id;
$txt1=$_REQUEST['total'];

$sql="insert into totals values(null,'$txt1')";
$r=$ob->db->query($sql);
if ($ob->db->query($sql) == TRUE) {
  $last_id = $ob->db->insert_id;
 
} else {
  echo "Error: " . $sql . "<br>" . $ob->db->error;
}
for($i=0; $i<count($_REQUEST['id']);$i+=1){
	$item=$_REQUEST['item_name'][$i];
	$price=$_REQUEST['price'][$i];
	$qty=$_REQUEST['qty'][$i];
	$sql="insert into shopping_item values(null,'$last_id','$item','$qty','$price')";
	$r=$ob->db->query($sql);
	echo$r==1?"insert success":"failed";
echo $i;
}
$ob->db->close();
?>

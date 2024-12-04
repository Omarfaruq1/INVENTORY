<?php 
session_start();
$db=new mysqli("localhost","root","","inventory1");
$user=$_REQUEST['txt1'];
$pass=$_REQUEST['txt2'];
$u="";
if(empty($user))
   $u="fadlan wax geli";
$sql="select * from login where username='$user' and password='$pass'";
$re=$db->query($sql);
if($row=$re->fetch_array(MYSQLI_ASSOC)){
	$_SESSION['user']=$row['full_name'];
	$_SESSION['id']=$row['id'];
     header("location: index.php");
}	
else{
header("location:login.php");
}
 ?>




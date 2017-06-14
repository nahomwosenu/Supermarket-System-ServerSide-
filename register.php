<?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 	$id=$_POST['id'];
 	$name=$_POST['name'];
 	$address=$_POST['address'];
 	$email=$_POST['email'];
 	$phone=$_POST['phone'];
 	$user=$_POST['username'];
 	$pass=$_POST['password'];
 	$query="insert into account(`emp-id`,`name`,`father name`,`username`,`password`,`Role`,`mobile phone`,`email`) values('$id','$name','s','$user','$pass','customer','$phone','$email')";
 	$con=mysqli_connect('localhost','root','','super');
 	$result=mysqli_query($con,$query) or die(mysqli_error($con));
 	if($result===true)
 		die("true");
 	else die("false");
 }
?>
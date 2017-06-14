<?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 	//id,date,email,comment
 	$date=date("Y-m-d");
 	$email=$_POST['email'];
 	$comment=$_POST['text'];
 	$query="insert into feedback(date,email,comment) values('$date','$email','$comment')";
 	$con=mysqli_connect('localhost','root','','super');
 	$result=mysqli_query($con,$query) or die(mysqli_error($con));
 	if($result===true)
 		die('true');
 	else die('false');
 }
?>
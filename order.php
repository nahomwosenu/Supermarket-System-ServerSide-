<?php 
 function addOrder($user,$item,$date,$address){
 	$query="insert into orders(username,item,date,address) values('$user','$item','$date','$address')";
 	$con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
 	$result=mysqli_query($con,$query) or die(mysqli_error($con));
 	if($result===true)
 		return true;
 	else return false;
 }
function deleteOrder($user,$item){
	$query="delete from orders where username='$user' and item='$item'";
	$con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
 	$result=mysqli_query($con,$query) or die(mysqli_error($con));
 	if($result===true)
 		return true;
 	else return false;
}
function getOrders(){
	$query="select username,item,date,address from orders";
	$con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
 	$result=mysqli_query($con,$query) or die(mysqli_error($con));
 	$data="";
 	while($row=mysqli_fetch_array($result)){
 		$data=$row['username'].",".$row['item'].",".$row['date'].",".$row['address'].";".$data;

 	}
 	return $data;
}
function receive($user,$item){
 $query="delete from orders where username='$user' and item='$item'";

 $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
 $result=mysqli_fetch_array($con);
 if($result===true)
 	return true;
 else return false;
}
?>
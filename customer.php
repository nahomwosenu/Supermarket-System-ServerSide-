<?php 
 /*
  create table customer(
   id varchar(255) primary key,
   firstname varchar(255),
   lastname varchar(255),
   email varchar(255),
   phone varchar(255),
   address varchar(255)
  );
 */
  function newCustomer($id,$fname,$lname,$email,$phone,$address){
  	$con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  	$query="insert into customer(id,firstname,lastname,email,phone,address) values('$id','$fname','$lname','$email','$phone','$address') ";
  	$result=mysqli_query($con,$query) or die(mysqli_error($con));
  	if($result===true)
  		return true;
  	else return false;
  }
  function deleteCustomer($id){
    $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
    $query="delete form customer where id='$id'";
    $result=mysqli_query($con,$query) or die(mysqli_error)
  }
  function getId($firstname,$lastname){
  	$con=mysqli_connect('localhost','root','','todb');
  }
  function getFirstName($id){
  	$con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  	$query="select firstname from customer where id='$id'";
  	$result=mysqli_query($query) or die(mysqli_error($con));
  	if($row=mysqli_fetch_array($result)){
  		$name=$row['firstname'];
  		return $name;
  	}
  	return "";
  }
?>
//E-payment in Ethiopia
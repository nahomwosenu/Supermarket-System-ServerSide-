<?php 
/*
 create table item(
  id varchar(255),
  name varchar(255),
  catagory varchar(255),
  price varchar(255),
  tax varchar(255),
  vat varchar(255),
  image_url varchar(255),
  shiping_cost varchar(255)
 );
*/
 function getItemDetail($item){
   $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
   $query="select * from item";
   $result=mysqli_query($con,$query) or die(mysqli_error($con));
   $data='';
   while($row=mysqli_fetch_array($result)){
   	$data['id']=$row['id'];
   	$data['name']=$row['name'];
   	$data['catagory']=$row['catagory'];
   	$data['price']=$row['price'];
   	$data['tax']=$row['tax'];
   	$data['vat']=$row['vat'];
   	$data['image_url']=$row['image_url'];
   	$data['shiping_cost']=$row['shiping_cost'];
   }
   return $data;
 }
 function addItem($id,$name,$catagory,$price,$tax,$vat,$image_url,$shiping_cost){
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $query="insert into item(id,name,catagory,price,tax,vat,image_url,shiping_cost) values('$id','$name','$catagory','$tax','$vat','$image_url','$shiping_cost')";
  $result=mysqli_query($con,$query) or die(mysqi_error($con));
  if($result===true)
  	return true;
  else return false;
 }
 function deleteItem($id){
 	$con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
 	$query="delete from item where id='$id'";
 	$result=mysqli_query($con,$query);

 }
 function exists($item){
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $query="select id from item where id='$item'";
  $result=mysqli_query($con,$result) or die(mysqli_error($result));
 }
 function getShipingCost($item){
 	$con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
 	$query="select shiping_cost from item where id='$item'";
 	$result=mysqli_query($con,$query) or die(mysqi_error($con));
 	if($row=mysqli_fetch_array($result))
 		return $row['shiping_cost'];
 }
 function getItemName($item){
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $query="select name from item where id='$item'";
  $result=mysqli_query($con,$query) or die(mysqli_error($con));
  if($row=mysqli_fetch_array($result)){
  	$name=$row['name'];
  	return $name;
  }
  return false;
 }
 function getItemPrice($item){
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $query="select price from item where id='$item'";
  $result=mysqli_query($con,$query) or die(mysqli_error($result));
  if($row=mysqli_fetch_array($result)){
  	$data=$row['price'];
  	return $data;
  }
  return false;
 }
 function getItemTax($item){
   $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
   $query="select tax from item where id='$item'";
   $result=mysqli_query($con,$query) or die(mysqli_error($con));
   if($row=mysqli_fetch_array($result))
   	return $row['tax'];
   else
    return false;
 }
 function getItemVat($item){
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $query="select vat from item where id='$item'";
  $result=mysqli_query($con,$query) or die(mysqli_error($con));
  if($row=mysqli_fetch_array($result))
  	return $row['vat'];
  else return false;
 }
 function getItemImageUrl($item){
   $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
   $query="select image_url from item where id='$item'";
   $result=mysqli_query($con,$query) or die(mysqli_error($con));
   if($row=mysqli_fetch_array($result))
   	return $row['image_url'];
   else return false;
 }
?>
<?php 
/*
 create table cart(
  cart_id varchar(255) primary key,
  user_id varchar(255),
  time varchar(255),
  date varchar(255)
 );
  create table cart_item(
   cart_id varchar(255),
   item_id varchar(255)
  );
*/
function newCart($cart_id,$user_id,$time,$date){
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $query="insert into cart(cart_id,user_id,time,date) values('$cart_id','$user_id','$time','$date')";
  $result=mysqli_query($con,$query) or die(mysqli_error($query));
  if($result===true)
  	return true;
  else return false;
}
function getItemList($cart_id){
	$con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
	$query="select item_id from cart_item where cart_id='$cart_id'";
	$result=mysqli_query($con,$query) or die(mysqli_error($query));
	$data='';
	while($row=mysqli_fetch_array($result)){
		$data=$data.','.$row['item_id'].',';
	}
	return $data;
}
function deleteCart($cart_id){
   $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
   $query="delete from cart where cart_id='$cart_id'";
   $result=mysqli_query($con,$query);
   if($result===true){
   	$subquery="delete from cart_item where cart_id='$cart_id'";
   	$result2=mysqli_query($con,$subquery) or die(mysqli_error($con));
   	if($result2===true)
   		return true;
   	else return false;
   }
   else return false;
}
function exists($cart_id){
	$con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
	$query="select cart_id from cart where cart_id='$cart_id'";
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
	if($row=mysqli_fetch_array($result)){
		return true;
	}
	else false;
}
function addToCart($item_id,$cart_id){
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $query="insert into cart_item(item_id,cart_id) values('$item_id','$cart_id')";
  $result=mysqli_query($con,$query) or die(myslqi_error($con,$query));
  if($result===true)
  	return true;
  else return false;
}
function removeFromCart($item_id,$cart_id){
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $query="delete from cart_item where item_id='$item_id' and cart_id='$cart_id'";
  $result=mysqli_fetch_array($con,$query) or die(mysqli_error($con));
  if($result===true)
  	return true;
  else return false;
}
function getTotalItems($cart_id){
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $item_list=getItemList($cart_id);
  $items=explode(',',$item_list);
  $iterator=0;
  foreach($items as $item){
   $iterator++;
  }
  return $iterator;
}
function getTotalCost($cart_id){
  require_once('item.php');
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $item_list=getItemList($cart_id);
  $items=explode(',',$item_list);
  $total=0;
  foreach($items as $item){
   $price=getItemPrice($item);
   $tax=getItemTax($item);
   $vat=getItemVat($item);
   $shipingCost=getShipingCost($item); 
   $total=$total+($price*$tax)+$vat+$shipingCost;
  }
  return $total;
}
function getTotalItemCost($cart_id){
  require_once('item.php');
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $item_list=getItemList($cart_id);
  $items=explode(',',$item_list);
  $total=0;
  foreach($items as $item){
   $price=getItemPrice($item);
   $tax=getItemTax($item);
   
   $total=$total+($price*$tax);
  }
  return $total; 
 }
function getTotalShipingCost($cart_id){
  require_once('item.php');
  $con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error($con));
  $item_list=getItemList($cart_id);
  $items=explode(',',$item_list);
  $total=0;
  foreach($items as $item){
   $shipingCost=getShipingCost($item);
   $total=$total+$shipingCost;
  }
  return $total;
}
?>
<?php 
/*
 create table store_item(
  item_id varchar(255),
  item_name varchar(255),
  item_type varchar(255),
  unit_price varchar(255),
  image_url varchar(255),
  shelf_number varcar(255),
  discount varchar(255)
 );
 default Images dir: /other/item/
*/
 function getItemDetail($item){
   $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
   $query="select * from item";
   $result=mysqli_query($con,$query) or die(mysqli_error($con));
   $data='';
   while($row=mysqli_fetch_array($result)){
   	$data['id']=$row['item_id'];
   	$data['name']=$row['item_name'];
   	$data['catagory']=$row['item_type'];
   	$data['price']=$row['unit_price'];
   	$data['tax']=$row['tax'];
   	$data['vat']=$row['vat'];
   	$data['image_url']=$row['image_url'];
   	$data['shiping_cost']=$row['shiping_cost'];
   }
   return $data;
 }
 function addImage($id,$imageData){
 	 // Get image string posted from Android App
    $base=$_REQUEST['image'];
    // Get file name posted from Android App
    $filename = $_REQUEST['filename'];
    // Decode Image
    $binary=base64_decode($base);
    header('Content-Type: bitmap; charset=utf-8');
    // Images will be saved under 'www/imgupload/uplodedimages' folder
    $file = fopen('uploadedimages/'.$filename, 'wb');
    // Create File
    fwrite($file, $binary);
    fclose($file);
    echo 'Image upload complete, Please check your php file directory';
 }
 function addItem($id,$name,$catagory,$price,$tax,$vat,$image_url,$shiping_cost){
  $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
  $query="insert into store_item(item_id,item_name,item_type,unit_price,tax,vat,image_url,shiping_cost) values('$id','$name','$catagory','$tax','$vat','$image_url','$shiping_cost')";
  $result=mysqli_query($con,$query) or die(mysqi_error($con));
  if($result===true)
  	return true;
  else return false;
 }
 function deleteItem($id){
 	$con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
 	$query="delete from store_item where item_id='$id'";
 	$result=mysqli_query($con,$query);

 }
 function exists($item){
  $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
  $query="select item_id from store_item where id='$item'";
  $result=mysqli_query($con,$result) or die(mysqli_error($result));
 }
 function getShipingCost($item){
 	$con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
 	$query="select shiping_cost from store_item where item_id='$item'";
 	$result=mysqli_query($con,$query) or die(mysqi_error($con));
 	if($row=mysqli_fetch_array($result))
 		return $row['shiping_cost'];
 }
 function getItemName($item){
  $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
  $query="select item_name from store_item where item_id='$item'";
  $result=mysqli_query($con,$query) or die(mysqli_error($con));
  if($row=mysqli_fetch_array($result)){
  	$name=$row['item_name'];
  	return $name;
  }
  return false;
 }

 function getItemPrice($item){
  $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
  $query="select unit_price from store_item where item_id='$item'";
  $result=mysqli_query($con,$query) or die(mysqli_error($result));
  if($row=mysqli_fetch_array($result)){
  	$data=$row['price'];
  	return $data;
  }
  return false;
 }
 function getItemTax($item){
   $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
   $query="select tax from store_item where id='$item'";
   $result=mysqli_query($con,$query) or die(mysqli_error($con));
   if($row=mysqli_fetch_array($result))
   	return $row['tax'];
   else
    return false;
 }
 function getItemVat($item){
  $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
  $query="select vat from store_item where item_id='$item'";
  $result=mysqli_query($con,$query) or die(mysqli_error($con));
  if($row=mysqli_fetch_array($result))
  	return $row['vat'];
  else return false;
 }
 function getItemImageUrl($item){
   $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
   $query="select image_url from store_item where id='$item'";
   $result=mysqli_query($con,$query) or die(mysqli_error($con));
   if($row=mysqli_fetch_array($result))
   	return $row['image_url'];
   else return false;
 }
 function getAllByName(){
   $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
   $query="select item_name,item_id,item_type,image_url,unit_price,shelf_number from store_item";
   $result=mysqli_query($con,$query) or die(mysqli_error($con));
   $item="";
   while($row=mysqli_fetch_array($result)){
   	$item=$row['item_id'].",".$row['item_name'].",".$row['item_type'].",".$row['image_url'].",".$row['unit_price'].",".$row['shelf_number'].";".$item;
   }
   return $item;
 }
 function getAllByType($type){
   $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
   $query="select item_name,item_id,item_type,image_url,unit_price,shelf_number from store_item where item_type='$type'";
   $result=mysqli_query($con,$query) or die(mysqli_error($con));
   $item="";
   while($row=mysqli_fetch_array($result)){
   	$item=$item.$row['item_id'].",".$row['item_name'].",".$row['item_type'].",".$row['image_url'].",".$row['unit_price'].",".$row['shelf_number'].";";
   }
   return $item;
 }
?>
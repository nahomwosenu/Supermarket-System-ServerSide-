<?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 	$request=$_POST['request'];
 	if($request=='get'){

 		getNotfication();

 	}
 }
 function setSeen(){
    $query="update notice set status='seen'";
    $con=mysqli_connect('localhost','root','','super');
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
    return $result;
 }
 function getNotfication(){
 	$date=date('Y-m-d');
    $query="select id,title,content,author,ndate from notice where status!='seen'";
    $con=mysqli_connect('localhost','root','','super');
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
    $message="";
    while($row=mysqli_fetch_array($result)){
    	$from=$row['author'];
    	$body=$row['content'];
    	$title=$row['title'];
    	$date=$row['ndate'];
    	$message=$from.','.$title.','.$body.','.$date.';'.$message;
    }
    setSeen();
    die($message);
 }
 function newNotification($from,$body,$title){
    $date=date('Y-m-d');
    $query="insert into notice(title,content,author,ndate,status) values($title','$body','$from','$date')";
    $con=mysqli_connect('localhost','root','','super');
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
    if($result===true)
    	return true;
    else return false;
 }
 function delete($title,$author){
 	$query="delete from notice where author='$author' and title='$title'";
 	$con=mysqli_connect('localhost','root','','super');
 	$result=mysqli_query($con,$query) or die(mysqli_error($con));
 	return $result;
 }
?>
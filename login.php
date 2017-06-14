<?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){
   $username=$_POST['username'];
   $password=$_POST['password'];
   $query="select Role from account where username='$username' and password='$password'";
   $sql=mysqli_connect('localhost','root','','super');
   $result=mysqli_query($sql,$query) or die(mysqli_error($sql));
   if($row=mysqli_fetch_array($result)){
   	die("true:".$row['Role']);
   }
   else die('false');
 }
?>
<?php 
 //this script handles all requests coming from the mobile app
 if($_SERVER['REQUEST_METHOD']=='POST'){
 	$request='';
 	if(isset($_POST['request'])){
 		$request=$_POST['request'];
 	}
 	redirector($request);
 }
 function redirector($request){
 	include_once('order.php');
 	if($request=='all'){
 		require_once('item.php');
      $items=getAllByName();
      die($items);
 	}
 	else if($request=='login'){

 	}
 	else if($request=='order'){
 		$list=getOrders();
 		die($list);
 	}
 	else if($request=='order_now'){
 	$user=$_POST['user'];
 	    $item=$_POST['item'];
 	    $query="insert into orders values('$user','$item')";
 	    $con=mysqli_connect('localhost','root','','super');
 	    $result=mysqli_query($con,$query) or die(mysqli_error($con));	
 	    if($result===true)
 	    	die('true');
 	    else die('false');	
 	}
 	else if($request=='receive'){
 		$user=$_POST['username'];
 		$item=$_POST['item'];
 		$driver=$_POST['driver'];
 		$date=date('Y-m-d');
 		recieve($user,$item,$driver,$date);
 	}
 	else if($request=='bank'){
 		
 	    $name=$_POST['name'];
 	    $accnumber=$_POST['account'];
 	    $cost=$_POST['cost'];
 	    $items=$_POST['items'];
 		$account=$_POST['account'];
 		$username=$_POST['username'];
 		$date='2017-01-01';
 		$address=$_POST['address'];
 	    $query="select birramount from bankaccount where name='$name' and accnumber='$accnumber'";
 	    $con=mysqli_connect('localhost','root','','super') or die(mysqli_error($con));
 	    $result=mysqli_query($con,$query) or die(mysqli_error($con));
 	    if($row=mysqli_fetch_array($result)){

 	    	$balance=$row['birramount'];
 	    	if($balance<$cost)
 	    		die("Error: Not Enough Balance");
 	    	else{
 	    		
 	    		$balance=$balance-$cost;
 	    		$query2="update bankaccount set birramount='$balance' where accnumber='$accnumber'";
 	    		
 	    		$r2=mysqli_query($con,$query2) or die(mysqli_error($con));
 	    		
 	    		$item=explode(';',$items);
 	    		foreach ($item as $value) {
 	    			echo "I am here $value";
 	    			addOrder($username,$value,$date,$address);
 	    		}
 	    		die("true:".$balance);
 	    	}
 	    }
 	    else die("Invalid Account Number!");
 	}
 }
 function recieve($user,$item,$driver,$date){
 	$query="delete from orders where username='$user' and item='$item'";
 	$query2="insert into recieved_order(username,item,driver,date) values('$user','$item','$driver','$date')";
 	$con=mysqli_connect('localhost','root','','super');
 	$result=mysqli_query($con,$query);
 	$result1=mysqli_query($con,$query) or die(mysqli_error($con));
 	if($result1===true && $result2===true)
 		return true;
 	else return false;
 }
?>
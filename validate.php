<?php

	session_start();
	$con=mysqli_connect('127.0.0.1','root','');

	mysqli_select_db($con, 'userregistration');
	$name= $_POST['user'];
	$pass=$_POST['password'];

	$s= " select * from usertable where name='$name' && password= '$pass' ";
	$result=mysqli_query($con,$s);
	$num= mysqli_num_rows($result);
	$s1= "select * from usertable where name='$name'";
	$result1=mysqli_query($con,$s);
	$u= mysqli_num_rows($result1);
	if($num==1){
		$_SESSION['username']=$name;
		$_SESSION['password']=$pass;
		header("location:master.php");
	}
	else{
		echo "<script type='text/javascript'> alert('Wrong Credentials'); window.location.href='login.php'; </script>";
	}

?>
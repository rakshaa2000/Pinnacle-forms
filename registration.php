<?php

	session_start();
	$con=mysqli_connect('127.0.0.1','root','');
	$sql=" CREATE DATABASE IF NOT EXISTS userregistration";
	$res=mysqli_query($con,$sql);
	mysqli_select_db($con, 'userregistration');
	$name= $_POST['user'];
	$pass=$_POST['password'];
	$cpass=$_POST['cpassword'];
	$s1="CREATE TABLE IF NOT EXISTS usertable (name VARCHAR(255), password VARCHAR(255))";
	$res1=mysqli_query($con,$s1);
	$s= "select * from usertable where name='$name'";
	$result=mysqli_query($con,$s);
	$num= mysqli_num_rows($result);
	$c="";

	if($num==1){
		$c="Username Already Taken";
	}
	elseif ($cpass!=$pass) {
		$c="Enter same password in both columns";
	}
	else{
		$reg=" insert into usertable(name,password) values('$name','$pass')";
		// $_SESSION['username']=$name;
		// //header("location:home.php");
		mysqli_query($con,$reg);
		$c="Registration Successful";
	}
?>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<h1><?php echo $c?></h1>
	<form action="login.php">
		<button type="submit" class="btn btn-primary sub sub1">SIGN UP PAGE</button>
	</form>
</body>
</html>
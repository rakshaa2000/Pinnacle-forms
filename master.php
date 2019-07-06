<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location:login.php");
}
$link=mysqli_connect('127.0.0.1','root','');
$sql="SHOW TABLES FROM ".$_SESSION['username'];
$tables=mysqli_query($link,$sql);
// $row = $tables->fetch_array();
if($tables){
	while($row = $tables->fetch_array()){
	// $result[] = array($row);
	$result[]=$row[0];
	}
	$string=implode(",",$result);
}
else{
	$string=NULL;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Master Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<script src="https://kit.fontawesome.com/2ddcad0322.js"></script>
	<h1>WELCOME <?php echo $_SESSION['username']; ?></h1>
	<h4>Existing Forms</h4>
	<h6 id="p1" align="center"></h6>
	<script type="text/javascript">
		var result='<?php echo $string; ?>';
		var uname= '<?php echo $_SESSION['username']; ?>';
		console.log(result);
		var tables=result.split(",");
		var p=document.getElementById('p1');
		if(result==""){
			p.innerHTML+="NO TABLES";
		}
		else{
			for (var i = 0; i < tables.length; i++) {
			var name=tables[i];
			var url="addform.php?title="+name+"&uname="+uname;
			var url1="show.php?title="+name+"&uname="+uname;
			p.innerHTML+="<a href="+url+">"+name+"</a>&nbsp;<a href="+url1+">Show Submissions</a><br>";
		}	
		}
		
		
	</script>
	<a href="addform.php" id='a1'><i class="fas fa-file-alt fa-3x"></i>&nbsp;Click here to Create a New Form</a>
</body>
</html>
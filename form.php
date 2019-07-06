<?php
session_start();
$fields=explode(',',$_SESSION['str']);
// print_r($fields);
$link=mysqli_connect('127.0.0.1','root','',$_SESSION['username']);
$q="SELECT * FROM ".$_SESSION['title'];
$res=mysqli_query($link,$q);
$rec=mysqli_num_rows($res)+1;
for($i=1; $i<=$_SESSION['x']; $i++){
	if(isset($_POST[$fields[$i]]))
		$var=$_POST[$fields[$i]];
	if($i==1)
		$query="INSERT INTO ".$_SESSION['title']."(".$fields[$i].") VALUES ('$var')";
	else
		$query="UPDATE ".$_SESSION['title']." SET ".$fields[$i]."= '$var' WHERE AutoID='$rec'";
	mysqli_query($link,$query);
	// echo $fields[$i];
}
?>
<html>
<head>
	<title>Share URL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<h1>HERE IS THE LINK TO SHARE WITH YOUR FRIENDS</h1>
	<p id="p1" align="center"></p>
	<p id='p2' align="center"></p2>
	<script type="text/javascript">
		var title='<?php echo $_SESSION['title']; ?>';
		var uname='<?php echo $_SESSION['username']; ?>';
		var p1=document.getElementById('p1');
		p1.innerHTML="<a href='addform.php?title="+title+"&uname="+uname+"'>https://127.0.0.1/userlogin/addform.php?title="+title+"&uname="+uname+"</a>";
		var p2=document.getElementById('p2');
		p2.innerHTML="<a href='logout.php'>LOGOUT</a>";
	</script>
</body>
</html>
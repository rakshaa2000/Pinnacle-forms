<?php
session_start();
$conn=mysqli_connect('127.0.0.1','root','');
$user=$_SESSION['username'];
$title=$_GET['title'];
$table="SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$title' AND TABLE_SCHEMA='$user'";
$res=mysqli_query($conn,$table);
// $lol= mysqli_num_rows($result);
$new[]=array();
while($row = $res->fetch_assoc()){
    $new[] = $row;
}
$x=$new[1]['COUNT(*)']-1;
// echo $x;
$new1[]=array();
$lol=mysqli_select_db($conn,$user);
// echo $lol;
$sql="SELECT * FROM ".$title;
$result= mysqli_query($conn,$sql);
$rec=mysqli_num_rows($result);
// echo $rec;
while($row = $result->fetch_assoc()){
		$new1[] = $row;
}
// print_r($new1);
$table1="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$title' AND TABLE_SCHEMA='$user'";
$res2=mysqli_query($conn,$table1);
$new2[]=array();
while($row = $res2->fetch_assoc()){
	$new2[] = $row['COLUMN_NAME'];
}
// print_r($new2);
echo "<h1 id='h1tit'>".$title."</h1>";
echo "<table align='center' id='myTable1' border='20px' padding='5px'>";
echo "<tr>";
for($j=1; $j<=$x+1; $j++){
	echo "<th><h2>".$new2[$j]."</h2></th>";
}
echo "</tr>";
for($i=1; $i<=$rec; $i++){
	echo "<tr>";
	for($j=1; $j<=$x+1; $j++){
		$col=$new2[$j];
		echo "<td align='left'><font size='5'>".$new1[$i][$col]."</font></td>";
	}
	echo "</tr>";
}
echo "</table>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Display Results</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<a href='logout.php'>LOGOUT</a>
</body>
</html>
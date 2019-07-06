<?php
session_start();
$link= mysqli_connect('127.0.0.1','root','');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 if(!isset($_GET['title'])){
	$x =isset($_COOKIE["index"])?$_COOKIE["index"]:1;
	if(!isset($_SESSION['user'])){
		header("location:home.php");
	}
	$sql=" CREATE DATABASE IF NOT EXISTS ".$_SESSION['user'];
	mysqli_query($link,$sql);
	$lol=mysqli_select_db($link,$_SESSION['user']);
	// echo $lol;
	if(!isset($_POST['title'])){
		header("location:home.php");
	}
	$title = $_POST['title'];
	// echo $title;
	$desc=isset($_POST['desc']) ? $_POST['desc'] : '';
	// echo $x;
	$conn= new mysqli('localhost','root','',$_SESSION['user']);
	$table="";
	for ($i=1; $i<=$x; $i++) {

		$var=isset($_POST['field'.(string)$i])?$_POST['field'.(string)$i]:'field'.$i;
		$varlen=$_POST['len'.(string)$i];
		$vartype=isset($_POST['myList'.(string)$i])? $_POST['myList'.(string)$i]:'VARCHAR';
		if($i==1){
			$table="CREATE TABLE ".$title."( AutoID INT AUTO_INCREMENT PRIMARY KEY, ".$var." ".$vartype."(".$varlen."))";
			$res=mysqli_query($conn,$table);
		}
		else{
			
			$table="ALTER TABLE ".$title." ADD ".$var." ".$vartype."(".$varlen.")";
			$res=mysqli_query($conn,$table);
		}
		
	}

}
else{
	$title=$_GET['title'];
	$uname=$_GET['uname'];
	$table="SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$title' AND TABLE_SCHEMA='$uname'";
	$result=mysqli_query($link,$table);
	// $lol= mysqli_num_rows($result);
	$new[]=array();
	while($row = $result->fetch_assoc()){
	    $new[] = $row;
	}
	$x=$new[1]['COUNT(*)']-1;
	echo $x;
	$_SESSION['uname']=$uname;

}
$new[$x+1]=array();
$query=$link->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$title'");
while($row = $query->fetch_assoc()){
    $new[] = $row;
}
$columnArr = array_column($new, 'COLUMN_NAME');
$_SESSION['x']=$x;
// print_r($columnArr);
$str = implode(",", $columnArr);
$_SESSION['str']=$str;
// echo $str;
$_SESSION['title']=$title;

?>
<html>
<head>
	<title>Database Created</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<button onclick="display();" class="btn btn-primary sub" id="lol1">Click here to generate the form</button>
	<form id="formdis" action="form.php" method="post"></form>
	<script type="text/javascript">
		var i=1;
		var f=document.getElementById('formdis');
		var x= '<?php print_r($_SESSION['x']); ?>'
		var field='<?php echo ($_SESSION['str']); ?>';
		var array=field.split(",");
		function display() {
			for(var i=1; i<=x; i++){
				f.innerHTML+="<div class='form-group' id= div"+i+"><label>"+array[i]+"</label><input name="+array[i]+" id="+array[i]+" required='true' class='field'/></div>";
				console.log(array[i]);
			}
			f.innerHTML+="<button type='submit' id='subform' class='btn btn-primary sub'>Submit</button>";
		}
	</script>
</head>
<body>
</body>	
<html>
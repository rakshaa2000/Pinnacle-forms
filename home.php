<?php

session_start();
if(!isset($_SESSION['username'])){
	header("location:login.php");
}
$username= $_SESSION['username'];
$password= $_SESSION['password'];
$_SESSION['user']=$username;
// $conn= new mysqli('localhost','root','');
?>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/2ddcad0322.js"></script>
</head>
<body>
	<div class="container">
		<a href="logout.php" class="float-right">LOGOUT</a>
		<h1>Welcome <?php echo $_SESSION['username']; ?> </h1>
	</div>
	<h4> Please use Underscore instead of Spaces to separate words in Title and FieldNames</h4>
	<br>
	<form action="addform.php" method="post" id='form1' align="center">
		<a onclick="#" class='save-btn'>
			<i class="fas fa-save fa-3x"></i>
			<input type="submit" name="submit">
		</a>
		<input type='text' id='title' name="title" placeholder='Enter Form Title' required="true"></input><br><br>
		<input type='text' id='desc' name="desc" placeholder='Enter Form Description'></input><br>
		<table id="myTable" border=5px align="center">
	        <th>Field Name</th>
	        <th>Field Type</th>
	        <th>Field Width</th>
	        <th>Add</th>
	        <tr>
	            <td><input type="text" id="field1" name="field1" placeholder="Enter field name" required="true" /></td>
	            <td><select id = 'myList1' name="myList1"><option value = 'VARCHAR'>VARCHAR</option><option value = 'INTEGER'>INTEGER</option></select></td>
	            <td><input type="text" id="len1" name="len1" placeholder="Enter field width" required="true"/></td>
	            <<td><a onclick='insertRow();' id='add'><i class='fas fa-plus-square'></i></a></td>
	        </tr>
		</table>
		<script type="text/javascript" id="js1">
			index=1;
			document.cookie="index="+index;
			function insertRow(){
				index++;
			  	var array=['VARCHAR','INTEGER'];
		      	var table=document.getElementById("myTable");
		            var row=table.insertRow(table.rows.length);
		            var cell1=row.insertCell(0);
		            var t1=document.createElement("input");
		                t1.id = "field"+index;
						t1.name= "field"+index;
						t1.placeholder="Enter field name";
						t1.required="true";
		                cell1.appendChild(t1);
		            var cell2=row.insertCell(1);
		            var t2=document.createElement("select");
		                t2.id = "myList"+index;
		                t2.name ="myList"+index;
		                for (var i = 0; i < array.length; i++) {
						    var option = document.createElement("option");
						    option.value = array[i];
						    option.text = array[i];
						    t2.appendChild(option);
						}
						cell2.appendChild(t2);
		            var cell3=row.insertCell(2);
		            var t3=document.createElement("input");
		                t3.id = "len"+index;
						t3.name="len"+index;
						t3.placeholder="Enter field width";
						t3.required="true";
		                cell3.appendChild(t3);
		            var cell4=row.insertCell(3);
		            document.cookie="index="+index;
				}
		</script>
	</form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>User Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<h1>Pinnacle Forms- Best Online Platform to Create Forms</h1>
	<div class="container">
		<div class="login-box">
			<div class="row">
				<div class="col-md-6 login-left">
					<h2>SIGN IN</h2>
					<form action="validate.php" method="post">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="user" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>	
						</div>
						<button type="submit" class="btn btn-primary sub">SIGN IN</button>
					</form>
				</div>
				<div class="col-md-6 login-right">
					<h2>SIGN UP</h2>
					<form action="registration.php" method="post">
						<div class="form-group">
							<label>Create a Username</label>
							<input type="text" name="user" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>	
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="cpassword" class="form-control" required>	
						</div>
						<button type="submit" class="btn btn-primary sub">SIGN UP</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
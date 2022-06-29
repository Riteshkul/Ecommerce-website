<?php
session_start();
include("includes/db.php");
?>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container">
<form class="form-login" action="" method="post">
<h2 class="form-login-heading">Admin Login</h2>
<input type="email" class="form-control" name="admin_email" placeholder="Email Address" required="">
<input type="password" class="form-control" name="admin_password" placeholder="Password" required="">
<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">Log in
</button>
<h4 class="forget-password">
<a href="forgot_pass.php">Lost Your password?Forget Password</a>
</h4>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['admin_login'])){
	$admin_mail=$_POST['admin_email'];
	$admin_pass=$_POST['admin_password'];
	$get_admin="select *from admins where admin_email='$admin_mail'
	AND admin_pass='$admin_pass'";
	$run_admin=mysqli_query($con,$get_admin);
	$count=mysqli_num_rows($run_admin);
	if($count==1){
		$_SESSION['admin_mail']=$admin_mail;
		echo"<script>alert('you are logged in')</script>";
		echo"<script>window.open('index.php?dashboard','_self')</script>";
	}
	else{
		echo"<script>alert('Email or password are incorrect')</script>";
		
	}
}
?>
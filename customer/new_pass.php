<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container">
<form class="form-login" action="" method="post">
<h2 class="form-login-heading">Password</h2>
<input type="text" class="form-control" name="new_pass" placeholder="Enter New Password" required="">
<input type="text" class="form-control" name="con_pass" placeholder="Confirm Password" required="">

<button class="btn btn-lg btn-primary btn-block" type="submit" name="change">Change
</button>
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['change'])){
	if(isset($_GET['mail'])){
	$mail=$_GET['mail'];
}
	if($_POST['new_pass']==$_POST['con_pass']){
		$new=md5($_POST['new_pass']);
$update="update customers set cus_pass='$new' 
where cus_email='$mail'";
$run=mysqli_query($con,$update);
if($run){
	echo"<script>alert('The password has been changed')</script>";
echo"<script>window.open('login.php','_self')</script>";
}
	}
}


?>

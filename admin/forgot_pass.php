<?php
include("includes/db.php");

?>
<html>
<head>
<title>Forget Password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container">
<form class="form-login" action="" method="post" enctype="multipart/form-data">
<h2 class="form-login-heading">Forget Password</h2>
<input type="email" class="form-control" name="email" placeholder="Email Address" required="">

<button class="btn btn-lg btn-primary btn-block" type="submit" name="cus_login">Submit
</button>
</form>
</div>
</body>
</html>
<?php

if(isset($_POST['cus_login'])){
	$m=$_POST['email'];
	echo"<script>window.open('otp_verification.php?mail=$m','_self')</script>";
}
?>




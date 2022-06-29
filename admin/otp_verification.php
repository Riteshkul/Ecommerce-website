<?php
include("includes/db.php");
include("includes/PHPMailerAutoload.php");
	$cus_mail=$_GET['mail'];
	$s="select *from customers where cus_email='$cus_mail'";
	$r=mysqli_query($con,$s);
	$ro=mysqli_fetch_array($r);
	$cus_id=$ro['cus_id'];
	$count=mysqli_num_rows($r);
	$otp=rand(10000,9900000);
	if($count==0){
echo"<script>alert('enter registered mail')</script>";
echo"<script>window.open('forgot_pass.php','_self')</script>";
	}
if($count==1){
		if(mail($cus_mail,"Your otp=",$otp)){
			echo"<script>alert('success')</script>";

		}
	else{
		echo"<script>alert('there is an error')</script>";

	}
}
?>

<html>
<head>
<title>OTP Verification</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container">
<form class="form-login" action="new_pass.php?mail=<?php echo $cus_mail?> " method="post">
<h2 class="form-login-heading">Verification</h2>
<input type="text" class="form-control" name="otp" placeholder="Enter Otp" required="">

<button class="btn btn-lg btn-primary btn-block" type="submit" name="verify">Verify
</button>
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['verify'])){
	$pass=$_POST['otp'];
	if($pass==$otp){
echo"<script>window.open('new_pass.php?mail=$cus_mail','_self')</script>";
	}
	else{
echo"<script>alert('Invalid otp')</script>";
	}
}





?>

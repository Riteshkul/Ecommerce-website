<div class="row">
<div class="box">
<div class="box-header">
<center><h1>Login</h1></center>
</div>
<form action="checkout.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Enter E-mail</label>
<input type="text" name="c_mail" required="" class="form-control">
</div>


<div class="form-group">
<label>Enter Password</label>
<input type="password" name="c_pass" required="" class="form-control">
</div>


<div class="text-center">
<button name="login" value="Login" class="btn btn-primary">
<i class="fa fa-sign-in"></i>Log in
</button>

</div>



</form>
<center>
<a href="customer_registeration.php"><h3>NEW?Register</h3></a>

</center>
<center>
<a href="customer/forgot_pass.php"><h3>Forgot Password</h3></a>
</center>

</div>
</div>


<?php
if(isset($_POST['login'])){
	$c_mail=$_POST['c_mail'];
	$c_pass=md5($_POST['c_pass']);
	$query="select *from customers where cus_email='$c_mail' AND cus_pass='$c_pass'";
	$run=mysqli_query($con,$query);
	$check_cus=mysqli_num_rows($run);
	if($check_cus==1){
		$_SESSION['cus_email']=$c_mail;
		echo"<script>alert('You are logged in')</script>";
		echo"<script>window.open('customer/my_account.php','_self')</script>";
	}
	else{
		echo"<script>alert('Wrong email/password')</script>";
		echo"<script>window.open('customer_registeration.php','_self')</script>";
	}
}
?>

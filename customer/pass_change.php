<form method="post">
<div class="box">
<center>
<h3>Change Password</h3> 
</center>
<div class="form-group">
<label>Enter Old Password</label>
<input type="password" name="old_password" class="form-control">
</div>

<div class="form-group">
<label>Enter New Password</label>
<input type="password" name="new_password" class="form-control">
</div>

<div class="form-group">
<label>Confirm New Password</label>
<input type="password" name="cn_password" class="form-control">
</div>
<div class="text-center">
<button class="btn btn-primary btn-lg" name="update">
Update Now

</button>
</div>
</form>
</div>

<?php
if(isset($_POST['update'])){
	$c_email=$_SESSION['cus_email'];
	$old_pass=$_POST['old_password'];
	$new_pass=$_POST['new_password'];
	$conf_pass=$_POST['cn_password'];
	$select_cus="select *from customers where cus_email='$c_email' AND cus_pass='$old_pass'";
	$run_cus=mysqli_query($con,$select_cus);
	$check_old_pass=mysqli_num_rows($run_cus);
	if($check_old_pass==0){
		echo"<script>alert('wrong password...Try again')</script>";
		exit();
	}
	if($new_pass!=$conf_pass){
		echo"<script>alert('your new password does not match with confirm password')</script>";
		exit();
	}
	$update="update customers set cus_pass='$conf_pass' where cus_email='$c_email'";
	$run_update=mysqli_query($con,$update);
	echo"<script>alert('your password is changed')</script>";
	echo"<script>window.open('my_account.php?my_order','_self')</script>";
	
	
}
?>

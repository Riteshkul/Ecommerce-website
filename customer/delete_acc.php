<div class="box">
<center>
<h1>Are You Sure You Want To Delete Your Account</h1>
</center>
<center>
<form action="" method="post">
<input type="submit" name="yes" value="yes,I am Sure" class="btn btn-danger">
<input type="submit" name="No" value="No" class="btn btn-primary">
</form>
</center>
</div>
<?php
$c_email=$_SESSION['cus_email'];
if(isset($_POST['yes'])){
	$delete_cus="delete from customers where cus_email='$c_email'";
	$run=mysqli_query($con,$delete_cus);
	if($run){
		session_destroy();
		echo"<script>alert('your account has been deleted')</script>";
		echo"<script>window.open('../index.php','_self')</script>";
	}
}
?>

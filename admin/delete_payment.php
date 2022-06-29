<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php 
if(isset($_GET['delete_payment'])){
	$delete_id=$_GET['delete_payment'];
	$delete_slide="delete from payments where payment_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_slide);
	if($run_delete){
		echo"<script>alert('the payment  has been deleted')</script>";
		echo"<script>window.open('index.php?view_payments','_self')</script>";
	}
}

?>


<?php }?>
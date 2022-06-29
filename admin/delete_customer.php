<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php 
if(isset($_GET['delete_customer'])){
	$delete_id=$_GET['delete_customer'];
	$delete_slide="delete from customers where cus_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_slide);
	if($run_delete){
		echo"<script>alert('customer has been deleted')</script>";
		echo"<script>window.open('index.php?view_customer','_self')</script>";
	}
}

?>


<?php }?>
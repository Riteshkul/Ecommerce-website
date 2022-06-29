<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php 
if(isset($_GET['delete_pending_order'])){
	$delete_id=$_GET['delete_pending_order'];
	$delete_slide="delete from pending_order where order_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_slide);
	if($run_delete){
		echo"<script>alert('the order  has been deleted')</script>";
		echo"<script>window.open('index.php?view_order','_self')</script>";
	}
}

?>


<?php }?>
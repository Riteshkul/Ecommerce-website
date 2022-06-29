<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php 
if(isset($_GET['delete_slide'])){
	$delete_id=$_GET['delete_slide'];
	$delete_slide="delete from slider where id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_slide);
	if($run_delete){
		echo"<script>alert('your slide has been deleted')</script>";
		echo"<script>window.open('index.php?view_slide','_self')</script>";
	}
}

?>


<?php }?>
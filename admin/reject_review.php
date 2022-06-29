<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php 
if(isset($_GET['reject_review'])){
	$delete_id=$_GET['reject_review'];
	$delete_review="delete from review where comment_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_review);
	if($run_delete){
		echo"<script>alert('the review has been rejected')</script>";
		echo"<script>window.open('index.php?pro_review','_self')</script>";
	}
}

?>


<?php }?>
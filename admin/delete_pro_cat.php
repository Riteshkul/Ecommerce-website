<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php 
if(isset($_GET['delete_pro_cat'])){
	$delete_id=$_GET['delete_pro_cat'];
	$delete_pro="delete from product_category where pro_cat_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_pro);
	if($run_delete){
		echo"<script>alert('the product category has been deleted')</script>";
		echo"<script>window.open('index.php?view_cat_pro','_self')</script>";
	}
}

?>


<?php }?>
<?php
include("includes/db.php");

$cus_mail=$_SESSION['cus_email'];
$get_cus="select *from customers where cus_email='$cus_mail'";
$run_cus=mysqli_query($con,$get_cus);
$row=mysqli_fetch_array($run_cus);
$cus_id=$row['cus_id'];
$cus_name=$row['cus_name'];
$cus_email=$row['cus_email'];
$cus_address=$row['cus_address'];
$cus_country=$row['cus_country'];
$cus_city=$row['cus_city'];
$cus_mobile=$row['cus_mobile'];
$cus_image=$row['cus_image'];

?>
<div class="box">
<form method="post" enctype="multipart/form-data">
<center>
<h1>Edit Your Account</h1>
</center>
<div class="form-group">
<label>Customer Name</label>
<input type="text" name="c_name" class="form-control" value="<?php echo $cus_name;?>"required="">
</div>



<div class="form-group">
<label>Customer Email</label>
<input type="text" name="c_email" class="form-control" value="<?php echo $cus_email;?>" required="">
</div>



<div class="form-group">
<label>Customer Address</label>
<input type="text" name="c_add" class="form-control" value="<?php echo $cus_address;?>" required="">
</div>

<div class="form-group">
<label>Contact Number</label>
<input type="text" name="c_no" class="form-control" value="<?php echo $cus_mobile;?>" required="">
</div>

<div class="form-group">
<label>Customer Country</label>
<input type="text" name="c_country" class="form-control" value="<?php echo $cus_country;?>" required="">
</div>

<div class="form-group">
<label>Customer City</label>
<input type="text" name="c_city" class="form-control" value="<?php echo $cus_city;?>" required="">
</div>

<div class="form-group">
<label>Customer Image</label>
<input type="file" name="image" class="form-control" required="" >
<img src="cus-img/<?php echo $cus_image;?>" class="img-responsive" height="100" width="100">
</div>


<div class="text-center">
<button class="btn btn-primary" name="update">
Update Now
</button>

</div>
</form>
</div>
<?php
if(isset($_POST['update'])){
	$c_name=$_POST['c_name'];
	$update_id=$cus_id;
	$c_email=$_POST['c_email'];
	$c_number=$_POST['c_no'];
	$c_address=$_POST['c_add'];
	$c_country=$_POST['c_country'];
	$cus_img=$_FILES['image']['name'];
	/* foreach($a as $FILES){
		echo"<script>alert($a)</script>";
	} */
	echo $_FILES['image']['name'];
	$c_city=$_POST['c_city'];
	$c_tmp_img=$_FILES['image']['tmp_name'];
	echo $update_id;
	move_uploaded_file($c_tmp_img,"cus-img/$cus_img");
	$update_cus="update customers set cus_email='$c_email',cus_name='$c_name',
cus_country='$c_country' ,cus_city='$c_city' 
,cus_mobile=$c_number,cus_address='$c_address' 
 where cus_id='$update_id'";
	$run_cust=mysqli_query($con,$update_cus);
	$update_img="update customers set cus_image='$cus_img' where cus_id='$update_id'";
	$run_img=mysqli_query($con,$update_img);
	if($run_cust and $run_img){
		echo"<script>alert('your details are updated')</script>";
		echo"<script>window.open('../logout.php','_self')</script>";
	}
}
?>
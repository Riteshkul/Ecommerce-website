<?php

include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
	
?>	

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard"></i>Dashboard/Messages
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>Send Sms
</h3>
</div>

<div class="panel-body">
<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">


<div class='form-group'>
<label class='control-label col-md-3'>Contact Number</label>
<div class='col-md-6'>
<select name='contact'>
<option value="select number">Select Number</option>
<?php
$select_con="select *from customers";
$run_con=mysqli_query($con,$select_con);
while($row=mysqli_fetch_array($run_con)){
	$cus_nm=$row['cus_name'];
	$cus_mb=$row['cus_mobile'];
echo"<option value='$cus_nm'>$cus_mb</option>";
}

?>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3">Select All</label>
<div class="col-md-1">
<input type="checkbox" name="s_contact" class="form-control">
</div>
</div>


<div class="form-group">
<label class="control-label col-md-3">Type Message Here</label>
<div class="col-md-6">
<input type="text" name="msg" class="form-control">
</div>
</div>



<div class="form-group">
<label class="control-label col-md-3"></label>
<div class="col-md-6">
<center>
<input type="submit" name="submit" value="Send Message" class="form-control btn btn-primary">
</center>
</div>
</div>



</form>
</div>
</div>
</div>
</div>


<?php
if(isset($_POST['submit'])){
	$all="";
	$msg=$_POST['msg'];
	if(isset($_POST['s_contact'])){
		$select_con="select *from customers";
		$run_con=mysqli_query($con,$select_con);
		while($row=mysqli_fetch_array($run_con)){
	$all.=$row['cus_mobile'].",";
	}}
	else{
	$all.=$_POST['contact'];
	}
	// Authorisation details.
	$username = "shreyasrangdal@gmail.com";
	$hash = "14bc0e44abddc86a0b19b6b6008b5f37762ae2e695c97db84c8e45485b2d6269";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = "$all"; // A single number or a comma-seperated list of numbers
	$message = "$msg";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
curl_close($ch);}
?>
<?php  }?>
<?php

include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<html>
<head>
<title>Insert User
</title>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init{(selector:'textarea')};</script>
<meta charset="utf-8">
<meta  name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard">Dashboard/Insert User</i>
</li>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-w"></i>Insert User</h3>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">


<div class="form-group">
<label class="col-md-3 control-label">User Name</label>
<input type="text" name="user_name" class="form-control" required="">
</div>



<div class="form-group">
<label class="col-md-3 control-label">Email</label>
<input type="text" name="email" class="form-control" required="">
</div>





<div class="form-group">
<label class="col-md-3 control-label">Password</label>
<input type="password" name="pass" class="form-control" required="">
</div>


<div class="form-group">
<label class="col-md-3 control-label">Country</label>
<input type="text" name="country" class="form-control" required="">
</div>




<div class="form-group">
<label class="col-md-3 control-label"> Image </label>
<input type="file" name="img" class="form-control" required="">
</div>



<div class="form-group">
<label class="col-md-3 control-label">job</label>
<input type="text" name="job" class="form-control" required="">
</div>



<div class="form-group">
<label class="col-md-3 control-label">Contact</label>
<input type="text" name="contact" class="form-control" required="">
</div>
<div class="form-group">
<label class="col-md-3 control-label">About</label>
<textarea name="about" class="form-control" rows="3"></textarea>

</div>
<div class="form-group">
<input type="submit" name="submit" value="Insert User" class="btn btn-primary form-control">
</div>

</form>
</div>




</div>
</div>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$admin_name=$_POST['user_name'];
	$admin_email=$_POST['email'];
	$admin_password=$_POST['pass'];
	$admin_country=$_POST['country'];
	$admin_img=$_FILES['img']['name'];
	$admin_img_tmp=$_FILES['img']['tmp_name'];
	$admin_job=$_POST['job'];
	$admin_contact=$_POST['contact'];
	$admin_about=$_POST['about'];
	move_uploaded_file($admin_img_tmp,"admin_images/$admin_img");
	
	
$insert_pro="insert into admins(admin_name,admin_email,
admin_pass,admin_image,admin_contact,admin_country,admin_job,admin_about) 
values('$admin_name','$admin_email','$admin_password','$admin_img',
'$admin_contact','$admin_country','$admin_job',
'$admin_about')";
	$run=mysqli_query($con,$insert_pro);
	if($run)
	{
		echo "<script>alert('user inserted successfully')</script>";
		echo "<script>window.open('index.php?view_users','_self')</script>";
	}
}
?>
<?php }?>
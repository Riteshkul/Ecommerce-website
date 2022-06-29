<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php
if(isset($_GET['edit_user'])){
	$edit_id=$_GET['edit_user'];
	$get_p="select *from admins where admin_id='$edit_id'";
	$run_p=mysqli_query($con,$get_p);
	$row_p=mysqli_fetch_array($run_p);
	$admin_id=$row_p['admin_id'];
	$admin_name=$row_p['admin_name'];
	$admin_image=$row_p['admin_image'];
	$admin_pass=$row_p['admin_pass'];
	$admin_email=$row_p['admin_email'];
	$admin_country=$row_p['admin_country'];
	$admin_job=$row_p['admin_job'];
	$admin_about=$row_p['admin_about'];
	$admin_contact=$row_p['admin_contact'];
	
}

?>
<html>
<head>
<title>Edit User
</title>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
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
<i class="fa fa-dashboard">Dashboard/Edit User</i>
</li>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-w"></i>Edit User</h3>
</div>
<div class="panel-body">

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<label class="col-md-3 control-label">User_Name</label>
<input type="text" name="user_name" class="form-control" required=""
value="<?php echo  $admin_name;?>">

</div>


<div class="form-group">
<label class="col-md-3 control-label">Password</label>
<input type="text" name="pass" class="form-control" required=""
value="<?php echo  $admin_pass;?>">
</div>

<div class="form-group">
<label class="col-md-3 control-label">Email</label>
<input type="text" name="email" class="form-control" required=""
value="<?php echo $admin_email;?>">
</div>



<div class="form-group">
<label class="col-md-3 control-label">Country</label>
<input type="text" name="country" class="form-control" required=""
value="<?php echo $admin_country;?>">
</div>

<div class="form-group">
<label class="col-md-3 control-label">Job</label>
<input type="text" name="job" class="form-control" required=""
value="<?php echo $admin_job;?>">
</div>

<div class="form-group">
<label class="col-md-3 control-label">Image</label>
<input type="file" name="image" class="form-control" required="">
<img src="admin_images/<?php echo $admin_image ?>" 
width="80" height="80">
</div>



<div class="form-group">
<label class="col-md-3 control-label">About</label>
<textarea name="about" class="form-control" rows="6" cols="19">
<?php echo $admin_about; ?>
</textarea>
</div>


<div class="form-group">
<input type="submit" name="update" value="Update User" class="btn btn-primary form-control">
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
if(isset($_POST['update']))
{
	$admin_name=$_POST['user_name'];
	$admin_pass=$_POST['pass'];
	$admin_email=$_POST['email'];
	$admin_country=$_POST['country'];
	$admin_job=$_POST['job'];
	$admin_about=$_POST['about'];
	
	$admin_img=$_FILES['image']['name'];
	$admin_img_tmp=$_FILES['image']['tmp_name'];
	move_uploaded_file($admin_img_tmp,"admin_images/$admin_img");
	
$update_pro="update admins set admin_name='$admin_name',admin_pass='$admin_pass'
,admin_email='$admin_email',admin_country='$admin_country',
admin_job='$admin_job',admin_about='$admin_about',
admin_image='$admin_img 'where admin_id='$edit_id'
	";
$run_update=mysqli_query($con,$update_pro);
if($run_update){
echo"<script>alert('user details has been updated sucessfully')</script>";
echo"<script>window.open('index.php?view_users','_self')</script>";
}
}
?>

<?php }?>
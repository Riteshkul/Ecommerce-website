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
<i class="fa fa-dashboard"></i>Dashboard/Insert Slide
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>Insert Slide
</h3>
</div>

<div class="panel-body">
<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">

<div class="form-group">
<label class="control-label col-md-3">Slide Name</label>
<div class="col-md-6">
<input type="text" name="slide_nm" class="form-control">
</div>
</div>



<div class="form-group">
<label class="control-label col-md-3">Slide Url</label>
<div class="col-md-6">
<input type="text" name="slide_url" class="form-control">
</div>
</div>



<div class="form-group">
<label class="control-label col-md-3">Slide Image</label>
<div class="col-md-6">
<input type="file"  name="s_img">
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3"></label>
<div class="col-md-6">
<center>
<input type="submit" name="submit" value="submit"class="form-control btn btn-primary">
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
	$slide_nm=$_POST['slide_nm'];
	$slide_url=$_POST['slide_url'];
	$slide_img=$_FILES['s_img']['name'];
	$slide_img_tmp=$_FILES['s_img']['tmp_name'];
$select="select *from slider";
$run_select=mysqli_query($con,$select);
$count=mysqli_num_rows($run_select);
if($count<4){
move_uploaded_file($slide_img_tmp,"slider/$slide_img");
	$insert_slide="insert into slider(slider_name,slider_image,slide_url) 
values('$slide_nm','$slide_img','$slide_url')";
$run_slide=mysqli_query($con,$insert_slide);
echo"<script>alert('Your new slide image has been inserted successfully')</script>";
echo"<script>window.open('index.php?view_slide','_self')</script>";
}
else{
	echo"<script>alert('You have already inserted 4 slider')</script>";
}



}

?>
<?php }?>
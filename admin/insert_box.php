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
<i class="fa fa-dashboard"></i>Dashboard/Insert Box
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>Insert Box
</h3>
</div>

<div class="panel-body">
<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">

<div class="form-group">
<label class="control-label col-md-3">Box Title</label>
<div class="col-md-6">
<input type="text" name="box_title" class="form-control">
</div>
</div>



<div class="form-group">
<label class="control-label col-md-3">Box Desc</label>
<div class="col-md-6">
<textarea name="box_desc" rows="3" class="form-control">
</textarea>
</div>
</div>





<div class="form-group">
<label class="control-label col-md-3"></label>
<div class="col-md-6">
<center>
<input type="submit" name="submit" value="Insert Box"class="form-control btn btn-primary">
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
	$box_nm=$_POST['box_title'];
	$box_desc=$_POST['box_desc'];
$insert_box="insert into boxes_section(box_title,box_desc)
values('$box_nm','$box_desc')";
$run_box=mysqli_query($con,$insert_box);
if($run_box){
echo"<script>alert('New box has been inserted')</script>";
echo"<script>window.open('index.php?view_boxes','_self')</script>";
}
}
	
?>
<?php }?>
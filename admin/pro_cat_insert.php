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
<i class="fa fa-dashboard"></i>Dashboard/Insert Product Category
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>Insert Category
</h3>
</div>

<div class="panel-body">
<form action="" class="form-horizontal" method="post">

<div class="form-group">
<label class="control-label col-md-3">Product Category Title</label>
<div class="col-md-6">
<input type="text" name="p_cat_title" class="form-control">
</div>
</div>



<div class="form-group">
<label class="control-label col-md-3">Product Category Description</label>
<div class="col-md-6">
<textarea name="p_cat_desc" class="form-control" rows="6" cols="19"></textarea>
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
	$p_cat_title=$_POST['p_cat_title'];
	$p_cat_desc=$_POST['p_cat_desc'];
$insert_p_cat="insert into product_category(p_cat_title,p_cat_desc)
values('$p_cat_title','$p_cat_desc')";
$run_p_cat=mysqli_query($con,$insert_p_cat);
if($run_p_cat){
echo"<script>alert('New product category has been inserted successfully')</script>";
echo"<script>window.open('index.php?view_cat_pro','_self')</script>";
}
}

?>
<?php }?>
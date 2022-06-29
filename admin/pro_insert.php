<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<html>
<head>
<title>Insert Product
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
<i class="fa fa-dashboard">Dashboard/Insert Product</i>
</li>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-w"></i>Insert Product</h3>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">


<div class="form-group">
<label class="col-md-3 control-label">Product Title</label>
<input type="text" name="pro_title" class="form-control" required="">
</div>


<div class="form-group">
<label class="col-md-3 control-label">Product Category</label>
<select name="product_cat" class="form-control">
<option>Select a product category</option>
<?php
$get_pro="select *from product_category";
$run=mysqli_query($con,$get_pro);
while($row=mysqli_fetch_array($run))
{
	$id=$row['pro_cat_id'];
	$title=$row['p_cat_title'];
	echo"<option value='$id' > $title</option>";
}

?>
</select>
</div>




<div class="form-group">
<label class="col-md-3 control-label">Product Image 1</label>
<input type="file" name="pro_img1" class="form-control" required="">
</div>


<div class="form-group">
<label class="col-md-3 control-label">Product Image 2</label>
<input type="file" name="pro_img2" class="form-control" required="">
</div>


<div class="form-group">
<label class="col-md-3 control-label">Product Image 3</label>
<input type="file" name="pro_img3" class="form-control" required="">
</div>


<div class="form-group">
<label class="col-md-3 control-label">Product Price</label>
<input type="text" name="pro_price" class="form-control" required="">
</div>

<div class="form-group">
<label class="col-md-3 control-label">Sale price</label>
<input type="text" name="pro_sale" class="form-control" required="">
</div>

<div class="form-group">
<label class="col-md-3 control-label">Product Keyword</label>
<input type="text" name="pro_key" class="form-control" required="">
</div>

<div class="form-group">
<label class="col-md-3 control-label">Product Label</label>
<input type="text" name="pro_label" class="form-control" required="">
</div>


<div class="form-group">
<label class="col-md-3 control-label">Product Description</label>
<textarea name="product_desc" class="form-control" rows="6" cols="19"></textarea>
</div>


<div class="form-group">
<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
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
	$product_title=$_POST['pro_title'];
	$product_category=$_POST['product_cat'];
	$pro_cat=$_POST['cat'];
	$dis_cat=$_POST['dis'];
    $dis_fol=$_POST['folder'];
	$pro_sale=$_POST['pro_sale'];
	$pro_label=$_POST['pro_label'];
	$product_price=$_POST['pro_price'];
	$product_keywords=$_POST['pro_key'];
	$product_desc=$_POST['product_desc'];
	$product_img1=$_FILES['pro_img1']['name'];
	$product_img2=$_FILES['pro_img2']['name'];
	$product_img3=$_FILES['pro_img3']['name'];
	
	$temp_name1=$_FILES['pro_img1']['tmp_name'];
	$temp_name2=$_FILES['pro_img2']['tmp_name'];
	$temp_name3=$_FILES['pro_img3']['tmp_name'];
	move_uploaded_file($temp_name1,"product_img/$product_img1");
	move_uploaded_file($temp_name2,"product_img/$product_img2");
	move_uploaded_file($temp_name3,"product_img/$product_img3");
	
$insert_pro="insert into products(pro_cat_id,date,
pro_title,pro_img1,pro_img2,pro_img3,pro_price,pro_desc,pro_keyword,
pro_label,pro_sale) 
values('$product_category','$pro_cat',NOW(),'$product_title',
'$product_img1','$product_img2','$product_img3',
'$product_price','$product_desc','$product_keywords',
'$pro_label','$pro_sale')";
	$run=mysqli_query($con,$insert_pro);
	if($run)
	{
		echo "<script>alert('product inserted successfully')</script>";
		echo "<script>window.open('index.php?view_products','_self')</script>";
	}
}
?>
<?php }?>
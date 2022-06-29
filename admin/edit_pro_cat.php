<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php
if(isset($_GET['edit_pro_cat'])){
	$edit_id=$_GET['edit_pro_cat'];
	$get_p="select *from product_category where pro_cat_id='$edit_id'";
	$run_p=mysqli_query($con,$get_p);
	$row_p=mysqli_fetch_array($run_p);
	$p_cat_id=$row_p['pro_cat_id'];
	$p_cat_title=$row_p['p_cat_title'];
	$p_cat_desc=$row_p['p_cat_desc'];
}

?>
<html>
<head>
<title>Edit Product Category
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
<i class="fa fa-dashboard">Dashboard/Edit Product Category</i>
</li>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-w"></i>Edit Product</h3>
</div>
<div class="panel-body">

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<label class="col-md-3 control-label">Product Category Title</label>
<input type="text" name="pro_title" class="form-control" required=""
value=<?php echo  $p_cat_title;?>
>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Product Category Description</label>
<textarea name="product_desc" class="form-control" rows="6" cols="19">
<?php echo $p_cat_desc ?>
</textarea>
</div>


<div class="form-group">
<input type="submit" name="update" value="Update Product Category"  class="btn btn-primary form-control">
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
	$product_cat_title=$_POST['pro_title'];
	$product_cat_desc=$_POST['product_desc'];
$update_pro="update product_category set 
p_cat_title='$product_cat_title' 
,p_cat_desc='$product_cat_desc' where pro_cat_id='$p_cat_id'
";
$run_update=mysqli_query($con,$update_pro);
if($run_update){
echo"<script>alert('Your product category has been updated sucessfully')</script>";
echo"<script>window.open('index.php?view_cat_pro','_self')</script>";
}
}
?>

<?php }?>
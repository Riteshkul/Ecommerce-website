<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php
if(isset($_GET['edit_product'])){
	$edit_id=$_GET['edit_product'];
	$get_p="select *from products where pro_id='$edit_id'";
	$run_p=mysqli_query($con,$get_p);
	$row_p=mysqli_fetch_array($run_p);
	$p_id=$row_p['pro_id'];
	$p_title=$row_p['pro_title'];
	$p_cat_id=$row_p['pro_cat_id'];
	$p_img1=$row_p['pro_img1'];
	$p_img2=$row_p['pro_img2'];
	$p_img3=$row_p['pro_img3'];
	$p_price=$row_p['pro_price'];
	$p_keyword=$row_p['pro_keyword'];
	$p_desc=$row_p['pro_desc'];
	$pro_label=$row_p['pro_label'];
	$pro_sale=$row_p['pro_sale'];
}
$get_p_cat="select *from product_category where pro_cat_id='$p_cat_id'";
$run_p_cat=mysqli_query($con,$get_p_cat);
$row_p_cat=mysqli_fetch_array($run_p_cat);
$p_cat_title=$row_p_cat['p_cat_title'];

?>
<html>
<head>
<title>Edit Product
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
<i class="fa fa-dashboard">Dashboard/Edit Product</i>
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
<label class="col-md-3 control-label">Product Title</label>
<input type="text" name="pro_title" class="form-control" required=""
value=<?php echo  $p_title;?>
>
</div>


<div class="form-group">
<label class="col-md-3 control-label">Product Category</label>
<select name="product_cat" class="form-control">
<option value="<?php echo $p_cat_id;?>"><?php echo $p_cat_title; ?></option>
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
<img src="product_img/slider/<?php echo $p_img1; ?>"  alt="<?php echo $p_title  ?>" width="100" height="100">
</div>


<div class="form-group">
<label class="col-md-3 control-label">Product Image 2</label>
<input type="file" name="pro_img2" class="form-control" required="">
<img src="product_img/slider/<?php echo $p_img2; ?>"  alt="<?php echo $p_title  ?>" width="100" height="100">
</div>


<div class="form-group">
<label class="col-md-3 control-label">Product Image 3</label>
<input type="file" name="pro_img3" class="form-control" required="">
<img src="product_img/slider/<?php echo $p_img3; ?>" alt="<?php echo $p_title  ?>"width="100" height="100">
</div>


<div class="form-group">
<label class="col-md-3 control-label">Product Price</label>
<input type="text" name="pro_price" class="form-control" required=""
value="<?php echo $p_price;?>">
</div>

<div class="form-group">
<label class="col-md-3 control-label">Product Sale Price</label>
<input type="text" name="pro_sale" class="form-control" required=""
value="<?php echo $pro_sale;?>">
</div>



<div class="form-group">
<label class="col-md-3 control-label">Product Keyword</label>
<input type="text" name="pro_key" class="form-control" required=""
value="<?php echo $p_keyword;?>">
</div>

<div class="form-group">
<label class="col-md-3 control-label">Product Label</label>
<input type="text" name="pro_label" class="form-control" required=""
value="<?php echo $pro_label;?>">
</div>

<div class="form-group">
<label class="col-md-3 control-label">Product Description</label>
<textarea name="product_desc" class="form-control" rows="6" cols="19">
<?php echo $p_desc; ?>
</textarea>
</div>


<div class="form-group">
<input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">
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
	$product_title=$_POST['pro_title'];
	$product_category=$_POST['product_cat'];
	$product_price=$_POST['pro_price'];
	$product_keywords=$_POST['pro_key'];
	$product_desc=$_POST['product_desc'];
	$pro_label=$_POST['pro_label'];
	$pro_sale=$_POST['pro_sale'];
	$product_img1=$_FILES['pro_img1']['name'];
	$product_img2=$_FILES['pro_img2']['name'];
	$product_img3=$_FILES['pro_img3']['name'];
	
	$temp_name1=$_FILES['pro_img1']['tmp_name'];
	$temp_name2=$_FILES['pro_img2']['tmp_name'];
	$temp_name3=$_FILES['pro_img3']['tmp_name'];
	move_uploaded_file($temp_name1,"product_img/$product_img1");
	move_uploaded_file($temp_name2,"product_img/$product_img2");
	move_uploaded_file($temp_name3,"product_img/$product_img3");
	$update_pro="update products set pro_cat_id='$product_category'
	,date=NOW(),pro_title='$product_title',pro_img1='$product_img1',
	pro_img2='$product_img2',pro_img3='$product_img3',pro_price='$product_price',
	pro_desc='$product_desc',pro_keyword='$product_keywords',
pro_label='$pro_label',pro_sale='$pro_sale'	where pro_id='$p_id'
	";
$run_update=mysqli_query($con,$update_pro);
if($run_update){
echo"<script>alert('Your product has been updated sucessfully')</script>";
echo"<script>window.open('index.php?view_pro','_self')</script>";
}
}
?>

<?php }?>
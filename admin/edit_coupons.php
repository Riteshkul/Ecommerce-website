<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php
$get_cou="select *from coupons ";
$run_cou=mysqli_query($con,$get_cou);
while($row=mysqli_fetch_array($run_cou)){
	$cou_id=$row['coupon_id'];
	$pro_id=$row['product_id'];
	$cou_title=$row['coupon_title'];
	$cou_price=$row['coupon_price'];
	$cou_code=$row['coupon_code'];
	$cou_limit=$row['coupon_limit'];
	$cou_used=$row['coupon_used'];
	$select_title="select *from products where pro_id='$pro_id'";
$run_title=mysqli_query($con,$select_title);
$row_title=mysqli_fetch_array($run_title);
$title=$row_title['pro_title'];
}
?>
<html>
<head>
<title>Edit Coupons
</title>
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
<i class="fa fa-dashboard">Dashboard/Edit Coupons</i>
</li>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-w"></i>Edit Coupons</h3>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">


<div class="form-group">
<label class="col-md-3 control-label">Coupon Title</label>
<input type="text" name="cup_title" class="form-control"
 required="" value="<?php echo $cou_title ?>">
</div>

<div class="form-group">
<label class="col-md-3 control-label">Select Product</label>
<select name="pro_id" class="form-control" required="">
<option value="<?php echo $pro_id ?>"><?php echo $title  ?></option>
<?php
$select_id="select *from products";
$run_id=mysqli_query($con,$select_id);
while($row_id=mysqli_fetch_array($run_id)){
	$p_id=$row_id['pro_id'];
	$p_title=$row_id['pro_title'];
echo"<option value='$p_id'>$p_title</option>";
}
?>
</select>
</div>




<div class="form-group">
<label class="col-md-3 control-label">Coupon Price</label>
<input type="text" name="cup_price" class="form-control" 
required="" value="<?php echo $cou_price ?>">
</div>


<div class="form-group">
<label class="col-md-3 control-label">Coupon Limit</label>
<input type="number" name="cup_limit" class="form-control" 
value="1"required="">
</div>


<div class="form-group">
<label class="col-md-3 control-label" >Coupon Code</label>
<input type="text" name="cup_code" class="form-control" 
required="" value="<?php echo $cou_code ?>">
</div>





<div class="form-group">
<input type="submit" name="submit" value="Update Coupon" class="btn btn-primary form-control">
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
	$cou_title=$_POST['cup_title'];
	$cou_code=$_POST['cup_code'];
	$cou_limit=$_POST['cup_limit'];
	$cou_price=$_POST['cup_price'];
	$pro_id=$_POST['pro_id'];
$update_cou="update coupons set product_id='$pro_id',coupon_title='$cou_title',
coupon_price='$cou_price',coupon_code='$cou_code',coupon_limit='$cou_limit'
where coupon_id='$cou_id'";
$run_cou=mysqli_query($con,$update_cou);
if($run_cou){
echo"<script>alert('the coupon has been updated successfully')</script>";
echo"<script>window.open('index.php?view_coupons','_self')</script>";
}

}
?>
<?php }?>
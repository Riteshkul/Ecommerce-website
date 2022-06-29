<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<html>
<head>
<title>Insert Coupons
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
<i class="fa fa-dashboard">Dashboard/Insert Coupons</i>
</li>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-w"></i>Insert Coupons</h3>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">




<div class="form-group">
<label class="col-md-3 control-label">Select Product</label>
<select name="pro_id" class="form-control" required="">
<option value="select a product for coupon">select a product for coupon</option>
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
<input type="text" name="cup_price" class="form-control" required="">
</div>


<div class="form-group">
<label class="col-md-3 control-label">Coupon Limit</label>
<input type="number" name="cup_limit" class="form-control" 
value="1"required="">
</div>


<div class="form-group">
<label class="col-md-3 control-label" >Coupon Code</label>
<input type="text" name="cup_code" class="form-control" required="">
</div>





<div class="form-group">
<input type="submit" name="submit" value="Insert Coupon" class="btn btn-primary form-control">
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

	$cou_code=$_POST['cup_code'];
	$cou_limit=$_POST['cup_limit'];
	$cou_price=$_POST['cup_price'];
	$pro_id=$_POST['pro_id'];
	$cou_used=0;
$select_cup="select *from coupons where product_id='pro_id'
or coupon_code='$cou_code'";
$run_cup=mysqli_query($con,$select_cup);
$check_cup=mysqli_num_rows($run_cup);
if($check_cup==1){
echo"<script>alert('Coupon code/product already added.choose another product/coupon code')</script>";
}
else{
$insert_cupo="insert into coupons(product_id,coupon_price,coupon_code,coupon_limit,coupon_used)
values('$pro_id','$cou_price','$cou_code','$cou_limit','$cou_used')";
$run_cupo=mysqli_query($con,$insert_cupo);
if($run_cupo){
echo"<script>alert('coupon has been inserted sucessfully')</script>";
echo"<script>window.open('index.php?view_coupons','_self')</script>";
}
}

}
?>
<?php }?>
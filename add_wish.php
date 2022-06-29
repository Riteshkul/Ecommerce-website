<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
if(isset($_GET['pro_id'])){
	if(isset($_SESSION['cus_email'])){
	$mail=$_SESSION['cus_email'];
	}
	else{
echo"<script>alert('please login')</script>";
echo"<script>window.open('checkout.php','_self')</script>";
}
	$id=$_GET['pro_id'];
$select_wishlist="select *from my_wishlist where pro_id='$id'";
$run_wishlist=mysqli_query($con,$select_wishlist);
$count_wishlist=mysqli_num_rows($run_wishlist);
if($count_wishlist>0){
echo"<script>alert('this product is already added to wishlist')</script>";
echo"<script>window.open('customer/my_account.php?my_wishlist','_self')</script>";
}

else{

$select_c="select *from customers where cus_email='$mail'";
$run_c=mysqli_query($con,$select_c);
$row_c=mysqli_fetch_array($run_c);
$c_id=$row_c['cus_id'];
$se="select *from products where pro_id='$id'";
$ru=mysqli_query($con,$se);
$ro=mysqli_fetch_array($ru);
	$pro_title=$ro['pro_title'];
$pro_label=$ro['pro_label'];
$pro_sale_price=$ro['pro_sale'];
$price_pro=$ro['pro_price'];
if($ro['pro_label']=="sale"){
	$price=$pro_sale_price;
}

	$price=$price_pro;

	$wish_id=$id;
	$wish_img=$ro['pro_img1'];
	$ip_add=getUserIp();
$insert_w="insert into my_wishlist(cus_id,cus_email,ip_add,pro_img,pro_id,pro_price,pro_title)
values('$c_id','$mail','$ip_add','$wish_img','$wish_id','$price','$pro_title')";
$run_w=mysqli_query($con,$insert_w);
if($run_w){
echo"<script>alert('product added to wishlist')</script>";
echo"<script>window.open('customer/my_account.php?my_wishlist','_self')</script>";
}
	
}
}

?>

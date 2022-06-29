<?php
session_start();
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
	$admin_session=$_SESSION['admin_mail'];
	$get_admin="select *from admins where admin_email='$admin_session'";
	$run_admin=mysqli_query($con,$get_admin);
	$row_admin=mysqli_fetch_array($run_admin);
	$admin_id=$row_admin['admin_id'];
	$admin_name=$row_admin['admin_name'];
	$admin_email=$row_admin['admin_email'];
	$admin_image=$row_admin['admin_image'];
	$admin_about=$row_admin['admin_about'];
	$admin_job=$row_admin['admin_job'];
	$admin_country=$row_admin['admin_country'];
	$admin_contact=$row_admin['admin_contact'];
	
	
	
	
	
	
	
	
	
	$get_products="select *from products";
	$run_products=mysqli_query($con,$get_products);
	$count_products=mysqli_num_rows($run_products);
	$get_customers="select *from customers";
	$run_customers=mysqli_query($con,$get_customers);
	$count_customers=mysqli_num_rows($run_customers);
	$get_pro_cat="select *from product_category";
	$run_pro_cat=mysqli_query($con,$get_pro_cat);
	$count_pro_cat=mysqli_num_rows($run_pro_cat);
	$get_orders="select *from pending_order where status='pending'";
	$run_orders=mysqli_query($con,$get_orders);
	$count_orders=mysqli_num_rows($run_orders);
	

?>
<html>
<head>
<title></title>
<meta charset="utf-8">
<meta  name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
<div id="wrapper">
<?php
include 'includes/sidebar.php';
?>
<div id="page-wrapper">
<div class="container-fluid">
<?php
if(isset($_GET['dashboard'])){
	include ("dashboard.php");
}
if(isset($_GET['pro_insert'])){
	include ("pro_insert.php");
}
if(isset($_GET['view_pro'],$_GET['view_pro,page'])){
	$p=$_GET['page'];
		include ("view_product.php?page=$p");

}
if(isset($_GET['view_pro'])){
		include ("view_product.php");
}


if(isset($_GET['delete_product'])){
	include ("delete_product.php");
}
if(isset($_GET['edit_product'])){
	include ("edit_product.php");
}
if(isset($_GET['pro_cat_insert'])){
	include ("pro_cat_insert.php");
}
if(isset($_GET['view_cat_pro'])){
	include ("view_cat_pro.php");
}

if(isset($_GET['delete_pro_cat'])){
	include ("delete_pro_cat.php");
}

if(isset($_GET['edit_pro_cat'])){
	include ("edit_pro_cat.php");
}



if(isset($_GET['insert_slide'])){
	include ("insert_slide.php");
}

if(isset($_GET['view_slide'])){
	include ("view_slide.php");
}

if(isset($_GET['delete_slide'])){
	include ("delete_slide.php");
}

if(isset($_GET['edit_slide'])){
	include ("edit_slide.php");
}

if(isset($_GET['view_customer'])){
	include ("view_customer.php");
}

if(isset($_GET['delete_customer'])){
	include ("delete_customer.php");
}

if(isset($_GET['view_pending_order'])){
	include ("view_pending_orders.php");
}

if(isset($_GET['delete_pending_order'])){
	include ("delete_pending_order.php");
}


if(isset($_GET['view_complete_order'])){
	include ("view_complete_order.php");
}

if(isset($_GET['delete_complete_order'])){
	include ("delete_complete_order.php");
}


if(isset($_GET['view_paytm_payments'])){
	include ("view_paytm_payments.php");
}

if(isset($_GET['delete_paytm_payments'])){
	include ("delete_paytm_payments.php");
}


if(isset($_GET['view_payments'])){
	include ("view_payments.php");
}

if(isset($_GET['delete_payment'])){
	include ("delete_payment.php");
}

if(isset($_GET['view_users'])){
	include ("view_users.php");
}

if(isset($_GET['edit_user'])){
	include ("edit_user.php");
}

if(isset($_GET['delete_user'])){
	include ("delete_user.php");
}

if(isset($_GET['insert_user'])){
	include ("insert_user.php");
}


if(isset($_GET['insert_box'])){
	include ("insert_box.php");
}

if(isset($_GET['view_boxes'])){
	include ("view_boxes.php");
}

if(isset($_GET['delete_box'])){
	include ("delete_box.php");
}

if(isset($_GET['edit_box'])){
	include ("edit_box.php");
}



if(isset($_GET['insert_coupons'])){
	include ("insert_coupons.php");
}

if(isset($_GET['view_coupons'])){
	include ("view_coupons.php");
}

if(isset($_GET['delete_coupons'])){
	include ("delete_coupons.php");
}

if(isset($_GET['edit_coupons'])){
	include ("edit_coupons.php");
}

if(isset($_GET['pro_review'])){
	include ("pro_review.php");
}


if(isset($_GET['view_pro_review'])){
	include ("view_pro_review.php");
}

if(isset($_GET['reject_review'])){
	include ("reject_review.php");
}

if(isset($_GET['send_sms'])){
	include("send_sms.php");
}


if(isset($_GET['view_visitors'])){
	include("view_geo_visitors.php");
}
?>
</div>
</div>
</div>

<?php }?>










<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
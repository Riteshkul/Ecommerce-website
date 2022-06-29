<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<html>
<head>
<title>E-COMMERCE STORE</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div id="top">
			<div class="container">
				<div class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
				<?php
				if(!isset($_SESSION['cus_email'])){
					echo"WELCOME";
				}
				else{
					echo"WELCOME","  ",$_SESSION['cus_email']," ";
				}
				?>
				</a>
				<a href="shop.php" target="_self" >
				EXCLUSIVE OFFERS 
				</a>
				</div>
				<div class="col-md-6">
				<ul class="menu">
				<li>
				<a href="customer_registeration.php">Register</a>
				</li>
				<li>
				<?php
					if(!isset($_SESSION['cus_email'])){
						echo"<a href='checkout.php','_self'>MyAccount</a>";
					}
					else
							echo"<a href='customer/my_account.php?my_order','_self'>MyAccount</a>";
					?>
				</li>
				<li>
				<a href="cart.php">Goto Cart</a>
				</li>
				<li>
				<?php 
				if(!isset($_SESSION['cus_email']))
				{
					echo"<a href='checkout.php'>Login</a>";
				}
				else{
					echo"<a href='logout.php'>Logout</a>";
				}
				?>
				
				</li>
				</ul>
			</div>
</div>
</div>
<!--header-->
<div class="navbar navbar-default" id="navbar">
<div class="container">
<div class="navbar-header">
<a class="navbar-brand home" href="index.php">
<img src="images/1.png" alt="ecom" class="hidden-xs">
<img src="images/2.png" alt="ecom" class="visible-xs">
</a>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
<span class="sr_only"></span>
<i class="fa fa-align-justify"></i>
</button>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
<span class="sr_only"></span>
<i class="fa fa-search"></i>
</button>
</div>
<div class="navbar-collapse collapse" id="navigation">
<div class="padding-nav">
<ul class="nav navbar-nav navbar-left">
<li class="active">
<a href="index.php">Home</a>
</li>
<li >
<a href="shop.php">Shop</a>
</li>
<li >
<?php
if(!isset($_SESSION['cus_email'])){
	echo"<a href='checkout.php','_self'>MyAccount</a>";
}
else
		echo"<a href='customer/my_account.php?my_order','_self'>MyAccount</a>";
?>
</li>
<li >
<a href="cart.php">Shopping Cart</a>
</li>
<li >
<a href="contactus.php">Contact Us</a>
</li>
</ul>
</div>
<a href="cart.php" class="btn btn-primary navbar-btn right">
<i class="fa fa-shopping-cart"></i>
<span><?php get_item_count();?></span>
</a>
<div class="navbar-collapse collapse right">
<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
<span class="sr-only">Toogle search</span>
<i class="fa fa-search"></i>
</button>
</div>
<div class="collapse clearfix" id="search">
<form class="navbar-form" method="post" action="result.php">
<div class="input-group">
<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
<span class="input-group-btn">
<button type="submit" value="Search" name="Search" class="btn btn-primary">
<i class="fa fa-search"></i>
</button>
</span>
</div>
</form>
</div>
</div>

</div>
</div><!--header-->


<div id="content">
<div class="container">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="home.php">Home</a></li>
<li>
Register
</li>
</ul>
</div>
<div class="col-md-3">

</div>
<!---->
<div class="col-md-6">
<div class="box">
<div class="box-header">
<center>
<h2> Customer Registration</h2>
</center>
</div>
<form action="customer_registeration.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<label> Customer Name
</label>
<input type="text" name="c_name" required="" class="form-control">
</div>
<div class="form-group">
<label>Customer Email</label>
<input type="text" name="c_email" class="form-control" required="">
</div>
<div class="form-group">
<label>Customer Password</label>
<input type="password" name="c_pass" class="form-control" required="">
</div>

<div class="form-group">
<label>Country</label>
<input type="text" name="c_country" class="form-control" required="">
</div>


<div class="form-group">
<label>City</label>
<input type="text" name="c_city" class="form-control" required="">
</div>

<div class="form-group">
<label>Contact Number</label>
<input type="text" name="c_number" class="form-control" required="">
</div>


<div class="form-group">
<label>Address</label>
<input type="text" name="c_address" class="form-control" required="">
</div>

<div class="form-group">
<label>Image</label>
<input type="file" name="c_image" class="form-control" required="">
</div>


<center>
<div class="form-group">
<button type="submit" name="submit" class="btn btn-primary">
<i class="fa fa-user-md"></i>Register
</button>
</div>
</center>


</form>



</div>
</div>

<div class="col-md-3">

</div>

</div>

<!--footer-->
<?php
include("includes/footer.php")
?>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	$cus_name=$_POST['c_name'];
	$cus_email=$_POST['c_email'];
	$cus_password=$_POST['c_pass'];
	$enc_pass=md5($cus_password);
	
	$cus_country=$_POST['c_country'];
	$cus_city=$_POST['c_city'];
	$cus_number=$_POST['c_number'];
	$cus_address=$_POST['c_address'];
	$cus_img=$_FILES['c_image']['name'];
	$cus_ip=getUserIp();
	$cus_tmp_img=$_FILES['c_image']['tmp_name'];
	move_uploaded_file($cus_tmp_img,"customer/cus-img/$cus_img");
	$insert="insert into customers 
(cus_email,cus_name,cus_pass,cus_country,cus_city,cus_ip ,cus_mobile ,cus_address ,cus_image )
	values('$cus_email','$cus_name','$enc_pass','$cus_country','$cus_city','$cus_ip','$cus_number','$cus_address','$cus_img')";
$run=mysqli_query($con,$insert);
$check_cart="select *from cart where ip_add='$cus_ip'";	
$run_cart=mysqli_query($con,$run_cart);
$count=mysqli_num_rows($run_cart);


if($count>0){
	$_SESSION['cus_email']=$cus_email;
	echo"<script>alert('you have been registered successfully ')</script>";
	echo"<script>window.open('confirm.php','_self')</script>";
	
}
else{
	$_SESSION['cus_email']=$cus_email;
	echo"<script>alert('you have been registered successfully ')</script>";
	echo"<script>window.open('index.php','_self')</script>";
}

}

?>


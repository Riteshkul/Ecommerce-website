<?php
session_start();
if(!isset($_SESSION['cus_email'])){
	echo"<script>window.open('../checkout.php','_self')</script>";
}
else{
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
				<a href="../shop.php" target="_self">
				EXCLUSIVE OFFERS 
				</a>
				</div>
				<div class="col-md-6">
				<ul class="menu">
				<li>
				<a href="../customer_registeration.php">Register</a>
				</li>
				<li>
								<?php 
				if(!isset($_SESSION['cus_email']))
				{
					echo"<a href='../checkout.php'>Login</a>";
				}
				else{
					echo"<a href='../logout.php'>Logout</a>";
				}
				?>
				</li>
				<li>
				<a href="../cart.php">Goto Cart</a>
				</li>
				<li>
				<?php 
				if(!isset($_SESSION['cus_email']))
				{
					echo"<a href='../checkout.php'>Login</a>";
				}
				else{
					echo"<a href='../logout.php'>Logout</a>";
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
<a class="navbar-brand home" href="../index.php">
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
<li >
<a href="../index.php">Home</a>
</li>
<li >
<a href="../shop.php">Shop</a>
</li>
<li >
<a href="../checkout.php">My Account</a>
</li>
<li >
<a href="../cart.php">Shopping Cart</a>
</li>
<li >
<a href="../contactus.php">Contact Us</a>
</li>
</ul>
</div>
<a href="../cart.php" class="btn btn-primary navbar-btn right">
<i class="fa fa-shopping-cart"></i>
<span><?php get_item_count()?></span>
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
<li><a href="../home.php">Home</a></li>
<li>
My Account
</li>
</ul>
</div>
<div class="col-md-3">
<?php
include("includes/sidebar.php");
?>
</div>
<div class="col-md-9">
<?php
if(isset($_GET['my_order']))
{
	include("my_order.php");
}


if(isset($_GET['pay_offline']))
{
	include("pay_offline.php");
}

if(isset($_GET['change_pass']))
{
	include("pass_change.php");
}



if(isset($_GET['delete_ac']))
{
	include("delete_acc.php");
}


if(isset($_GET['my_coupons']))
{
	include("my_coupons.php");
}

if(isset($_GET['my_wishlist']))
{
	include("my_wishlist.php");
}



if(isset($_GET['edit_acc']))
{
	include("edit_act.php");
}

if(isset($_GET['cus_logout']))
{
	include("cus_logout.php");
}


?>
</div>
</div>
</div>

<?php
include("includes/footer.php")
?>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php }?>
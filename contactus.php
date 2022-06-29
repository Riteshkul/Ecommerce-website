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
				<a href="my_acc.php">My Account</a>
				</li>
				<li>
				<a href="cart.php">Goto Cart</a>
				</li>
				<li>
				<?php 
				if(!isset($_SESSION['cus_email']))
				{
					echo"<a href='confirm.php'>Login</a>";
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
<li >
<a href="index.php">Home</a>
</li>
<li >
<a href="shop.php">Shop</a>
</li>
<li >
<a href="checkout.php">My Account</a>
</li>
<li >
<a href="cart.php">Shopping Cart</a>
</li>
<li class="active">
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
Contact Us
</li>
</ul>
</div>
</div>
</div>


<div class="container">
<div class="col-md-12">
<div class="box">
<div class="box-header">
<center>
<h2>Contact Us</h2>
<p class="text-muted">If you have any questions please contact us,our customer service center is working for you 24/7</p>
</center>
</div>
<form action="contactus.php" method="post">
<div class="form-group">
<label>Name
</label>
<input type="text" name="name" required="" class="form-control">
</div>
<div class="form-group">
<label>Email</label>
<input type="text" name="email" class="form-control" required="">
</div>
<div class="form-group">
<label>Subject</label>
<input type="text" name="subject" class="form-control" required="">
</div>

<div class="form-group">
<label>Message</label>
<textarea class="form-control" name="message"></textarea>
</div>
<center>
<div class="form-group">
<button type="submit" name="submit" class="btn btn-primary">
<i class="fa fa-user-md"></i>Send Message
</button>
</div>
</center>
</form>
</div>
</div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<!--footer-->
<?php
include("includes/footer.php")
?>




<?php
if(isset($_POST['submit'])){
	$sender_nm=$_POST['name'];
	$sender_sub=$_POST['subject'];
	$sender_msg=$_POST['message'];
	$sender_mail=$_POST['email'];
	$receiver_mail="shopmi514gmail.com";
	mail($receiver_mail,$sender_nm,$sender_sub,$sender_msg,$sender_mail);
$email=$_POST['email'];
$sub="Welcome to our website";
$msg="thanks for sending email";
$from="shopmi514@gmail.com";
mail($email,$sub,$msg,$from);
echo"<h2 align='center'>Your mail sent</h2>";
}
?>

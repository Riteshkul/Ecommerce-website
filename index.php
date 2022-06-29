<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<html>
<head>
<title>E-COMMERCE STORE</title>
<meta charset="utf-8">
<meta  name="viewport" content="width=device-width,initial-scale=1">
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
						else{
								echo"<a href='customer/my_account.php?my_order','_self'>MyAccount</a>";
						}
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
<span class="sr-only"></span>
<i class="fa fa-align-justify"></i>
</button>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
<span class="sr-only"></span>
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

<div class="container" id="slider">
<div class="col-md-12">
<div class="carousel slide" id="myCarousel" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="myCarousel" data-slide-to="0" class="active"></li>
<li data-target="myCarousel" data-slide-to="1" ></li>
<li data-target="myCarousel" data-slide-to="2" ></li>
<li data-target="myCarousel" data-slide-to="3" ></li>
</ol>
<div class="carousel-inner"><!--slider-->
<?php
$get_slider="select * from slider LIMIT 0,1";
$run=mysqli_query($con,$get_slider);
while($row=mysqli_fetch_array($run)){
	$slider_name=$row['slider_name'];
	$slider_img=$row['slider_image'];
	$slide_url=$row['slide_url'];
echo "<div class='item active'>
<a href='$slide_url'>
<img src='admin/slider/$slider_img'>
</a>
</div>
";
}

?>
<?php
$get_slider="select * from slider LIMIT 1,3";
$run=mysqli_query($con,$get_slider);
while($row=mysqli_fetch_array($run)){
	$slider_name=$row['slider_name'];
	$slider_img=$row['slider_image'];
	$slide_url=$row['slide_url'];
echo "<div class='item'>
<a href='$slide_url'>
<img src='admin/slider/$slider_img'>
</a>
</div>
";
}
?>








</div>
<a href="#myCarousel" class="left carousel-control" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">previous</span>
</a>
<a href="#myCarousel" class="right carousel-control" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>
</div>
<div id="advantage">
<div class="container">
<div class="same-height-row">
<?php
$get_boxes="select *from boxes_section";
$run_boxes=mysqli_query($con,$get_boxes);
while($row_boxes=mysqli_fetch_array($run_boxes)){
	$box_id=$row_boxes['box_id'];
	$box_title=$row_boxes['box_title'];
	$box_desc=$row_boxes['box_desc'];

?>
<div class="col-sm-4">
<div class="box same-height">
<div class="icon">
<i class="fa fa-heart" ></i>
</div>
<h3><a href="#"><?php echo $box_title ?></a></h3>
<p><?php echo $box_desc ?></p>
</div>
</div>
<?php }?>


</div>
</div>
</div>


<div id="hot">
<div class="box">
<div class="container">
<div class="col-md-12">
<h2>Latest this week</h2>
</div>
</div>
</div>
</div>

<!--products-->
<div id="content" class="container">
<div class="row">
<?php
visitors();
getpro();
?>

</div>
</div>

<!--footer-->
<?php
include("includes/footer.php")
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
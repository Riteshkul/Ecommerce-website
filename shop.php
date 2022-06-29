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
<li class="active">
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
Shop
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
if(!isset($_GET['p_cat']))
{
	if(!isset($_GET['cat_id']))
	{
		echo"<div class='box'>
		<h1>Shop</h1>
		<p>If you want good quality products in cheap cost so please visit your site</p>
		</div>";
	}
}
?>

<div class="row">
<?php
if(!isset($_GET['query']))
{	
if(!isset($_GET['p_cat']))
{
	if(!isset($_GET['cat_id']))
	{
		$per_page=6;
		if(isset($_GET['page']))
		{
			$page=$_GET['page'];
			
		}
		else
		{
			$page=1;
		}
		$start_from=($page-1)*$per_page;
		$get_pro="select *from products order by 1 ASC LIMIT $start_from,$per_page";
		$run=mysqli_query($con,$get_pro);
		while($row=mysqli_fetch_array($run)){
			$pro_id=$row['pro_id'];
			$pro_title=$row['pro_title'];
			$pro_price=$row['pro_price'];
			$pro_img=$row['pro_img1'];
			$pro_label=$row['pro_label'];
		    $pro_sale=$row['pro_sale'];
	if($pro_label=="sale"){
		$pro_price="<del>  $pro_price </del>";
		$pro_sale_price="/ ₹ $pro_sale";
	}
	else{
		$pro_price="$pro_price";
		$pro_sale_price="";
	}
	if($pro_label==""){
		
	}
	else{
		$pro_label="<a href='#' class='label  $pro_label'>
		<div class='thelabel'>$pro_label
		</div>
		<div class='labelBackground'>
		</div>
		</a>";
	}
			echo"<div class='col-md-4 col-sm-6 center-responsive'>
			<div class='product'>
			<a href='details.php?pro_id=$pro_id'>
			<center>
			<img src='admin/product_img/slider/$pro_img' width='220' height='390'>
			</center>
			</a>
			<div class='text'>
			<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
			<p class='price'>₹$pro_price &nbsp; $pro_sale_price</p>
			<p class='button'>
			<a href='add_wish.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-heart'></i>Add Wishlist</a>
			<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
			
			</p>
			</div>
			</div>
						$pro_label

			</div>";
		}
		?>
</div>
<center>
<ul class="pagination">
<?php
$q="select * from products ";
$run=mysqli_query($con,$q);
$total=mysqli_num_rows($run);
$total_pages=ceil($total/$per_page);
echo"<li><a href='shop.php?page=1'>".'First page'."</a></li>";
for($i=1;$i<=$total_pages;$i++)
{
echo"<li><a href='shop.php?page=".$i."'>".$i."</a></li>";	
}
echo"<li><a href='shop.php?page=$total_pages'>".'Last page'."</a></li>";

}	
}




}
res();
get_pro();
?>
</ul>
</center>


</div>
</div>
</div>









<!--footer-->
<?php
include("includes/footer.php")
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
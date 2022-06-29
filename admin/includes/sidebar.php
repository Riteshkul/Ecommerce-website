<?php
include("includes/db.php");
if(isset($_SESSION['admin_mail'])){
	$admin_email=$_SESSION['admin_mail'];
	$select="select admin_name from admins where admin_email='$admin_email'";
	$run=mysqli_query($con,$select);
	$row=mysqli_fetch_array($run);
	$name=$row['admin_name'];
}
?>

<nav class="navbar navbar-inverse navbar-fixed-top"><!--nav start-->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<span class="sr-only">Toogle Navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>

</button>
<a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
</div>
<ul class="nav navbar-right top-nav"><!--nav navbar-right top-nav start-->
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-user"></i><?php echo $name?>
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li>
<a href="index.php?user_profile=<?php echo $admin_id?>">
<i class="fa fa-fw fa-user"></i>Profile
</a>
</li>

<li>
<a href="index.php?view_products">
<i class="fa fa-fw fa-envelope"></i>Products
<span class="badge"><?php echo $count_products?></span>
</a>
</li>



<li>
<a href="index.php?view_customer">
<i class="fa fa-fw fa-users"></i>Customer
<span class="badge"><?php echo $count_customers?></span>
</a>
</li>



<li>
<a href="index.php?pro_cat">
<i class="fa fa-fw fa-gear"></i>Product Categories
<span class="badge"><?php echo $count_pro_cat?></span>
</a>
</li>


<li class="divider"></li>
<li>
<a href="logout.php">
<i class="fa fa-fw fa-power-off"></i>Logout
</a>
</li>

</ul>
</li>
</ul>

<!--nav navbar-right top-nav end-->
<div class="collapse  navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">

<li>
<a href="index.php?dashboard">
<i class="fa fa-fw fa-dashboard"></i>Dashboard
</a>
</li>

<li>
<a href="index.php?send_sms">
<i class="fa fa-comment"></i>Send Messages
</a>
</li>

<li>
<a href="index.php?view_visitors">
<i class="fa fa-eye"></i>View Geo Visitors
</a>
</li>

<li><!--pro_start-->
<a href="#" data-toggle="collapse" data-target="#products">
<i class="fa fa-fw fa-tag"></i>Products
<i class="fa fa-fw fa-caret-down"></i>
</a>

<ul class="collapse" id="products">
<li>
<a href="index.php?pro_insert">Insert Product
</a>
</li>
<li>
<a href="index.php?view_pro">View Product
</a>
</li>
</ul>
</li><!--pro_end-->


<li>
<a href="#" data-toggle="collapse" data-target="#product_cat">
<i class="fa fa-fw fa-gear"></i>Product Categories
<i class="fa fa-fw fa-caret-down"></i>
</a>

<ul class="collapse" id="product_cat">
<li>
<a href="index.php?pro_cat_insert">Insert Product categories
</a>
</li>
<li>
<a href="index.php?view_cat_pro">View Product categories
</a>
</li>
</ul>
</li>



<li>
<a href="#" data-toggle="collapse" data-target="#slider">
<i class="fa fa-fw fa-table"></i>slider
<i class="fa fa-fw fa-caret-down"></i>
</a>

<ul class="collapse" id="slider">
<li>
<a href="index.php?insert_slide">Insert slider
</a>
</li>
<li>
<a href="index.php?view_slide">View slider
</a>
</li>
</ul>
</li>


<li>
<a href="#" data-toggle="collapse" data-target="#boxes">
<i class="fa fa-fw fa-dropbox"></i>Boxes
<i class="fa fa-fw fa-caret-down"></i>
</a>

<ul class="collapse" id="boxes">
<li>
<a href="index.php?insert_box">Insert Box
</a>
</li>
<li>
<a href="index.php?view_boxes">View Boxes
</a>
</li>
</ul>
</li>


<li>
<a href="#" data-toggle="collapse" data-target="#coupons">
<i class="fa fa-fw fa-book"></i>Coupons
<i class="fa fa-fw fa-caret-down"></i>
</a>

<ul class="collapse" id="coupons">
<li>
<a href="index.php?insert_coupons">Insert Coupons
</a>
</li>
<li>
<a href="index.php?view_coupons">View Coupons
</a>
</li>
</ul>
</li>

<li>
<a href="index.php?pro_review">
<i class="glyphicon glyphicon-bookmark"></i>Product Reviews
</a>
</li>





<li>
<a href="index.php?view_customer">
<i class="fa fa-fw fa-edit"></i>View Customer
</a>
</li>




<li>
<a href="index.php?view_pending_order">
<i class="fa fa-fw fa-list"></i>View Pending Orders
</a>
</li>

<li>
<a href="index.php?view_complete_order">
<i class="fa fa-fw fa-list"></i>View Complete Order
</a>
</li>

<li>
<a href="index.php?view_paytm_payments">
<i class="fa fa-fw fa-money"></i>View Paytm Payments
</a>
</li>




<li>
<a href="index.php?view_payments">
<i class="fa fa-fw fa-money"></i>View Payments
</a>
</li>

<li>
<a href="#" data-toggle="collapse" data-target="#users">
<i class="fa fa-fw fa-table"></i>users
<i class="fa fa-fw fa-caret-down"></i>
</a>

<ul class="collapse" id="users">
<li>
<a href="index.php?insert_user">Insert User
</a>
</li>
<li>
<a href="index.php?view_users">View User
</a>
</li>


</ul>
</li>

<li>
<a href="logout.php">
<i class="fa fa-fw fa-power-off"></i>Logout
</a>
</li>

</ul>
</div>

</nav><!--nav end-->



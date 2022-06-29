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
							echo"<a href='payment.php','_self'>MyAccount</a>";
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
<li >
<a href="shop.php">Shop</a>
</li>
<li >
<?php
if(!isset($_SESSION['cus_email'])){
	echo"<a href='checkout.php','_self'>MyAccount</a>";
}
else
		echo"<a href='payment.php','_self'>MyAccount</a>";
?>
</li>
<li class="active">
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
Cart
</li>
</ul>
</div>
</div>
</div>
<div class="row">
<div class="col-md-9" id="cart">
<div class="box">
<form action="cart.php" method="post" enctype="multipart-form-data">

<h1>Shopping Cart</h1>
<?php


	$ip_add=getUserIp();
$cart="select *from cart where ip_add='$ip_add' ";
$run_cart=mysqli_query($con,$cart);
$count=mysqli_num_rows($run_cart);


?>
<p class="text-muted">Currently you have <?php get_item_count()?></p>
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th colspan="2">product</th>
<th>Quantity</th>
<th>Unit price</th>
<th>Size</th>
<th colspan="1">Delete</th>
<th colspan="1">Sub Total</th>
</tr>
</thead>
<tbody>
<?php
$total=0;
while($row=mysqli_fetch_array($run_cart)){
	
	$pro_id=$row['p_id'];
	$pro_size=$row['size'];
	$pro_qty=$row['qty'];
	$p_price=$row['pro_price'];
	$get_from_products="select *from products where pro_id='$pro_id'";
    $run_from_products=mysqli_query($con,$get_from_products);
    while($row_from_products=mysqli_fetch_array($run_from_products)){
		$p_title=$row_from_products['pro_title'];
		$p_label=$row_from_products['pro_label'];
		$p_img1=$row_from_products['pro_img1'];
		
		$subtotal=$p_price*$pro_qty;
		$total+=$subtotal;

?>
<tr>
<td>
<img src="admin/product_img/slider/<?php echo $p_img1;?> " width="150px" height="200px">
</td>
<td><?php echo $p_title;?></td>
<td><?php echo $pro_qty;?></td>
<td>₹<?php echo $p_price;?></td>
<td><?php echo $pro_size;?></td>
<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
<td>₹<?php echo $subtotal;?></td>
</tr>
<?php }} ?>




</tbody>
<tfoot>
<tr>
<th colspan="6">Total</th>
<th colspan="2">₹<?php echo $total;?></th>
</tr>
</tfoot>
</table>
<div class="form-inline pull-right">
<div class="form-group">
<label >Coupon Code:</label>
<input type="text" name="code" class="form-control">
<input type="submit" class="btn btn-primary" value="Use Coupon"
name="apply_coupon">
</div>
</div>





</div>
<div class="box-footer">
<div class="pull-left">
<a href="shop.php" class="btn btn-default">
<i class="fa fa-chevron-left"></i>Continue Shopping
</a>
</div>
<div class="pull-right">
<button class="btn btn-default" type="sumbit" name="Update" value="Update Cart">
<i class="fa fa-refresh">Update Cart</i>

</button>
<a href="checkout.php" class="btn btn-primary">
Proceed to checkout<i class="fa fa-chevron-right"></i>
</a>
</div>
</div>
</form>
</div>
<?php
if(isset($_POST['apply_coupon'])){
	$code=$_POST['code'];
	if($code==""){
		
	}
	else{
$get_coupons="select *from coupons where coupon_code='$code'";
$run_coupons=mysqli_query($con,$get_coupons);
$check_coupons=mysqli_num_rows($run_coupons);
$update_cart="update cart set total_price='$total' 
where ip_add='$ip_add'";
$run_cart=mysqli_query($con,$update_cart);
if($check_coupons=="1"){
	$row_coupon=mysqli_fetch_array($run_coupons);
	$cou_pro_id=$row_coupon['product_id'];
	$coupon_limit=$row_coupon['coupon_limit'];
	$coupon_price=$row_coupon['coupon_price'];
	$coupon_used=$row_coupon['coupon_used'];
	if($coupon_limit==$coupon_used){
		echo"<script>alert('Your coupons are already expired')</script>";
	}
	else{
$get_cart="select *from cart where p_id='$cou_pro_id'
AND ip_add='$ip_add'";
$run_cart=mysqli_query($con,$get_cart);
$row_cart=mysqli_fetch_array($run_cart);
$un_price=$row_cart['pro_price'];
$check_cart=mysqli_num_rows($run_cart);

if($check_cart==1){
		$add_used="update coupons set coupon_used=coupon_used+1
		where coupon_code='$code'";
	$run_used=mysqli_query($con,$add_used);
$price=$un_price-$coupon_price;
echo"<script>alert($price)</script>";
	$update_Cart="update cart set pro_price='$price'
	where p_id='$cou_pro_id' AND ip_add='$ip_add'";
	$run_update_Cart=mysqli_query($con,$update_Cart);
	echo"<script>alert('Your Coupon has been applied')</script>";
	echo"<script>window.open('cart.php','_self')</script>";
	}
	else{
		echo"<script>alert('you have no items in your cart')</script>";
	}
	
	}
}
else{
	echo"<script>alert('Your coupon is not valid')</script>";
}
	}
	
}


?>
<?php
function update_cart(){
	global $con;
	if(isset($_POST['Update'])){
		foreach ($_POST['remove'] as $remove_id){
			$delete_pro="delete from cart where p_id='$remove_id' ";
			$run=mysqli_query($con,$delete_pro);
			if($run){
				echo"<script>window.open('cart.php','_self')</script>";
			}
		}
	}
}
echo @$up_cart=update_cart();
?>
<div id="row same-height-row">
<div class="col-md-3 col-sm-6">
<div class="box same-height headline">
<h3 class="text-center">You Also Like These Products</h3>
</div>
</div>
<?php
$last_pro="select *from products order by 1 DESC LIMIT 0,3";
$run_last=mysqli_query($con,$last_pro);
while($row_last=mysqli_fetch_array($run_last)){
	$pro_id=$row_last['pro_id'];
	$pro_title=$row_last['pro_title'];
	$pro_price=$row_last['pro_price'];
	$pro_img1=$row_last['pro_img1'];
	$pro_label=$row_last['pro_label'];
	$pro_sale=$row_last['pro_sale'];
	if($pro_label=="sale"){
		$pro_price="<del>  $pro_price </del>";
		$pro_sale_price="/ ₹ $pro_sale";
	}
	else{
		$pro_price=" $pro_price";
		$pro_sale_price="";
	}
	if($pro_label==""){
		
	}
	else{
		$pro_label="<a href='#' class='label $pro_label'>
		<div class='theLabel'>$pro_label
		</div>
		<div class='labelBackground'>
		</div>
		</a>";
	}
	echo"<div class='col-md-3 col-sm-6'>
	<div class='product same-height'>
	<a href='details.php?pro_id=$pro_id'>
	<img src='admin/product_img/slider/$pro_img1' width='170px' height='200px'>
	</a>
	<div class='text'>
	<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
	<p class='price'>₹$pro_price &nbsp;$pro_sale_price</p>
	</div>
	$pro_label
	</div>
	
	
	</div>";
?>

<?php  }?>

</div>
</div>
<div class="col-md-3">
<div class="box" id="order-summary">
<div class="box-header">
<h3>Order Summary</h3>
</div>
<p class="text-muted">Shipping and additional cost are calculated based on the values you have entered</p>
<div class="table-responsive">
<table class="table">
<tbody>
<tr>
<td>Order Subtotal</td>
<th>₹<?php echo $total?></th>
</tr>
<tr>
<td>Shipping and handling</td>
<td>Rs 40</td>
</tr>
<tr>
<td>Delivery Charges </td>
<td>Rs 100</td>
</tr>
<tr class="total">
<td>Total</td>
<th>₹<?php echo ($total+100+40)?></th>
</tbody>
</table>
</div>
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
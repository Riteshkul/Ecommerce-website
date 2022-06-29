<?php
session_start();
if(!isset($_SESSION['cus_email'])){
	echo"<script>window.open('../checkout.php','_self')</script>";
}
else{
	include("includes/db.php");
	include("functions/functions.php");
	if(isset($_GET['order_id'])){
		$order_id=$_GET['order_id'];
$select_pending="select *from pending_order where order_id='$order_id'";
$run_pending=mysqli_query($con,$select_pending);
$row_pending=mysqli_fetch_array($run_pending);
$order_i=$order_id;
$due_amount=$row_pending['due_amount'];
$cus_id=$row_pending['customer_id'];
$size=$row_pending['size'];
$qty=$row_pending['qty'];
$date=$row_pending['date'];
$status=$row_pending['status'];
$invoice_no=$row_pending['invoice_no'];
$pro_id=$row_pending['pro_id'];
$pro_name=$row_pending['pro_name'];
$insert_cus_order="insert into customer_order
(order_id,due_amount,customer_id,size,qty,date,status,invoice_no,pro_id,pro_name)
values('$order_i','$due_amount','$cus_id','$size','$qty','$date','$status','$invoice_no','$pro_id','$pro_name')";
$run_cus_order=mysqli_query($con,$insert_cus_order);

	}
}



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
				<a href="../shop.php" target="_self">
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
	echo"<a href='../checkout.php','_self'>MyAccount</a>";
}
else
		echo"<a href='my_account.php?my_order','_self'>MyAccount</a>";
?>
</li>
<li >
<a href="../cart.php">Shopping Cart</a>
</li>
<li >
<a href="about.php">About Us</a>
</li>
<li >
<a href="services.php">Services</a>
</li>
<li >
<a href="../contactus.php">Contact Us</a>
</li>
</ul>
</div>
<a href="cart.php" class="btn btn-primary navbar-btn right">
<i class="fa fa-shopping-cart"></i>
<span><?php get_item_count();?></span>
</a>
<div class="navbar-collapse collapse left">
<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
<span class="sr-only">Toogle search</span>
<i class="fa fa-search"></i>
</button>
</div>
<div class="collapse clearfix" id="search">
<form class="navbar-form" method="get" action="result.php">
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
</div>
<div id="content">
<div class="container">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="home.php">Home</a></li>
<li>
confirm
</li>
</ul>
</div>

<div class="col-md-3">
<?php
include("includes/sidebar.php");
?>
</div>
<div class="col-md-9">
<div class="box">
<h1 align="center">Please confirm your payment</h1>
<form action="confirm.php?update_id=<?php echo $order_id;?>" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>invoice number</label>
<input type="text" class="form-control" name="invoice_number" required=""> 
</div>


<div class="form-group">
<label>Amount</label>
<input type="text" class="form-control" name="Amount" required=""> 
</div>


<div class="form-group">
<label>Select Payment Mode</label>
<select class="form-control" name="payment_mode">
<option>Bank transfer</option>
<option>Paytm</option>
<option>paypal</option>
</select> 
</div>

<div class="form-group">
<label>Transaction Number</label>
<input type="text" class="form-control" name="tr_number" required=""> 
</div>



<div class="text-center">
<button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
Confirm Payment
</button>

</div>
</form>
<?php
if(isset($_POST['confirm_payment'])){
	$update_id=$_GET['update_id'];
	$amount=$_POST['Amount'];
	$payment_mode=$_POST['payment_mode'];
	$date=$_POST['Payment_date'];
	$trans_no=$_POST['tr_number'];
	$invoice_no=$_POST['invoice_number'];
	$complete="Complete";
	$insert="insert into payments(invoice_id,amount,payment_mode,ref_no,payment_date)
	values('$invoice_no','$amount','$payment_mode','$trans_no',NOW())";
	$run_insert=mysqli_query($con,$insert);
	
	
	
	$update_co="update customer_order set status='$complete' where order_id='$update_id'";
	$run_updateco=mysqli_query($con,$update_co);
	
	$update_co="update pending_order set status='$complete' where order_id='$update_id'";
	$run_updateco=mysqli_query($con,$update_co);
	echo"<script>alert('your order has been received')</script>";
	echo"<script>window.open('my_account.php?my_order','_self')</script>";

}

?>
</div>
</div>
</div>
</div>
<?php
include("includes/footer.php")
?>

</body>
</html>

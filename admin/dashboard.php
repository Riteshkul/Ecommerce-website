<?php 
include("includes/db.php");
?>
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Dashboard
</h1>
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard">Dashboard</i>
</li>
<ol>
</div>
</div>

<div class="row">

<div class="col-lg-3 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-tasks fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $count_products?>
</div>
<div>Products</div>
</div>
</div>
</div>
<a href="index.php?view_pro">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right">
<i class="fa fa-arrow-circle-right"></i>
</span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>

<div class="col-lg-3 col-md-6">
<div class="panel panel-green">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-comments fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $count_customers?>
</div>
<div>Customers</div>
</div>
</div>
</div>
<a href="index.php?view_customer">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right">
<i class="fa fa-arrow-circle-right"></i>
</span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>


<div class="col-lg-3 col-md-6">
<div class="panel panel-orange">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-shopping-cart fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $count_pro_cat?>
</div>
<div>Product Categories</div>
</div>
</div>
</div>
<a href="index.php?view_cat_pro">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right">
<i class="fa fa-arrow-circle-right"></i>
</span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>


<div class="col-lg-3 col-md-6">
<div class="panel panel-red">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-support fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $count_orders?>
</div>
<div>orders</div>
</div>
</div>
</div>
<a href="index.php?view_pending_order">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right">
<i class="fa fa-arrow-circle-right"></i>
</span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>


</div>



<div class="row">
<div class="col-lg-8">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i>New Orders
</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered">
<thead>
<tr>
	<th>Order No:</th>
	<th>Customer Email:</th>
	<th>Invoice No:</th>
	<th>Product ID:</th>
	<th>Product Qty:</th>
	<th>Product Size:</th>
	<th>Status:</th>
</tr>
</thead>

<tbody>

<?php 
$i=0;
$get_orders="select *from pending_order order by 1 DESC LIMIT 0,4";
$run_orders=mysqli_query($con,$get_orders);
while($row_orders=mysqli_fetch_array($run_orders)){
	$order_id=$row_orders['order_id'];
	$cus_id=$row_orders['customer_id'];
	$pro_id=$row_orders['pro_id'];
	$invoice_no=$row_orders['invoice_no'];
	$size=$row_orders['size'];
	$qty=$row_orders['qty'];
	$status=$row_orders['status'];
$i++;
?>
<tr>
<td><?php echo $order_id;?></td>
<td>
<?php 
$get="select *from customers where cus_id='$cus_id'";
$run=mysqli_query($con,$get);
$row=mysqli_fetch_array($run);
$cus_email=$row['cus_email'];
echo $cus_email;
?>
</td>
<td><?php echo $invoice_no;?></td>
<td><?php echo $pro_id;?></td>
<td><?php echo $qty;?></td>
<td><?php echo $size;?></td>
<td><?php echo $status;?></td>
</tr>


<?php }?>

</tbody>
</table>
<div class="text-right">
<a href="index.php?view_pending_order">
View All Orders<i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="panel">
<div class="panel-body">
<div class="mb-md thumb-info">
<img src="admin_images/<?php echo $admin_image ?>" alt="admin-thumb-info" class="rounded img-responsive">
<div class="thumb-info-title">
<span class="thumb-info-inner"><?php echo $admin_name ?></span>
<span class="thumb-info-inner"><?php echo $admin_job ?></span>
</div>
</div>
<div class="mb-md">
<div class="widget-content-expanded">
<i class="fa fa-user"></i><span>Email:</span><?php echo $admin_email ?><br/>
<i class="fa fa-flag"></i><span>country:</span><?php echo $admin_country ?><br/>
<i class="fa fa-envelope"></i><span>contact:</span><?php echo $admin_contact ?><br/>
</div>
<hr class="dotted short" style="margin:10px 0 10px 0;">
<h5 class="text-muted">About me</h5>
<p><?php echo $admin_about ?><br/>
<a href="#">creative developers</a>
</p>
</div>
</div>
</div>
</div>


</div>
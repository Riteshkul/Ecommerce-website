<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard"></i>Dashboard/View Complete Orders

</li>
</ol>
</div>
</div>	
	
	
	
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags"></i>View Complete Orders
</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Order ID:</th>
<th>Customers ID:</th>
<th>Size:</th>
<th>Quantity:</th>
<th>Date:</th>
<th>Status:</th>
<th>Invoice No:</th>
<th>Product Id:</th>
<th>Product Name:</th>
<th>Total Amount:</th>
<th>Delete:</th>

</tr>
</thead>

<tbody>
<?php
$i=0;
$get_pro="select *from customer_order where status='complete' ";
$run_pro=mysqli_query($con,$get_pro);
while($row=mysqli_fetch_array($run_pro)){
	$order_id=$row['order_id'];
	$due_amount=$row['due_amount'];
	$cus_id=$row['customer_id'];
	$size=$row['size'];
	$qty=$row['qty'];
	$date=$row['date'];
	$status=$row['status'];
	$invoice_no=$row['invoice_no'];
	$pro_id=$row['pro_id'];
	$pro_name=$row['pro_name'];
	
	$i+=1

?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $cus_id?></td>
<td><?php echo $size?></td>

<td><?php echo $qty?></td>

<td><?php echo $date?></td>

<td><?php echo $status?></td>

<td><?php echo $invoice_no?></td>
<td>
<?php echo $pro_id?>

</td>
<td>
<?php echo $pro_name?>

</td>
<td>
<?php echo $due_amount?>

</td>
<td>
<a href="index.php?delete_complete_order=<?php echo $order_id ?>">
<i class="fa fa-trash"></i>Delete</a>
</td>
</tr>

<?php }?>
</tbody>
</table>
</div>
</div>
</div>


</div>
</div>
</div>
	
<?php }?> 
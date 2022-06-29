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
<i class="fa fa-dashboard"></i>Dashboard/View Paytm Payments

</li>
</ol>
</div>
</div>	
	
	
	
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags"></i>View Paytm Payments
</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Order ID:</th>
<th>Transaction ID:</th>
<th>Transaction Amount:</th>
<th>Customer ID:</th>
<th>Transaction Date:</th>
<th>Status:</th>
<th>Gateway Name:</th>
<th>Bank Transaction Id:</th>
<th>Bank Name:</th>
<th>Delete:</th>

</tr>
</thead>

<tbody>
<?php
$i=0;
$get_pro="select *from paytm_payment ";
$run_pro=mysqli_query($con,$get_pro);
while($row=mysqli_fetch_array($run_pro)){
	$order_id=$row['order_id'];
	$txn_id=$row['transaction_id'];
	$txn_amt=$row['transaction_amount'];
	$cus_id=$row['cus_id'];
	$txn_date=$row['transaction_date'];
	$status=$row['status'];
	$gate_nm=$row['gateway_name'];
	$bnktxn_id=$row['banktxn_id'];
	$bank_name=$row['bank_name'];
	
	$i+=1

?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $txn_id?></td>

<td><?php echo $txn_amt?></td>

<td><?php echo $cus_id?></td>

<td><?php echo $txn_date?></td>

<td><?php echo $status?></td>
<td>
<?php echo $gate_nm?>

</td>
<td>
<?php echo $bnktxn_id?>

</td>
<td>
<?php echo $bank_name?>

</td>
<td>
<a href="index.php?delete_paytm_order=<?php echo $order_id ?>">
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
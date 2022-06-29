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
<i class="fa fa-dashboard"></i>Dashboard/View  Payments

</li>
</ol>
</div>
</div>	
	
	
	
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags"></i>View  Payments
</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Payment ID:</th>
<th>Invoice ID:</th>
<th>Transaction Amount:</th>
<th>Payment Mode:</th>
<th>Reference Number:</th>
<th>Date:</th>
<th>Delete:</th>

</tr>
</thead>

<tbody>
<?php
$i=0;
$get_pro="select *from payments ";
$run_pro=mysqli_query($con,$get_pro);
while($row=mysqli_fetch_array($run_pro)){
	$payment_id=$row['payment_id'];
	$invoice_id=$row['invoice_id'];
	$amount=$row['amount'];
	$payment_mode=$row['payment_mode'];
	$ref_no=$row['ref_no'];
	$payment_date=$row['payment_date'];
	
	$i+=1

?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $invoice_id?></td>

<td><?php echo $amount?></td>

<td><?php echo $payment_mode?></td>

<td><?php echo $ref_no?></td>

<td><?php echo $payment_date?></td>
<td>
<a href="index.php?delete_payment=<?php echo $payment_id ?>">
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
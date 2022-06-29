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
<i class="fa fa-dashboard"></i>Dashboard/View Customers

</li>
</ol>
</div>
</div>	
	
	
	
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags"></i>View Customers
</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Customers ID:</th>
<th>Customers Email:</th>
<th>Customers Name:</th>
<th>Customers Image:</th>
<th>Customers Country:</th>
<th>Customers City:</th>
<th>Customers Ip:</th>
<th>Customers Mobile:</th>
<th>Customers Address:</th>
<th>Delete:</th>

</tr>
</thead>

<tbody>
<?php
$i=0;
$get_pro="select *from customers ";
$run_pro=mysqli_query($con,$get_pro);
while($row=mysqli_fetch_array($run_pro)){
	$cus_id=$row['cus_id'];
	$cus_mail=$row['cus_email'];
	$cus_name=$row['cus_name'];
	$cus_country=$row['cus_country'];
	$cus_city=$row['cus_city'];
	$cus_ip=$row['cus_ip'];
	$cus_mobile=$row['cus_mobile'];
	$cus_address=$row['cus_address'];
	$cus_image=$row['cus_image'];
	$i+=1

?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $cus_mail?></td>
<td><?php echo $cus_name?></td>
<td><img src="../customer/cus-img/<?php echo $cus_image?>" width="60" height="60"></td>

<td><?php echo $cus_country?></td>

<td><?php echo $cus_city?></td>

<td><?php echo $cus_ip?></td>

<td><?php echo $cus_mobile?></td>
<td>
<?php echo $cus_address?>

</td>
<td>
<a href="index.php?delete_customer=<?php echo $cus_id ?>">
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
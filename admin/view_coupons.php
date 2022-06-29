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
<i class="fa fa-dashboard"></i>Dashboard/View Coupons

</li>
</ol>
</div>
</div>	
	
	
	
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags"></i>View Coupons
</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Sr No</th>
<th>Coupon Price:</th>
<th>Coupon Code:</th>
<th>Coupon Limit:</th>
<th>Coupon Used:</th>
<th>Product Id:</th>
<th>Product Title</th>
<th>Coupon Edit:</th>
<th>Coupon Delete:</th>

</tr>
</thead>

<tbody>
<?php
$i=0;
$get_cou="select *from coupons ";
$run_cou=mysqli_query($con,$get_cou);
while($row=mysqli_fetch_array($run_cou)){
	$cou_id=$row['coupon_id'];
	$pro_id=$row['product_id'];
	$cou_price=$row['coupon_price'];
	$cou_code=$row['coupon_code'];
	$cou_limit=$row['coupon_limit'];
	$cou_used=$row['coupon_used'];
$select_title="select *from products where pro_id='$pro_id'";
$run_title=mysqli_query($con,$select_title);
$row_title=mysqli_fetch_array($run_title);
$title=$row_title['pro_title'];
	$i+=1

?>
<tr>
<td><?php echo $i?></td>
<td>₹<?php echo $cou_price?></td>
<td><?php echo $cou_code?></td>
<td><?php echo $cou_limit?></td>
<td><?php echo $cou_used?></td>
<td><?php echo $pro_id?></td>
<td><?php echo $title?></td>

<td><a href="index.php?delete_coupons=<?php echo $cou_id;?>">
<i class="fa fa-trash-o"></i>Delete
</a>
</td>
<td>
<a href="index.php?edit_coupons=<?php echo $cou_id;?>">
<i class="fa fa-pencil"></i>Edit
</a>

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
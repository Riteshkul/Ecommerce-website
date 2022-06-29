<?php
include("includes/db.php");
if(isset($_SESSION['cus_email'])){
	$cus_mail=$_SESSION['cus_email'];
}
$select="select *from coupons ";
$run=mysqli_query($con,$select);
$row=mysqli_fetch_array($run);
$cou_code=$row['coupon_code'];
$pro_id=$row['product_id'];
$cou_price=$row['coupon_price'];
$cou_limit=$row['coupon_limit'];
$cou_used=$row['coupon_used'];
$pro_id=$row['product_id'];
$select_pr="select *from products where pro_id='$pro_id'";
$run_pr=mysqli_query($con,$select_pr);
$row_pr=mysqli_fetch_array($run_pr);
$pro_title=$row_pr['pro_title'];
$pro_img=$row_pr['pro_img1'];
?>
<hr>
<div class="box">
<center>
<h1>My Coupons</h1>
</center>
<div class="table-responsive">
<table class="table table-hover table-bordered">

<thead>
<tr>
<th>Product Title</th>
<th>Product Image</th>
<th>Cooupon Code</th>
<th>Cooupon Price</th>
<th>Cooupon Used</th>
<th>Cooupon Limit</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $pro_title ?></td>
<td><img src="../admin/product_img/slider/<?php echo $pro_img ?>" 
width="70" height="70"></td>
<td><?php echo $cou_code ?></td>
<td><?php echo $cou_price ?></td>
<td><?php echo $cou_limit ?></td>
<td>
<?php
if($cou_used==$cou_limit){ 
echo "Expired" ;
}
else{
	echo $cou_used ;
}
	?>
</td>
</tr>
</tbody>
</table>
</div>
</div>


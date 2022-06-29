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
<i class="fa fa-dashboard"></i>Dashboard/View Reviews

</li>
</ol>
</div>
</div>	
	
	
	
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags"></i>View Reviews
</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>SR NO</th>
<th>Product ID:</th>
<th>Product Name:</th>
<th>Product Image:</th>
<th>count:</th>
<th>View:</th>

</tr>
</thead>

<tbody>
<?php
$i=0;
$get_review="select DISTINCT pro_id from review ";
$run_review=mysqli_query($con,$get_review);
while($row=mysqli_fetch_array($run_review)){
	$pro_id=$row['pro_id'];
$select_po="select *from products where pro_id='$pro_id'";
$run_po=mysqli_query($con,$select_po);
$row_po=mysqli_fetch_array($run_po);
$img=$row_po['pro_img1'];
$title=$row_po['pro_title'];
	$i+=1;
$select_r="select *from review where pro_id='$pro_id'";
$run_r=mysqli_query($con,$select_r);
$count=mysqli_num_rows($run_r);
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $pro_id?></td>
<td><?php echo $title?></td>
<td><img src="product_img/slider/<?php echo $img?>" width="60" height="60"></td>
<td><div class="huge"><?php echo $count?></td>
<td>
<a href="index.php?view_pro_review=<?php echo $pro_id ?>">
<i class="fa fa-eye"></i>View Reviews</a>
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
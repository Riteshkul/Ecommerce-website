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
<i class="fa fa-dashboard"></i>Dashboard/ Reviews

</li>
</ol>
</div>
</div>	
	
	
	
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags"></i> Reviews
</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>SR NO</th>
<th>Customer Id:</th>
<th>Customer Name:</th>
<th>Customer Image:</th>
<th>Comment:</th>
<th>IP:</th>
<th>Date:</th>
<th>Stars:</th>
<th>Reject:</th>
</tr>
</thead>

<tbody>
<?php
if(isset($_GET['view_pro_review']))
	$id=$_GET['view_pro_review'];
$i=0;
$get_review="select *from review where pro_id='$id' ";
$run_review=mysqli_query($con,$get_review);
while($row=mysqli_fetch_array($run_review)){
	$pro_id=$row['pro_id'];
	$comment_id=$row['comment_id'];
	$comment=$row['comment'];
	$stars=$row['stars'];
	$ip=$row['ip_add'];
	$date=$row['date'];
	$cus_id=$row['customer_id'];
$select_cus="select *from customers where cus_id='$cus_id'";
$run_cus=mysqli_query($con,$select_cus);
$row_cus=mysqli_fetch_array($run_cus);
$cus_img=$row_cus['cus_image'];
$cus_name=$row_cus['cus_name'];
	$i+=1;
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $cus_id?></td>
<td><?php echo $cus_name?></td>
<td><img src="../customer/cus-img/<?php echo $cus_img?>" width="60" height="60"></td>
<td><?php echo $comment?></td>
<td><?php echo $ip?></td>
<td><?php echo $date?></td>
<td><?php echo $stars?></td>

<td>
<a href="index.php?reject_review=<?php echo $comment_id ?>">
<i class="glyphicon glyphicon-alert"></i>Reject Review</a>
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
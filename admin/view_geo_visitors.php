<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
	$get_visitors="select *from geo_visitors ";
$run_visitors=mysqli_query($con,$get_visitors);
$count=mysqli_num_rows($run_visitors);
?>
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard"></i>Dashboard/View Geo Visitors

</li>
</ol>
</div>
</div>	
	
	
	
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags"></i>View Visitors
</h3>
</div>
<div class="panel-body">
<label class="control-label col-md-3">Count</label><div class="huge"><?php echo $count?></div>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Sr No:</th>
<th>User Ip:</th>
<th>User State:</th>
<th>User City:</th>
<th>User Country:</th>

</tr>
</thead>

<tbody>
<?php
$i=0;
$get_visitors="select *from geo_visitors ";
$run_visitors=mysqli_query($con,$get_visitors);
while($row=mysqli_fetch_array($run_visitors)){
	$ip_add=$row['ip_add'];
	$state=$row['state'];
	$city=$row['city'];
	$country=$row['country'];
	$i+=1

?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $ip_add?></td>
<td><?php echo $state?></td>
<td><?php echo $city?></td>
<td><?php echo $country?></td>
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
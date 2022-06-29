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
<i class="fa fa-dashboard"></i>Dashboard/View Users

</li>
</ol>
</div>
</div>	
	
	
	
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags"></i>View Users
</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>No</th>
<th>User Name:</th>
<th>User Image:</th>
<th>User Email:</th>
<th>User Country:</th>
<th>User Job:</th>
<th>User Contact:</th>
<th> Edit:</th>
<th> Delete</th>

</tr>
</thead>

<tbody>
<?php
$i=0;
$get_pro="select *from admins ";
$run_pro=mysqli_query($con,$get_pro);
while($row=mysqli_fetch_array($run_pro)){
	$admin_id=$row['admin_id'];
	$admin_name=$row['admin_name'];
	$admin_image=$row['admin_image'];
	$admin_email=$row['admin_email'];
	$admin_country=$row['admin_country'];
	$admin_job=$row['admin_job'];
	$admin_contact=$row['admin_contact'];
	

	$i+=1

?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $admin_name?></td>
<td><img src="admin_images/<?php echo $admin_image?>"width="60" height="60"></td>
<td><?php echo $admin_email?></td>
<td><?php echo $admin_country?></td>

<td><?php echo $admin_job?></td>

<td><?php echo $admin_contact?></td>
<td><a href="index.php?delete_user=<?php echo $admin_id;?>">
<i class="fa fa-trash-o"></i>Delete
</a>
</td>
<td>
<a href="index.php?edit_user=<?php echo $admin_id;?>">
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
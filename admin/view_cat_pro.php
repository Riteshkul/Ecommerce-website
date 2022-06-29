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
<i class="fa fa-dashboard"></i>Dashboard/View Product Category
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags fa-fw"></i>View Category
</h3>
</div>

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Product Category ID</th>
<th>Product Category Title</th>
<th>Product Category Desc</th>
<th>Delete Product Category</th>
<th> Edit Product Category</th>

</tr>
</thead>

<tbody>
<?php
$i=0;
$get_pro="select *from product_category ";
$run_pro=mysqli_query($con,$get_pro);
while($row=mysqli_fetch_array($run_pro)){
	$pro_cat_id=$row['pro_cat_id'];
	$pro_cat_title=$row['p_cat_title'];
	$pro_cat_desc=$row['p_cat_desc'];
	$i+=1

?>
<tr>
<td><?php echo $pro_cat_id?></td>
<td><?php echo $pro_cat_title?></td>
<td><?php echo $pro_cat_desc?></td>
<td><a href="index.php?delete_pro_cat=<?php echo $pro_cat_id;?>">
<i class="fa fa-trash-o"></i>Delete
</a>
</td>
<td>
<a href="index.php?edit_pro_cat=<?php echo $pro_cat_id;?>">
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

<?php }?>
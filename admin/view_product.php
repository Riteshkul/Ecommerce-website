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
<i class="fa fa-dashboard"></i>Dashboard/View Products

</li>
</ol>
</div>
</div>	
	
	
	
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags"></i>View Products
</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Product ID:</th>
<th>Product Title:</th>
<th>Product Image:</th>
<th>Product Price</th>
<th>Product Keyword</th>
<th>Product Sold:</th>
<th>Product Date:</th>
<th>Product Delete</th>
<th>Product Edit:</th>
</tr>
</thead>

<tbody>
<?php
$per_page=6;
		if(isset($_GET['page']))
		{
			$page=$_GET['page'];
		}
		else
		{
			$page=1;
		}
		$start_from=($page-1)*$per_page;
$i=0;
$get_pro="select *from products LIMIT $start_from,$per_page";
$run_pro=mysqli_query($con,$get_pro);
while($row=mysqli_fetch_array($run_pro)){
	$pro_id=$row['pro_id'];
	$pro_title=$row['pro_title'];
	$pro_img1=$row['pro_img1'];
	$pro_price=$row['pro_price'];
	$pro_keyword=$row['pro_keyword'];
	$pro_date=$row['date'];

	$i+=1

?>
<tr>
<td><?php echo $pro_id?></td>
<td><?php echo $pro_title?></td>
<td><img src="product_img/slider/<?php echo $pro_img1?>"width="60" height="60"></td>
<td>₹<?php echo $pro_price?></td>
<td><?php echo $pro_keyword?></td>

<td><?php
$get_sold="select *from customer_order where pro_id='$pro_id'";
$run_sold=mysqli_query($con,$get_sold);
$count=mysqli_num_rows($run_sold);
echo $count;

?></td>

<td><?php echo $pro_date?></td>
<td><a href="index.php?delete_product=<?php echo $pro_id;?>">
<i class="fa fa-trash-o"></i>Delete
</a>
</td>
<td>
<a href="index.php?edit_product=<?php echo $pro_id;?>">
<i class="fa fa-pencil"></i>Edit
</a>

</td>
</tr>

<?php }?>
</tbody>
</table>
<ul class="pagination">
<?php
$q="select * from products ";
$run=mysqli_query($con,$q);
$total=mysqli_num_rows($run);
$total_pages=ceil($total/$per_page);
echo"<li><a href='index.php?page=1'>".'First page'."</a></li>";
for($i=1;$i<=$total_pages;$i++)
{
echo"<li><a href='index.php?page=".$i."'>".$i."</a></li>";	
}
echo"<li><a href='index.php?page=$total_pages'>".'Last page'."</a></li>";
?>
</ul>
</div>
</div>
</div>


</div>
</div>
</div>
	
<?php }?> 
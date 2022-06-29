<form method="post" action="#">
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Product Image</th>
<th>Product Title</th>
<th>Product Price</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php
include("includes/db.php");
if(isset($_SESSION['cus_email'])){
$mail=$_SESSION['cus_email'];
$select="select *from my_wishlist where cus_email='$mail'";
$run=mysqli_query($con,$select);
while($row=mysqli_fetch_array($run)){
$pro_img=$row['pro_img'];
$pro_id=$row['pro_id'];
$title=$row['pro_title'];
$price=$row['pro_price'];	

?>
<tr>
<td><a href="../details.php?pro_id=<?php echo $pro_id ?>"><img src="../admin/product_img/slider/<?php echo $pro_img ?> " height="100" width="100"></a></td>
<td><?php echo $title ?></td>
<td>₹<?php echo $price ?></td>
<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
</tr>
<?php 
}} ?>
</tbody>
</table>
</div>
<div class="pull-right">
<button class="btn btn-default" type="sumbit" name="Update" value="Update Cart">
<i class="fa fa-refresh">Update Wishlist</i>
</button>
</div>
</form>
<?php
function update_wishlist(){
	global $con;
	if(isset($_POST['Update'])){
		foreach ($_POST['remove'] as $remove_id){
			$delete_pro="delete from my_wishlist where pro_id='$remove_id'";
			$run=mysqli_query($con,$delete_pro);
			if($run){
				echo"<script>alert('The product deleted successfully')</script>";
				echo"<script>window.open('my_account.php?my_wishlist','_self')</script>";
			}
		}
	}
}
echo @$up_whislist=update_wishlist();
?>




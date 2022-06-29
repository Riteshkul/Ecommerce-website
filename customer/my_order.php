<?php
include("includes/db.php");
?>
<div class="box">
<center>
<h1>My Order</h1>
</center>
<hr>
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>
Sr No
</th>
<th>
Product Name
</th>

<th>
Product Image
</th>

<th>
Due Amount
</th>

<th>
Invoice Number
</th>

<th>
Quantity
</th>


<th>
Size
</th>

<th>
Order Date
</th>

<th>
Paid/Unpaid
</th>

<th>
Status
</th>
</tr>
</thead>
<tbody>
<?php
$cus_session=$_SESSION['cus_email'];
$get_cus="select *from customers where cus_email='$cus_session'";
$run_cus=mysqli_query($con,$get_cus);
$row=mysqli_fetch_array($run_cus);
$cus_id=$row['cus_id'];
$get_order="select *from pending_order where customer_id='$cus_id'";
$run_order=mysqli_query($con,$get_order);
$i=0;
while($row_order=mysqli_fetch_array($run_order)){
$due_amount=$row_order['due_amount'];
$pro_title=$row_order['pro_name'];
$invoice_no=$row_order['invoice_no'];
$order_date=substr($row_order['date'],0,11);
$size=$row_order['size'];
$qty=$row_order['qty'];
$order_id=$row_order['order_id'];
$status=$row_order['status'];
$pro_title=$row_order['pro_name'];
$select_img="select *from products where pro_title='$pro_title'";
$run_img=mysqli_query($con,$select_img);
$row_img=mysqli_fetch_array($run_img);
$img1=$row_img['pro_img1'];
$i+=1;
if($status=='pending'){
	$status="Unpaid";
}
else{
	$status="paid";
}


?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $pro_title?></td>
<td><img src="../admin/product_img/slider/<?php echo $img1?>" width="70" height="70"></td>

<td><?php echo $due_amount?></td>
<td><?php echo $invoice_no?></td>
<td><?php echo $qty?></td>
<td><?php echo $size?></td>
<td><?php echo $order_date?></td>
<td><?php echo $status?></td>
<td><a href='confirm.php?order_id=<?php echo $order_id;?>' target='_self' class='btn btn-primary btn-sm'>confirm order</a></td>
</tr>

<?php }?>




</tbody>
</table>
</div>
</div>

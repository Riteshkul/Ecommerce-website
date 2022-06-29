<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<?php
if(isset($_GET['c_id'])){
	$cus_id=$_GET['c_id'];
}
$ip_add=getUserIp();
$status="pending";
$invoice_no=mt_rand();
$query="select *from cart where ip_add='$ip_add' ";
$run=mysqli_query($con,$query);
while($row=mysqli_fetch_array($run)){
	$pro_id=$row['p_id'];
	$pro_size=$row['size'];
	$pro_price=$row['pro_price'];
	if($pro_size==""){
	$pro_size="-";
	}
	$pro_qty=$row['qty'];
	$pro_name=$row['pro_name'];
	$pro_query="select *from products where pro_id='$pro_id'";
	$pro_run=mysqli_query($con,$pro_query);
	while($row1=mysqli_fetch_array($pro_run)){
		$sub_total=$pro_price*$pro_qty;
		
		 $pen_insert="insert into pending_order(due_amount,customer_id,size,qty,date,status,invoice_no,pro_id,pro_name)
		values('$sub_total','$cus_id','$pro_size','$pro_qty',NOW(),'$status','$invoice_no','$pro_id','$pro_name')";
		$run_insert=mysqli_query($con,$pen_insert); 
		$delete_cart="delete from cart where ip_add='$ip_add'";
		$run_cart=mysqli_query($con,$delete_cart);
		
	}
}
if($run_cart)
			echo"<script>alert('your order is processed');</script>";
		echo"<script>window.open('customer/my_account.php?my_order','_self');</script>";


?>
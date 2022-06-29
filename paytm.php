<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<?php
if(isset($_GET['c_id'])){
	$cus_id=$_GET['c_id'];
}
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
	$pro_qty=$row['qty'];
	$pro_name=$row['pro_name'];
	$pro_query="select *from products where pro_id='$pro_id'";
	$pro_run=mysqli_query($con,$pro_query);
	while($row1=mysqli_fetch_array($pro_run)){
		$sub_total=$row1['pro_price']*$pro_qty;
		
		 $pen_insert="insert into pending_order(due_amount,customer_id,size,qty,date,status,invoice_no,pro_id,pro_name)
		values('$sub_total','$cus_id','$pro_size','$pro_qty',NOW(),'$status','$invoice_no','$pro_id','$pro_name')";
		$run_insert=mysqli_query($con,$pen_insert); 
		$delete_cart="delete from cart where ip_add='$ip_add'";
		$run_cart=mysqli_query($con,$delete_cart);
		
	}
}
$query="select due_amount from pending_order where customer_id='$cus_id' AND status='pending'";
$run=mysqli_query($con,$query);
$total_amount=0;
while($row=mysqli_fetch_array($run)){
$due_amount=$row['due_amount'];
$total_amount+=$due_amount;
}


?>
<div class="image">
<img src="images/p.jpeg" class="img-responsive" width="1350" height="400">
</div>
<form method="post" action="paytm/PaytmKit/pgRedirect.php">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo "orid".rand(10000,99999999); ?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $cus_id?>"></td>
				</tr>
				<!--<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>-->
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo $total_amount?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		
	</form>
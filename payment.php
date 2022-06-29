<div class="box">
<?php
if(isset($_SESSION['cus_email'])){
$session_email=$_SESSION['cus_email'];
$select="select *from customers where cus_email='$session_email'";
$run=mysqli_query($con,$select);
$row=mysqli_fetch_array($run);
$cus_id=$row['cus_id'];
}
?>
<div class="box-header">
<center><h3>Please confirm your payment</h3></center>
</div>
<h1><a href="order.php?c_id=<?php echo $cus_id?>">pay offline</a></h1>
<h1><a href="paytm.php?c_id=<?php echo $cus_id?>">pay with paytm<img src="images/paytm.jpg" width="200" height="100"></a></h1>
</div>

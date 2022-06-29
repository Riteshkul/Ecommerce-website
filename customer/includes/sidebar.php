<?php
$session_cus=$_SESSION['cus_email'];
include("includes/db.php");
$query="select *from customers where cus_email='$session_cus'";
$run=mysqli_query($con,$query);
$row=mysqli_fetch_array($run);
$cus_name=$row['cus_name'];
$cus_image=$row['cus_image'];
?>
<div class="panel panel-default sidebar-menu">
<div class="panel-heading">
<center>
<img src="cus-img/<?php echo $cus_image?>" width="230" height="230">
</center>
<br>
<h3 align="center" class="panel-title">Name:<?php echo $cus_name;?></h3>
</div>
<div class="panel body">
<ul class="nav nav-pills nav-stacked">
<li class="<?php if(isset($_GET[my_order])){echo "active";}?> ">
<a href="my_account.php?my_order"><i class="fa fa-list"></i>My Order</a>
</li>

 <li class="<?php if(isset($_GET[pay_offline])){echo "active";}?> ">
<a href="my_account.php?pay_offline"><i class="fa fa-bolt"></i>Pay offline</a>
</li>


<li class="<?php if(isset($_GET[edit_acc])){echo "active";}?> ">
<a href="my_account.php?edit_acc"><i class="fa fa-pencil"></i>Edit Account</a>
</li>

<li class="<?php if(isset($_GET[change_pass])){echo "active";}?> ">
<a href="my_account.php?change_pass"><i class="fa fa-user"></i>Change Password</a>
</li>


<li class="<?php if(isset($_GET[my_coupons])){echo "active";}?> ">
<a href="my_account.php?my_coupons"><i class="fa fa-gift"></i>My Coupons</a>
</li>

<li class="<?php if(isset($_GET[my_wishlist])){echo "active";}?> ">
<a href="my_account.php?my_wishlist"><i class="fa fa-heart"></i>My Wishlist</a>
</li>

<li class="<?php if(isset($_GET[delete_ac])){echo "active";}?> ">
<a href="my_account.php?delete_ac"><i class="fa fa-trash-o"></i>Delete Account</a>
</li>

<li class="<?php if(isset($_GET[logout])){echo "active";}?> ">
<a href="my_account.php?cus_logout"><i class="fa fa-sign-out"></i>Logout</a>
</li>

</ul>
</div>
</div>
<?php
include('includes/db.php');
?>
<div id="footer">
<div class="container">
<div class="row">
<div class="col-md-3 col-sm-6"><!--col-md-3 and col-sm-6-->
<h4>pages</h4>
<ul>
<li><a href="cart.php">SHOPPING CART</a></li>
<li><a href="contact.php">CONTACT US</a></li>
<li><a href="shop.php">SHOP</a></li>
<li><a href="checkout.php">MY ACCOUNT</a></li>
</ul>
<hr>
<h4>User Section </h4>
<ul>
<li><a href="checkout.php">Login</a></li>
<li><a href="cus_regis.php">Register</a></li>

</ul>
<hr class="hidden-md hidden-lg hidden-sm">
</div><!--col-md-3 and col-sm-6-->
<div class="col-md-3 col-sm-6">
<h4>Top Product Categories</h4>
<ul>
<?php
$get_cat="select *from product_category";
$run=mysqli_query($con,$get_cat);
while($row=mysqli_fetch_array($run)){
	$p_cat_id=$row['pro_cat_id'];
	$p_cat_title=$row['p_cat_title'];
	echo"<li><a href='shop.php?p_cat_id=$$p_cat_id'>$p_cat_title</a></li>";
}
?>

</ul>
<hr class="hidden-md hidden-lg">
</div>
<div class="col-md-3 col-sm-6">
<h4>Where to find us</h4>
<p>
<strong>onlineshop.com</strong>
<br>mumbai
<br>solapur
<br>pune
<br>delhi
<br>rsms@gmail.com
<br>+91 9658472356 
</p>
<a href="contact.php">Goto contact us page</a>
<hr class="hidden-md hidden-lg">
</div>
<div class="col-md-3 col-sm-6">
<h4>Get the news</h4>
<form action="" method="post">
<div class="input-group">
<input type="text" name="email" class="form-control">
<span class="input-group-btn">
<input type="submit" class="btn btn-primary" value="subscribe">
</span>
</div>
</form>
<hr>
<h4>Stay in touch</h4>
<p class="social">
<a href="http://www.facebook.com"><i class="fa fa-facebook"></i>
<!--<a href="http://www.google.com"><i class="fa fa-google-plus"></i>-->
<a href="http://www.instagram.com"><i class="fa fa-instagram"></i>
<a href="http://www.twitter.com"><i class="fa fa-twitter"></i>
<a href="http://www.gmail.com"><i class="fa fa-envelope"></i>
</p>
</div>
</div>
</div>
</div>

<div id="copy-right">
<div class="container">
<div class="col-md-6">
<p class="pull-left">

&copy;2019 Mr Ritesh Kulkarni 
</p>
</div>
<div class="col-md-6">
<p class="pull-right">
Template By:
<a href="www.onlineshop.com">onlineshop.com</a>
</div>
</div>
</div>




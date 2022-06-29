<?php
$db=mysqli_connect("localhost","root","","ecom");
function getUserIp(){
 $ipaddress = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    elseif(!empty($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    elseif(!empty($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    elseif(!empty($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    elseif($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

function addCart(){
	global $db;
	$price="";
	if(isset($_GET['add_cart']))
	{
		$ip_add=getUserIp();
		$p_id=$_GET['add_cart'];
		$product_qty=$_POST['product_qty'];
		$product_size=$_POST['product_size'];
		if($product_size==""){
			$product_size="-";
		}
		$product_name=$_POST['title'];
$select_p="select *from products where pro_id='$p_id'";
$run_p=mysqli_query($db,$select_p);
$row_p=mysqli_fetch_array($run_p);
$pro_label=$row_p['pro_label'];
$pro_sale_price=$row_p['pro_sale'];
$price_pro=$row_p['pro_price'];
if($pro_label=="sale"){
	$price=$pro_sale_price;
}
else{
$price=$price_pro;
}
		$check="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		$run=mysqli_query($db,$check);
		if(mysqli_num_rows($run)>0){
			echo"<script>alert('This product is already added in cart')</script>";
			echo"<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}
		else{
			$query="insert into cart(p_id,ip_add,qty,size,pro_name,pro_price) values
			('$p_id','$ip_add','$product_qty','$product_size','$product_name','$price')";
			$run=mysqli_query($db,$query);
			echo"<script>alert('The product is  added to the cart')</script>";
			echo"<script>window.open('cart.php','_self')</script>";
		}
	}
}

/*items_count*/
function get_item_count(){
		global $db;
		$ip_add=getUserIp();
		$get_count="select *from cart where ip_add='$ip_add' ";
		$run=mysqli_query($db,$get_count);
		$row=mysqli_num_rows($run);
		echo $row,"Items in cart";
}


function getpro(){
	global $db;
	$get_product="select *from products order by 1 ASC LIMIT 0,8";
	$run=mysqli_query($db,$get_product);
	while($row=mysqli_fetch_array($run)){
		$pro_id=$row['pro_id'];
		$pro_title=$row['pro_title'];
		$pro_price=$row['pro_price'];
		$pro_img=$row['pro_img1'];
		$pro_label=$row['pro_label'];
		$pro_sale=$row['pro_sale'];
	if($pro_label=="sale"){
		$pro_price="<del>  $pro_price </del>";
		$pro_sale_price="/ ₹ $pro_sale";
	}
	else{
		$pro_price="$pro_price";
		$pro_sale_price="";
	}
	if($pro_label==""){
	}
	else{
		$pro_label="
		<a href='#' class='label $pro_label'>
		<div class='theLabel'>$pro_label
		</div>
		<div class='labelBackground'>
		</div>
		</a>";
	}
		
		
		echo"<div class='col-md-3 col-sm-6'>
	         <div class='product'>
			 <a href='details.php?pro_id=$pro_id'>
			 <center>
			 <img src='admin/product_img/slider/$pro_img' width='230' height='380'>
			 </center>
			 </a>
			 <div class='text'>
			 <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
			 <p class='price'>₹$pro_price &nbsp; $pro_sale_price</p>
			 <p class='buttons'>
			 <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
			 View Details
			 </a>
			 <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
			 <i class='fa fa-shopping-cart'>Add To Cart</i></a>
			 <a href='add_wish.php?pro_id=$pro_id' class='btn btn-primary'>
			 <i class='fa fa-heart'>Add To Wishlist</i></a>
			 </p>
			 </div>
			 $pro_label
</div>			 
		
		
		
		</div>";
	}
}

/*product_Categories*/
function getpcats(){
	global $db;
	$get_p_cat="select *from product_category";
	$run=mysqli_query($db,$get_p_cat);
	while($row=mysqli_fetch_array($run)){
		$pro_cat_id=$row['pro_cat_id'];
		$p_cat_title=$row['p_cat_title'];
	echo"<li><a href='shop.php?p_cat=$pro_cat_id'>$p_cat_title</a></li>";
	}
}




/*get pro_cat*/
function get_pro(){
	global $db;
	if(isset($_GET['p_cat'])){
		$p_cat_id=$_GET['p_cat'];
		$query="select *from product_category where pro_cat_id='$p_cat_id'";
		$run=mysqli_query($db,$query);
		$row=mysqli_fetch_array($run);
		$p_cat_title=$row['p_cat_title'];
		$p_cat_desc=$row['p_cat_desc'];
		$get_products="select *from products where pro_cat_id='$p_cat_id' order by 1 DESC";
		$run_pro=mysqli_query($db,$get_products);
		$count=mysqli_num_rows($run_pro);
		
		if($count==0){
			echo"<div class='box'>
			<h1>No product found in this product category</h1>
			</div>";
		}
		else{
			echo"<div class='box'>
			<h1>$p_cat_title</h1>
			<p>$p_cat_desc</p>
			</div>";
		}
		while($row_pro=mysqli_fetch_array($run_pro)){
			$pro_id=$row_pro['pro_id'];
			$pro_title=$row_pro['pro_title'];
			$pro_price=$row_pro['pro_price'];
			$pro_img=$row_pro['pro_img1'];
			$pro_label=$row_pro['pro_label'];
		$pro_sale=$row_pro['pro_sale'];
	if($pro_label=="sale"){
		$pro_price="<del>  $pro_price </del>";
		$pro_sale_price="/ ₹ $pro_sale";
	}
	else{
		$pro_price="$pro_price";
		$pro_sale_price="";
	}
	if($pro_label==""){
	}
	else{
		$pro_label="
		<a href='#' class='label $pro_label'>
		<div class='theLabel'>$pro_label
		</div>
		<div class='labelBackground'>
		</div>
		</a>";
	}
		
			echo"<div class='col-md-4 col-sm-6 center-responsive'>
			<div class='product'>
			<a href='details.php?pro_id=$pro_id'>
			<center>
			<img src='admin/product_img/slider/$pro_img' width='220' height='350'>
			</center>
			</a>
			<div class='text'>
			<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
			<p class='price'>₹$pro_price &nbsp; $pro_sale_price</p>
			<p class='buttons'>
            <a href='add_wish.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-heart'>Wishlist</i></a>
			<a href='details.php?p_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'>Add to Cart</i></a>
			
			</p>
			</div>
			
			
			</div>
			$pro_label
			</div>";
		}
		}
}


function res(){
	if(isset($_GET['query']))
	{
	global $db;	
	$key=$_GET['query'];
$query="select *from products where pro_keyword LIKE('%$key%')";
$run=mysqli_query($db,$query);
while($row=mysqli_fetch_array($run)){
$pro_id=$row['pro_id'];
$pro_title=$row['pro_title'];
$pro_price=$row['pro_price'];
$pro_img=$row['pro_img1'];
$pro_label=$row['pro_label'];
		$pro_sale=$row['pro_sale'];
	if($pro_label=="sale"){
		$pro_price="<del>  $pro_price </del>";
		$pro_sale_price="/ ₹ $pro_sale";
	}
	else{
		$pro_price="$pro_price";
		$pro_sale_price="";
	}
	if($pro_label==""){
	}
	else{
		$pro_label="
		<a href='#' class='label $pro_label'>
		<div class='theLabel'>$pro_label
		</div>
		<div class='labelBackground'>
		</div>
		</a>";
	}
		
		echo"<div class='col-md-4'>
	         <div class='product'>
			 <a href='details.php?pro_id=$pro_id'>
			 <center>
			 <img src='admin/product_img/slider/$pro_img' width='250' height='380'>
			 </center>
			 </a>
			 <div class='text'>
			 <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
			 <p class='price'>₹$pro_price &nbsp; $pro_sale_price</p>
			 <p class='buttons'>
			 <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
			 View Details
			 </a>
			 <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
			 <i class='fa fa-shopping-cart'>Add To Cart</i></a>
			 </p>
			 </div>
</div>			 
		
		
		$pro_label
		</div>";
}
	}
}
/*geo visitors*/
function visitors(){
	global $db;	

	$user_ip=getUserIp();
$select="select *from geo_visitors where ip_add='$user_ip'";
$run_s=mysqli_query($db,$select);
$count=mysqli_num_rows($run_s);
if($count<0){
    $geo=unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$country=$geo["geoplugin_countryName"];
$city=$geo["geoplugin_city"];
$state=$geo["geoplugin_region"];
$insert="insert into geo_visitors(ip_add,state,city,country)
values('$user_ip','$state','$city','$country')";
$run=mysqli_query($db,$insert);
}
else{
    
}


	
}

?>

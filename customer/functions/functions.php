<?php
$db=mysqli_connect("localhost","root","","ecom");
function getUserIp(){
	switch(true){
		case (!empty($_SERVER['HTTP_X_REAL_IP'])):
		return $_SERVER['HTTP_X_REAL_IP'];
		
		case (!empty($_SERVER['HTTP_CLIENT_IP'])):
		return $_SERVER['HTTP_CLIENT_IP'];
		
		case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
		
		default:return $_SERVER['REMOTE_ADDR'];
	}
} 

function addCart(){
	global $db;
	if(isset($_GET['add_cart']))
	{
		$ip_add=getUserIp();
		$p_id=$_GET['add_cart'];
		$product_qty=$_POST['product_qty'];
		$product_size=$_POST['product_size'];
		$check="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		$run=mysqli_query($db,$check);
		if(mysqli_num_rows($run)>0){
			echo"<script>alert('This product is already added in cart')</script>";
			echo"<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}
		else{
			$query="insert into cart(p_id,ip_add,qty,size) values('$p_id','$ip_add','$product_qty','$product_size')";
			$run=mysqli_query($db,$query);
			echo"<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}
	}
}

/*items_count*/
function get_item_count(){
		global $db;
		$ip_add=getUserIp();
		$get_count="select *from cart where ip_add='$ip_add'";
		$run=mysqli_query($db,$get_count);
		$row=mysqli_num_rows($run);
		echo $row,"Items in cart";
}

/*product_total_price*/
function total(){
	global $db;
	$ip_add=getUserIp();
	$total=0;
	$cart="select *from cart ip_add='$ip_add'";
	$run=mysqli_query($db,$cart);
	while($row=mysqli_fetch_array($run)){
		$pro_id=$row['p_id'];
		$pro_qty=$row['product_qty'];
		$get_price="select *from products where pro_id='$p_id'";
		$run_price=mysqli_query($db,$get_price);
		while($row_price=mysqli_fetch_array($run_price)){
			$sub_total=$row_price['pro_price']*$pro_qty;
			$total+=$sub_total;
		}
	}
	echo $total;
	
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
		$fol=$row['folder'];
		$cat=$row['cat'];
		
		echo"<div class='col-md-3 col-sm-6'>
	         <div class='product'>
			 <a href='details.php?pro_id=$pro_id'>
			 <center>
			 <img src='admin/product_img/slider/$pro_img' width='250' height='360'>
			 </center>
			 </a>
			 <div class='text'>
			 <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
			 <p class='price'>₹$pro_price</p>
			 <p class='buttons'>
			 <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
			 View Details
			 </a>
			 <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
			 <i class='fa fa-shopping-cart'>Add To Cart</i></a>
			 </p>
			 </div>
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


/*categories*/
function getcat(){
	global $db;
	$get_cat="select *from categories";
	$run=mysqli_query($db,$get_cat);
	while($row=mysqli_fetch_array($run)){
		$cat_id=$row['cat_id'];
		$cat_title=$row['cat_title'];
		echo"<li><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>";
	}
}

/*get pro_cat*/
function get_pro(){
	global $db;
	if(isset($_GET['p_cat'])){
		$p_cat_id=$_GET['p_cat'];
		$img_fol="select folder,cat from products where pro_cat_id='$p_cat_id'" ;
		$run_img=mysqli_query($db,$img_fol);
		$row_img=mysqli_fetch_array($run_img);
		$fol=$row_img['folder'];
		$cat=$row_img['cat'];
		$query="select *from product_category where pro_cat_id='$p_cat_id'";
		$run=mysqli_query($db,$query);
		$row=mysqli_fetch_array($run);
		$p_cat_title=$row['p_cat_title'];
		$p_cat_desc=$row['p_cat_desc'];
		$get_products="select *from products where pro_cat_id='$p_cat_id'";
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
			echo"<div class='col-md-4 col-sm-6 center-responsive'>
			<div class='product'>
			<a href='details.php?pro_id=$pro_id'>
			<center>
			<img src='admin/product_img/slider/$pro_img' width='300' height='350'>
			</center>
			</a>
			<div class='text'>
			<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
			<p class='price'>$pro_price</p>
			<p class='buttons'>
			<a href='details.php?p_id=$pro_id' class='btn btn-default'>View Details</a>
			<a href='details.php?p_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'>Add to Cart</i></a>
			</p>
			</div>
			
			
			</div>
			
			</div>";
		}
		}
}

/*categories*/
function cat(){
	global $db;
	if(isset($_GET['cat_id'])){
		$cat_id=$_GET['cat_id'];
		$img_fol="select folder,cat from products where cat_id='$cat_id'" ;
		$run_img=mysqli_query($db,$img_fol);
		$row_img=mysqli_fetch_array($run_img);
		$fol=$row_img['folder'];
		$cat=$row_img['cat'];
		$get_pro="select * from categories where cat_id='$cat_id'";
		$run=mysqli_query($db,$get_pro);
		$row=mysqli_fetch_array($run);
		$cat_title=$row['cat_title'];
		$cat_desc=$row['cat_desc'];
		$get_products="select *from products where cat_id='$cat_id'";
		$run_pro=mysqli_query($db,$get_products);
		$count=mysqli_num_rows($run_pro);
		if($count==0){
			echo"<div class='box'>
			<h1>No product found in this product category</h1>
			</div>";
		}
		else{
			echo"<div class='box'>
			<h1>$cat_title</h1>
			<p>$cat_desc</p>
			</div>";
		}
		while($row_pro=mysqli_fetch_array($run_pro)){
			$pro_id=$row_pro['pro_id'];
			$pro_title=$row_pro['pro_title'];
			$pro_price=$row_pro['pro_price'];
			$pro_img=$row_pro['pro_img1'];
			echo"<div class='col-md-4 col-sm-6 center-responsive'>
			<div class='product'>
			<a href='details.php?pro_id=$pro_id'>
			<img src='admin/product_img/slider/$pro_img' width='300' height='350'>
			</a>
			<div class='text'>
			<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
			<p class='price'>$pro_price</p>
			<p class='buttons'>
			<a href='details.php?p_id=$pro_id' class='btn btn-default'>View Details</a>
			<a href='details.php?p_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'>Add to Cart</i></a>
			</p>
			</div>
			
			
			</div>
			
			</div>";
		}
	}
}
?>
<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<?php
if(isset($_POST['save'])){
$rate=$_POST['ratedIndex'];
$res=$_POST['result'];
$id=$_POST['id'];
$mail=$_POST['email'];
$name=$_POST['name'];
$rate++;
$se_re="select *from review";
$ip=getUserIp();
$select_cus="select *from customers where cus_email='$mail'";
$run_cus=mysqli_query($con,$select_cus);
$row_cus=mysqli_fetch_array($run_cus);
$count=mysqli_num_rows($run_cus);
$cus_id=$row_cus['cus_id'];
if($count>0){
$insert="insert into review(pro_id,pro_name,customer_id,comment,stars,ip_add,date)
values('$id','$name','$cus_id','$res','$rate','$ip',NOW())";
$run_insert=mysqli_query($con,$insert);
if($run_insert){
echo"<script>alert('thanks for giving review')</script>";
}}

}

?>
<?php
if(isset($_SESSION['cus_email'])){
$mail=$_SESSION['cus_email'];
}

if(isset($_GET['pro_id'])){
	
	$pro_id=$_GET['pro_id'];
	$query="select *from products where pro_id='$pro_id'";
	$run=mysqli_query($con,$query);
	$row=mysqli_fetch_array($run);
	$p_id=$row['pro_cat_id'];
	$p_title=$row['pro_title'];
	$p_img1=$row['pro_img1'];
	$p_img2=$row['pro_img2'];
	$p_img3=$row['pro_img3'];
	$p_price=$row['pro_price'];
	$pro_label=$row['pro_label'];
	$pro_sale_price=$row['pro_sale'];
	$p_desc=$row['pro_desc'];
	$qu="select *from product_category where pro_cat_id='$p_id'";
	$r=mysqli_query($con,$qu);
	$rw=mysqli_fetch_array($r);
	$cat_pro_id=$rw['pro_cat_id'];
	if($cat_pro_id=="1"){
		$url=$row['url'];
	}
	$pro_title=$rw['p_cat_title'];
	
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

$tab_menu="";
$tab_content="";
$count=0;
$select_tab="select *from data ";
$run_tab=mysqli_query($con,$select_tab);
while($row_tab=mysqli_fetch_array($run_tab)){
	if($count==0){
$tab_menu.='<li class="active"><a href="#'.$row_tab['tab_id'].'" data-toggle="tab">'
.$row_tab['tab_title'].'
</a></li>';
$tab_content.='<div id="'.$row_tab['tab_id'].'" class="tab-pane fade in active">';
$tab_content.='
<p>'.$p_desc.'</p>
</div>';
	}
	else{
		$tab_menu.='<li><a href="#'.$row_tab['tab_id'].'" data-toggle="tab">'
.$row_tab['tab_title'].'
</a></li>';
$tab_content.='<div id="'.$row_tab['tab_id'].'" class="tab-pane fade">';
if($row_tab['tab_id']==2 ){
	$select_review="select *from review where pro_id='$pro_id'";
$run_review=mysqli_query($con,$select_review);
$tab_content.='<table class="table table-striped table-bordered table-hover">';
$tab_content.='<thead>
<tr>
<th>Customer Image:</th>
<th>Customer Email:</th>
<th>Review:</th>
<th>Rating:</th>
</tr>
</thead>';
while($row_review=mysqli_fetch_array($run_review)){
	$comm=$row_review['comment'];
$star=$row_review['stars'];
$cus_id=$row_review['customer_id'];
$select_cus="select *from customers where cus_id='$cus_id'";
$run_cus=mysqli_query($con,$select_cus);
$row_cus=mysqli_fetch_array($run_cus);
$cus_img=$row_cus['cus_image'];
$cus_mail=$row_cus['cus_email'];
$tab_content.='<tbody>
<tr>
<td>
<img src="customer/cus-img/'.$cus_img.'" height="70" width="70"></td>
<td>'.$cus_mail.'</td>
<td>'.$comm.'</td>
<td>'.$star.'<i class="fa fa-star"></i></td>
</tr>
</tbody>';
}$tab_content.='</table><div style="clear:both"></div></div>';}
if($row_tab['tab_id']==3){
$tab_content.='
'.'<form method="post" class="form-horizontal" >
<div class="form-group">
<input type="hidden" name="pro_id" id="p_id"  value='.$pro_id.'>
<input type="hidden"  name="pro_name" id="p_name"  value='.$p_title.'>
Email:<input type="email" name="cus_mail" id="mail"  placeholder="Enter your registered mail here "><br/>
Comment:
<textarea name="comment" id="comm" rows="1" cols="50" placeholder="write your comment here....">
</textarea><br/><br/>
Rate Here:
<i class="fa fa-star fa-2x" data-index="0"></i>
<i class="fa fa-star fa-2x" data-index="1"></i>
<i class="fa fa-star fa-2x" data-index="2"></i>
<i class="fa fa-star fa-2x" data-index="3"></i>
<i class="fa fa-star fa-2x" data-index="4"></i>
<script>
var ratedIndex=-1;
var res="",id,name="";
$(document).ready(function(){
	resetStarColors();
	if(localStorage.getItem("ratedIndex")!=null){
		setStars(parseInt(localStorage.getItem("ratedIndex")));
	}
	$(".fa-star").on("click",function(){
		
		ratedIndex=parseInt($(this).data("index"));
		localStorage.setItem("ratedIndex",ratedIndex);
		saveToTheDB();
	});
	$(".fa-star").mouseover(function(){
		resetStarColors();
		var currentIndex=parseInt($(this).data("index"));
		setStars(currentIndex);
	});
	$(".fa-star").mouseleave(function(){
		resetStarColors();
		if(ratedIndex!=-1){
			setStars(ratedIndex);
		}
	});
});
function setStars(max){
	for (var i=0;i<=max;i++){
			$(".fa-star:eq("+i+")").css("color","green");
		}
}
function resetStarColors(){
	$(".fa-star").css("color","yellow");
}


</script><br/><br/>
<button class="btn btn-primary" name="submit_r" id="sub">Submit Review
</button>
</div>
</form>
<script>
$("#sub").on("click",function(){
	res=$("#comm").val();
	idP=$("#p_id").val();
	mail=$("#mail").val();
	nameP=$("#p_name").val();
	$.ajax({
		url:"details.php",
		method:"POST",
		dataType:"json",
		data:{
			save: 1,
			result:res,
			email:mail,
			id:idP,
			name:nameP,
			ratedIndex: ratedIndex
		}, success:function(r){
			console.log("success");
		}
	});
});
</script>
</div>';

}

	
	}
	$count++;
}

?>
<html>
<head>
<title>E-COMMERCE STORE</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/style.css">
<script src="https://code.jquery.com/jquery-2.2.4.js"
integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
		crossorigin="anonymous">
</script>
</head>
<body>
<div id="top">
			<div class="container">
				<div class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
				<?php
				if(!isset($_SESSION['cus_email'])){
					echo"WELCOME";
				}
				else{
					echo"WELCOME","  ",$_SESSION['cus_email']," ";
				}
				?>
				</a>
				<a href="shop.php" target="_self">
				EXCLUSIVE OFFERS 
				</a>
				</div>
				<div class="col-md-6">
				<ul class="menu">
				<li>
				<a href="customer_registeration.php">Register</a>
				</li>
				<li>
				<?php
						if(!isset($_SESSION['cus_email'])){
							echo"<a href='checkout.php','_self'>MyAccount</a>";
						}
						else{
								echo"<a href='customer/my_account.php?my_order','_self'>MyAccount</a>";
						}
				?>
				</li>
				<li>
				<a href="cart.php">Goto Cart</a>
				</li>
				<li>
				<?php 
				if(!isset($_SESSION['cus_email']))
				{
					echo"<a href='checkout.php'>Login</a>";
				}
				else{
					echo"<a href='logout.php'>Logout</a>";
				}
				?>
				
				</li>
				</ul>
			</div>
</div>
</div>
<!--header-->
<div class="navbar navbar-default" id="navbar">
<div class="container">
<div class="navbar-header">
<a class="navbar-brand home" href="index.php">
<img src="images/1.png" alt="ecom" class="hidden-xs">
<img src="images/2.png" alt="ecom" class="visible-xs">
</a>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
<span class="sr_only"></span>
<i class="fa fa-align-justify"></i>
</button>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
<span class="sr_only"></span>
<i class="fa fa-search"></i>
</button>
</div>
<div class="navbar-collapse collapse" id="navigation">
<div class="padding-nav">
<ul class="nav navbar-nav navbar-left">
<li >
<a href="index.php">Home</a>
</li>
<li class="active">
<a href="shop.php">Shop</a>
</li>
<li >
<a href="checkout.php">My Account</a>
</li>
<li >
<a href="cart.php">Shopping Cart</a>
</li>
<li >
<a href="about.php">About Us</a>
</li>
</ul>
</div>
<a href="cart.php" class="btn btn-primary navbar-btn right">
<i class="fa fa-shopping-cart"></i>
<span><?php get_item_count();?></span>
</a>
<div class="navbar-collapse collapse right">
<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
<span class="sr-only">Toogle search</span>
<i class="fa fa-search"></i>
</button>
</div>
<div class="collapse clearfix" id="search">
<form class="navbar-form" method="post" action="result.php">
<div class="input-group">
<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
<span class="input-group-btn">
<button type="submit" value="Search" name="Search" class="btn btn-primary">
<i class="fa fa-search"></i>
</button>
</span>
</div>
</form>
</div>
</div>

</div>
</div><!--header-->


<div id="content">
<div class="container">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="home.php">Home</a></li>
<li>
Shop
</li>
<li><a href="shop.php?p_cat=<?php echo $pro_id;?>"></a>
<?php echo $pro_title ?></li>
<li><?php echo $p_title ?></li>
</ul>
</div>
<div class="col-md-3">
<?php
include("includes/sidebar.php");
?>
</div>
<div class="col-md-9">
<div class="row" id="productmain">
<div class="col-sm-6">
<div id="mainimage">
<div id="mycarousel" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
<li data-target="#mycarousel" data-slide-to="1"></li>
<li data-target="#mycarousel" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
<div class="item active">
<center>
<img src="admin/product_img/slider/<?php echo $p_img1?>" width="300" height="530">
</center>
</div>
<div class="item">
<center>
<img src="admin/product_img/slider/<?php echo $p_img2?>" width="300" height="530">
</center>
</div>





<div class="item">
<center>
<img src="admin/product_img/slider/<?php echo $p_img3?>" width="300" height="530">
</center>
</div>
</div>
<a href="#mycarousel" class="left carousel-control" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">previous</span>
</a>

<a href="#mycarousel" class="right carousel-control" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>


<div>
</div>
</div>
</div>
<?php echo $pro_label?> 
</div>

<div class="col-sm-6">
<div class="box">
<h1 class="text-center"><?php echo $p_title;?></h1>

<?php 
addCart();
?>
<form action="details.php?add_cart=<?php echo $pro_id;?>" method="post" class="form-horizontal">
<input type="hidden" name="title" value="<?php echo $p_title?>">


<div class="form-group">
<label class="col-md-5 control-label">Quantity</label>
<div class="col-md-7">
<select name="product_qty" class="form-control">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>

<?php
if($cat_pro_id=='1' or $cat_pro_id=='4' or $cat_pro_id=='8' 
or $cat_pro_id=='10' or $cat_pro_id=='2'  or $cat_pro_id=='11' or $cat_pro_id=='12' or $cat_pro_id=='13'){
	
}
else if($cat_pro_id=='7'){
	echo"<div class='form-group'>
<label class='col-md-5 control-label'>Size</label>
<div class='col-md-7'>
<select name='product_size' class='form-control'>
<option>select the size</option>
<option>small(28)</option>
<option>medium(32)</option>
<option>large(34)</option>
<option>extra large(36)</option>
</select>
</div>
</div>";
}
else if($cat_pro_id=='5'){
	echo"<div class='form-group'>
<label class='col-md-5 control-label'>Size</label>
<div class='col-md-7'>
<select name='product_size' class='form-control'>
<option>select the size</option>
<option>small(7)</option>
<option>medium(8)</option>
<option>large(9)</option>
<option>extra large(10)</option>
</select>
</div>
</div>";
}
else if($cat_pro_id=='9'){
	echo"<div class='form-group'>
<label class='col-md-5 control-label'>Size</label>
<div class='col-md-7'>
<select name='product_size' class='form-control'>
<option>select the size</option>
<option>small(85)</option>
<option>medium(90)</option>
<option>large(95)</option>
<option>extra large(100)</option>
</select>
</div>
</div>";
}
else{
echo"<div class='form-group'>
<label class='col-md-5 control-label'>Size</label>
<div class='col-md-7'>
<select name='product_size' class='form-control'>
<option>select the size</option>
<option>small</option>
<option>medium</option>
<option>large</option>
<option>extra large</option>
</select>
</div>
</div>";
}


?>
<?php  
if($row['pro_label']=='sale'){
	echo"<p class='price'>
	<del>₹$p_price</del>
	/₹$pro_sale_price</p>";
}
else{
	echo "
		<p class='price'>
	      ₹$p_price 
		</p>
	"; 
}
?>
<p class="text-center buttons">
<button class="btn  btn-primary" type="submit">
<i class="fa fa-shopping-cart">Add to cart</i>
</button>
</p>

</form>
</div>

<?php
if($cat_pro_id=='1'){
echo"
<iframe width='375' height='200' src='$url' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
";	
}
else{
echo"
<div class='col-xs-4'>
<a href='#' class='thumb'>
<img src='admin/product_img/slider/$p_img1' width='90' height='120'>
</a>
</div>


<div class='col-xs-4'>
<a href='#' class='thumb'>
<img src='admin/product_img/slider/$p_img2' width='90' height='120'>
</a>
</div>

<div class='col-xs-4'>
<a href='#' class='thumb'>
<img src='admin/product_img/slider/$p_img3' width='90' height='120'>
</a>
</div>";
}
?>

</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="box" >
<ul class="nav nav-tabs" >
<?php echo $tab_menu ;?>
</ul>
<div class="tab-content">
<?php echo $tab_content; ?>
</div>

</div>
</div>
</div>
<div id="row same-height-row">
<div class="col-md-3 col-sm-6">
<div class="box ">
<h3 class="text-center">You Also Like These Products</h3>
</div>
</div>


</div>
<?php
$get_pro="select *from products order by 1 LIMIT 0,3";
$run=mysqli_query($con,$get_pro);
while($row=mysqli_fetch_array($run)){
	
	$pro_id=$row['pro_id'];
	$pro_title=$row['pro_title'];
	$pro_price=$row['pro_price'];
	$pro_img1=$row['pro_img1'];
	$pro_label=$row['pro_label'];
	$pro_sale=$row['pro_sale'];
	if($pro_label=="sale"){
		$pro_price="<del>  $pro_price </del>";
		$pro_sale_price="/ ₹ $pro_sale";
	}
	else{
		$pro_price=" $pro_price";
		$pro_sale_price="";
	}
	if($pro_label==""){
		
	}
	else{
		$pro_label="<a href='#' class='label $pro_label'>
		<div class='theLabel'>$pro_label
		</div>
		<div class='labelBackground'>
		</div>
		</a>";
	}
	echo"<div class='col-md-3 col-sm-6'>
	<div class='product same-height'>
	<a href='details.php?pro_id=$pro_id'>
	<img src='admin/product_img/slider/$pro_img1' width='170px' height='200px'>
	</a>
	<div class='text'>
	<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
	<p class='price'>₹$pro_price &nbsp;$pro_sale_price</p>
	</div>
	$pro_label
	</div>
	
	
	</div>";
	
	
}

?>


</div>
</div>

</div>
</div>


<!--footer-->
<?php
include("includes/footer.php")
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
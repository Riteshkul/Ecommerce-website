<?php
include("includes/db.php");
if(isset($_POST['Search'])){
$key=$_POST['user_query'];
/*$search="select *from products where pro_keyword LIKE ('%$key%') ";
$run_search=mysqli_query($con,$search);
while($row=mysqli_fetch_array($run_search)){
$pro_id=$row['pro_id'];
$pro_cat_id=$row['pro_cat_id'];*/
echo"<script>window.open('shop.php?query=$key','_self')
	</script>";
}


?>
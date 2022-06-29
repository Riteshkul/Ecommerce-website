<?php

include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
	
?>	
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard"></i>Dashboard/View Boxes
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-tags fa-fw"></i>View Boxes
</h3>
</div>

<div class="panel-body">
<?php
$get_boxes="select *from boxes_section";
$run_boxes=mysqli_query($con,$get_boxes);
while($row_slides=mysqli_fetch_array($run_boxes)){
	$box_id=$row_slides['box_id'];
	$box_title=$row_slides['box_title'];
	$box_desc=$row_slides['box_desc'];

?>
<div class="col-lg-4 col-md-4">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title" align="center">
<?php echo $box_title?>
</h3>
</div>
<div class="panel-body">
<?php echo $box_desc?>
</div>
<div class="panel-footer">
<center>
<a href="index.php?delete_box=<?php echo $box_id ?>"
class="pull-right">
<i class="fa fa-trash"></i>
Delete</a>


<a href="index.php?edit_box=<?php echo $box_id ?>"
class="pull-left">
<i class="fa fa-pencil"></i>
Edit</a>

<div class="clearfix">

</div>
</center>
</div>



</div>
</div>
<?php }?>
</div>
</div>
</div>

<?php }?>
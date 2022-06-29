<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php
if(isset($_GET['edit_box'])){
	$edit_id=$_GET['edit_box'];
	$get_p="select *from boxes_section where box_id='$edit_id'";
	$run_p=mysqli_query($con,$get_p);
	$row_p=mysqli_fetch_array($run_p);
	$box_id=$row_p['box_id'];
	$box_title=$row_p['box_title'];
	$box_desc=$row_p['box_desc'];
}

?>
<html>
<head>
<title>Edit Box
</title>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
<meta charset="utf-8">
<meta  name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard">Dashboard/Edit Box</i>
</li>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-w"></i>Edit Box</h3>
</div>
<div class="panel-body">

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<label class="col-md-3 control-label">Box Title</label>
<input type="text" name="box_title" class="form-control" required=""
value=<?php echo  $box_title;?>>
</div>


<div class="form-group">
<label class="col-md-3 control-label">Box Desc</label>
<textarea name="box_desc" rows="3" class="form-control">
<?php echo $box_desc?>
</textarea>
</div>





<div class="form-group">
<input type="submit" name="update" value="Update Box"  class="btn btn-primary form-control">
</div>

</form>
</div>




</div>
</div>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['update']))
{
	$box_title=$_POST['box_title'];
	$box_desc=$_POST['box_desc'];
$update_slider="update boxes_section set box_title='$box_title',
box_desc='$box_desc'
where box_id='$edit_id'";
$run_slider=mysqli_query($con,$update_slider);
if($run_slider){
echo"<script>alert('the box has been updated sucessfully')</script>";
echo"<script>window.open('index.php?view_boxes','_self')</script>";
}
}
?>

<?php }?>
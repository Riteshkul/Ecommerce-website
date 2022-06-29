<?php
include("includes/db.php");
if(!isset($_SESSION['admin_mail'])){
	echo"<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php
if(isset($_GET['edit_slide'])){
	$edit_id=$_GET['edit_slide'];
	$get_p="select *from slider where id='$edit_id'";
	$run_p=mysqli_query($con,$get_p);
	$row_p=mysqli_fetch_array($run_p);
	$slide_id=$row_p['id'];
	$slide_name=$row_p['slider_name'];
	$slide_image=$row_p['slider_image'];
	$slide_url=$row_p['slide_url'];
}

?>
<html>
<head>
<title>Edit Slide
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
<i class="fa fa-dashboard">Dashboard/Edit slide</i>
</li>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-w"></i>Edit Slide</h3>
</div>
<div class="panel-body">

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<label class="col-md-3 control-label">Slider Name</label>
<input type="text" name="slide_name" class="form-control" required=""
value=<?php echo  $slide_name;?>>
</div>


<div class="form-group">
<label class="col-md-3 control-label">Slider Url</label>
<input type="text" name="slide_url" class="form-control" required=""
value=<?php echo  $slide_url;?>>
</div>


<div class="form-group">
<label class="col-md-3 control-label">Slider Image</label>
<input type="file" name="slide_image" class="form-control">
<img src="slider/<?php echo $slide_image ;?>" class="img-responsive">

</div>


<div class="form-group">
<input type="submit" name="update" value="Update slide"  class="btn btn-primary form-control">
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
	$slide_name=$_POST['slide_name'];
	$slide_url=$_POST['slide_url'];
	$slide_image=$_POST['slide_image']['name'];
	$slide_image_tmp=$_POST['slide_image']['tmp_name'];
move_uploaded_file($slide_image_tmp,"slider/$slide_image");
$update_slider="update slider set slider_name='$slide_name',
slider_image='$slide_image',slide_url='$slide_url'
where id='$edit_id'";
$run_slider=mysqli_query($con,$update_slider);
if($run_slider){
echo"<script>alert('Your slide has been updated sucessfully')</script>";
echo"<script>window.open('index.php?view_slide','_self')</script>";
}
}
?>

<?php }?>
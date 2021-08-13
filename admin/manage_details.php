<?php
include('top.php');
$title="";
$title_sub="";
$about="";

$image_required='';
$image2_required='';
$msg="";
if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from details where id='$id'"));
	$title=$row['title'];
  $title_sub=$row['title_sub'];
	$about=$row['about'];
}

if(isset($_POST['submit'])){
	$title=get_safe_value($_POST['title']);
  $title_sub=get_safe_value($_POST['title_sub']);
	$about=get_safe_value($_POST['about']);

  if($id==''){
    $type=$_FILES['image']['type'];
  $type1=$_FILES['image2']['type'];
  if($type!='image/jpeg' && $type!='image/png' && $type1!='image/jpeg' && $type1!='image/png'){
    $msg="Invalid image format";
  }else{
    $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
    $image2=rand(111111111,999999999).'_'.$_FILES['image2']['name'];
    move_uploaded_file($_FILES['image2']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image2);
    mysqli_query($con,"insert into details(title,title_sub,about,logo,image) values('$title','$title_sub','$about','$image','$image2')");
    redirect('details');
  }
}else{
  if($_FILES['image']['type']==''){
    mysqli_query($con,"update details set title='$title', title_sub='$title_sub',about='$about' where id='$id'");
  }else{
    $type=$_FILES['image']['type'];
    if($type!='image/jpeg' && $type!='image/png'){
      $msg="Invalid image format";
    }else{
      $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
      mysqli_query($con,"update details set title='$title', title_sub='$title_sub',about='$about',logo='$image' where id='$id'");
    }
  }
  redirect('details');
}

		redirect('details');
  }

?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Details</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Header</label>
                      <input type="text" class="form-control" placeholder="title" name="title" required value="<?php echo $title?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputEmail3" required>sub header</label>
                      <input type="textbox" class="form-control" placeholder="sub header" name="title_sub" required value="<?php echo $title_sub?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputName1">Logo</label>
                    <input type="file" class="form-control" name="image" <?php echo $image_required?>>
          <div class="error mt8"><?php echo $msg?></div>
                  </div>
                  <!--<div class="form-group">
                  <label for="exampleInputName1">Header Image</label>
                  <input type="file" class="form-control" name="image2" <?php echo $image2_required?>>
        <div class="error mt8"><?php echo $msg?></div>
      </div>--->
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>About</label>
                      <input type="textbox" class="form-control" placeholder="About" name="about" required value="<?php echo $about?>">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>

		 </div>

<?php include('footer.php');?>

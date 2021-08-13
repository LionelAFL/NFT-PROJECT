<?php
include('top.php');
$title="";
$keyword="";
$meta_desc="";

$image_required='';
$msg="";
if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from info where id='$id'"));
	$title=$row['title'];
  $keyword=$row['keyword'];
	$meta_desc=$row['meta_desc'];
}

if(isset($_POST['submit'])){
	$title=get_safe_value($_POST['title']);
  $keyword=get_safe_value($_POST['keyword']);
	$meta_desc=get_safe_value($_POST['meta_desc']);

  if($id==''){
  $type=$_FILES['image']['type'];
  if($type!='image/jpeg' && $type!='image/png'){
    $msg="Invalid image format";
  }else{
    $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
    mysqli_query($con,"insert into details(title,keyword,meta_desc,image) values('$title','$keyword','$meta_desc','$image')");
    redirect('web_info');
  }
}else{
  if($_FILES['image']['type']==''){
    mysqli_query($con,"update info set title='$title', keyword='$keyword',meta_desc='$meta_desc' where id='$id'");
    redirect('web_info');
  }else{
    $type=$_FILES['image']['type'];
    if($type!='image/jpeg' && $type!='image/png'){
      $msg="Invalid image format";
    }else{
      $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);

      mysqli_query($con,"update info set title='$title', keyword='$keyword',meta_desc='$meta_desc',favicon='$image' where id='$id'");
      redirect('web_info');
    }
  }
}

		redirect('web_info');
  }

?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Details</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Title</label>
                      <input type="text" class="form-control" placeholder="title" name="title" required value="<?php echo $title?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputName1">Favicon</label>
                    <input type="file" class="form-control" name="image" <?php echo $image_required?>>
          <div class="error mt8"><?php echo $msg?></div>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Keyword</label>
                      <input type="textbox" class="form-control" placeholder="Keyword" name="keyword" required value="<?php echo $keyword?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Meta Desc</label>
                      <input type="textbox" class="form-control" placeholder="Meta Desc" name="meta_desc" required value="<?php echo $meta_desc?>">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>

		 </div>

<?php include('footer.php');?>

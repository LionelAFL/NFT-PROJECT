<?php
include('top.php');
$msg="";
$title="";
$des="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from faq where id='$id'"));
	$title=$row['title'];
	$des=$row['des'];
}

if(isset($_POST['submit'])){
	$title=get_safe_value($_POST['title']);
	$des=get_safe_value($_POST['des']);

	if($id==''){
		$sql="select * from faq where title='$title'";
	}else{
		$sql="select * from faq where title='$title' and id!='$id'";
	}
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into faq(title,des,status) values('$title','$des',1)");
		}else{
			mysqli_query($con,"update faq set title='$title', des='$des' where id='$id'");
		}

		redirect('faq');
	}
}
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage faq</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Title</label>
                      <input type="text" class="form-control" placeholder="title" name="title" required value="<?php echo $title?>">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>des</label>
                      <input type="textbox" class="form-control" placeholder="Description" name="des" required value="<?php echo $des?>">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>

		 </div>

<?php include('footer.php');?>

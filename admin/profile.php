<?php
include('top.php');
$username='';
$email='';

$msg="";
$msg2="";

	$id='1';
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from admin where id='$id'"));
	$username=$row['username'];
	$email=$row['email'];


if(isset($_POST['update'])){
	$username=get_safe_value($_POST['username']);
	$email=get_safe_value($_POST['email']);
			mysqli_query($con,"update admin set username='$username',email='$email' where id='1'");
		redirect('profile');
    $msg="profile updated";
	}

  if(isset($_POST['update2'])){
    $password=get_safe_value($_POST['password']);
    $new_password=get_safe_value($_POST['new_password']);
    $uid='1';
    $res=mysqli_query($con,"select * from admin where id='$uid'");
    $check_user=mysqli_num_rows($res);
  if($check_user>0){
    $row=mysqli_fetch_assoc($res);
    $dbpassword=$row['password'];
    if(password_verify($password,$dbpassword)){
      $newest_password=password_hash($new_password,PASSWORD_BCRYPT);
      mysqli_query($con,"update admin set password='$newest_password' where id='$uid'");
      $msg2= "password updated";
    }else{
      $msg2= "wrong password";
    }
  }

}
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Profile Settings</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
										<div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" class="form-control" placeholder="username" name="username" required value="<?php echo $username?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputName1">Email</label>
                      <input type="text" class="form-control" placeholder="email" name="email" required value="<?php echo $email?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="update">update</button>
                  </form>
                  <span><?php echo $msg; ?></span>
                </div>

                <div class="card-body">
                  <form class="forms-sample" method="post">
										<div class="form-group">
                      <label for="exampleInputName1">Current Password</label>
                      <input type="text" class="form-control" placeholder="password" name="password" required value="">
                    </div>
										<div class="form-group">
                      <label for="exampleInputName1">New Password</label>
                      <input type="text" class="form-control" placeholder="new password" name="new_password" required value="">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="update2">update</button>
                  </form>
                  <span><?php echo $msg2; ?></span>
                </div>
              </div>
            </div>

		 </div>

<?php include('footer.php');?>

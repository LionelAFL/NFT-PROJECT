<?php
include('top.php');
$port="";
$host="";
$secure="";
$email="";
$password="";

$msg="";
$id="1";
if(isset($_GET['id'])){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from email where id='$id'"));
	$port=$row['port'];
	$host=$row['host'];
	$secure=$row['secure'];
	$email=$row['email'];
	$password=$row['password'];
}else{
	$id='1';
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from email where id='$id'"));
  $port=$row['port'];
	$host=$row['host'];
	$secure=$row['secure'];
	$email=$row['email'];
	$password=$row['password'];
}

if(isset($_POST['submit'])){
	$port=get_safe_value($_POST['port']);
	$host=get_safe_value($_POST['host']);
	$secure=get_safe_value($_POST['secure']);
	$email=get_safe_value($_POST['email']);
	$password=get_safe_value($_POST['password']);

		if($id==''){
			mysqli_query($con,"insert into email(port,host,secure,email,password) values('$port','$host','$secure','$email','$password')");
		}else{
			mysqli_query($con,"update email set port='$port', host='$host', secure='$secure', email='$email', password='$password' where id='$id'");
		}

		redirect('email');
	}


?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Email Settings</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
										<div class="form-group">
                      <label for="exampleInputName1">Host server</label>
                      <input type="text" class="form-control" placeholder="host" name="host" value="<?php echo $host?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputName1">Port</label>
                      <input type="text" class="form-control" placeholder="port" name="port" value="<?php echo $port?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputName1">Security</label>
                      <input type="text" class="form-control" placeholder="type" name="secure" value="<?php echo $secure?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Email</label>
                      <input type="text" class="form-control" placeholder="email" name="email" value="<?php echo $email?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputEmail3">Email password</label>
                      <input type="textbox" class="form-control" placeholder="password" name="password" value="<?php echo $password?>">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">update</button>
                  </form>
                </div>
              </div>
            </div>

		 </div>

<?php include('footer.php');?>

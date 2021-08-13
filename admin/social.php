<?php
include('top.php');
$yt="";
$rd="";
$fb="";
$dis="";
$ig="";
$tw="";
$tg="";
$mail="";
$no="";
$loc="";

$msg="";
$id="1";
if(isset($_GET['id'])){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from social where id='$id'"));
	$yt=$row['yt'];
	$rd=$row['rd'];
	$fb=$row['fb'];
	$dis=$row['dis'];
	$ig=$row['ig'];
	$tw=$row['tw'];
	$tg=$row['tg'];
	$mail=$row['mail'];
	$no=$row['no'];
	$loc=$row['loc'];
}else{
	$id='1';
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from social where id='$id'"));
	$yt=$row['yt'];
	$rd=$row['rd'];
	$fb=$row['fb'];
	$dis=$row['dis'];
	$ig=$row['ig'];
	$tw=$row['tw'];
	$tg=$row['tg'];
	$mail=$row['mail'];
	$no=$row['no'];
	$loc=$row['loc'];
}

if(isset($_POST['submit'])){
	$yt=get_safe_value($_POST['yt']);
	$rd=get_safe_value($_POST['rd']);
	$fb=get_safe_value($_POST['fb']);
	$tw=get_safe_value($_POST['tw']);
	$ig=get_safe_value($_POST['ig']);
	$dis=get_safe_value($_POST['dis']);
	$tg=get_safe_value($_POST['tg']);
	$mail=get_safe_value($_POST['mail']);
	$no=get_safe_value($_POST['no']);
	$loc=get_safe_value($_POST['loc']);

		if($id==''){
			mysqli_query($con,"insert into social(yt,rd,fb,tw,ig,dis,tg,mail) values('$yt','$rd','$fb','$tw','$ig','$dis','$tg','$mail','$no','$loc')");
		}else{
			mysqli_query($con,"update social set yt='$yt',rd='$rd',fb='$fb', tw='$tw', ig='$ig',dis='$dis', tg='$tg', mail='$mail', no='$no', loc='$loc' where id='$id'");
		}

		redirect('social');
	}


?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Social Settings</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
										<div class="form-group">
                      <label for="exampleInputName1">Youtube</label>
                      <input type="text" class="form-control" placeholder="youtube" name="yt" value="<?php echo $yt?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputName1">Reddit</label>
                      <input type="text" class="form-control" placeholder="reddit" name="rd" value="<?php echo $rd?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputName1">Facebook</label>
                      <input type="text" class="form-control" placeholder="facebook" name="fb" value="<?php echo $fb?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputName1">Twitter</label>
                      <input type="text" class="form-control" placeholder="twitter" name="tw" value="<?php echo $tw?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputName1">Instagram</label>
                      <input type="text" class="form-control" placeholder="instagram" name="ig" value="<?php echo $ig?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Discord</label>
                      <input type="text" class="form-control" placeholder="discord" name="dis" value="<?php echo $dis?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputEmail3">Telegram</label>
                      <input type="textbox" class="form-control" placeholder="telegram" name="tg" value="<?php echo $tg?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Mail address</label>
                      <input type="textbox" class="form-control" placeholder="about" name="mail" value="<?php echo $mail?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputEmail3">mobile</label>
                      <input type="textbox" class="form-control" placeholder="mobile" name="no" value="<?php echo $no?>">
                    </div>
										<div class="form-group">
                      <label for="exampleInputEmail3">Location</label>
                      <input type="textbox" class="form-control" placeholder="location" name="loc" value="<?php echo $loc?>">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">update</button>
                  </form>
                </div>
              </div>
            </div>

		 </div>

<?php include('footer.php');?>

 <?php include('top.php');?>

<div class="row">
	<div class="col-md-6 col-lg-3 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
		  <h1 class="font-weight-light mb-4">
			10000
		  </h1>
		  <div class="d-flex flex-wrap align-items-center">
			<div>
			  <h4 class="font-weight-normal">Revenue</h4>

			</div>
			<i class="mdi mdi-shopping icon-lg text-primary ml-auto"></i>
		  </div>
		</div>
	  </div>
	</div>
	<div class="col-md-6 col-lg-3 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
		  <div class="d-flex flex-wrap align-items-center">
			<div>
			  <h4 class="font-weight-normal">NFTs created</h4>
				<?php $row=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as virtual from assets where type='1'")); ?>
				<p class="text-muted mb-0 font-weight-light">Virtual NFTs : <?php echo $row['virtual']; ?></p>
				<?php $row=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as audio from assets where type='2'")); ?>
				<p class="text-muted mb-0 font-weight-light">Audio NFTs : <?php echo $row['audio']; ?></p>
				<?php $row=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as video from assets where type='3'")); ?>
			  <p class="text-muted mb-0 font-weight-light">Video NFTs : <?php echo $row['video']; ?></p>
			</div>
			<i class="mdi mdi-shopping icon-lg text-danger ml-auto"></i>
		  </div>
		</div>
	  </div>
	</div>
	<div class="col-md-6 col-lg-3 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
			<?php $row=mysqli_fetch_assoc(mysqli_query($con,"select count(id) as numb from sold")); ?>
		  <h1 class="font-weight-light mb-4">
		 <?php echo $row['numb']; ?>
		  </h1>
		  <div class="d-flex flex-wrap align-items-center">
			<div>
			  <h4 class="font-weight-normal">Total NFTs sold</h4>
			  <p class="text-muted mb-0 font-weight-light">assets</p>
			</div>
			<i class="mdi mdi-shopping icon-lg text-info ml-auto"></i>
		  </div>
		</div>
	  </div>
	</div>
	<div class="col-md-6 col-lg-3 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
			<?php $row=mysqli_fetch_assoc(mysqli_query($con,"select count(id) as number from assets")); ?>
		  <h1 class="font-weight-light mb-4">
		 <?php echo $row['number']; ?>
		  </h1>
		  <div class="d-flex flex-wrap align-items-center">
			<div>
			  <h4 class="font-weight-normal">Total NFTs created</h4>
			  <p class="text-muted mb-0 font-weight-light">assets</p>
			</div>
			<i class="mdi mdi-shopping icon-lg text-success ml-auto"></i>
		  </div>
		</div>
	  </div>
	</div>
	</div>

	<div class="col-md-6 col-lg-3 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
		  <h1 class="font-weight-light mb-4">
			<?php
			$row=mysqli_fetch_assoc(mysqli_query($con,"select count(id) as name from user"));
			?>
		  </h1>
		  <div class="d-flex flex-wrap align-items-center">
			<div>
			  <h4 class="font-weight-normal">Total users</h4>
			</div>

			<i class="mdi mdi-account icon-lg text-primary ml-auto"><?php echo $row['name']; ?></i>
		  </div>
		</div>
	  </div>
	</div>

						</tr>
                      </tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>
  </div>


<?php include('footer.php');?>

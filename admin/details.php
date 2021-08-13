<?php
include('top.php');

$sql="select * from details order by id";
$res=mysqli_query($con,$sql);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Page Settings</h1>
			  <div class="row grid_box">

                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th width="20%">Heading</th>
                            <th width="20%">Sub heaing</th>
                            <th width="15%">logo</th>
														<!--<th width="15%">header image</th>--->
														<th width="35%">About us</th>
                            <th width="15%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
							<td><?php echo $row['title']?></td>
                            <td><?php echo $row['title_sub']?></td>
														<td><a href="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['logo']?>">
                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['logo']?>">
                </a></td>
              <!--  <td><a href="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>">
    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>">
  </a></td>--->
														<td><?php echo $row['about']?></td>

							<td>
								<a href="manage_details?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
							</td>

                        </tr>
                        <?php
						} ?>

                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          </div>

<?php include('footer.php');?>

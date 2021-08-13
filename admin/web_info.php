<?php
include('top.php');

$sql="select * from info order by id";
$res=mysqli_query($con,$sql);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Site Setting</h1>
			  <div class="row grid_box">

                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th width="15%">Title</th>
                            <th width="15%">Favicon</th>
														<th width="25%">Keyword</th>
														<th width="30%">Meta tag</th>
                            <th width="15%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
                            <td><?php echo $row['title']?></td>
														<td><a href="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['favicon']?>">
                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['favicon']?>">
                </a></td>
														<td><?php echo $row['keyword']?></td>
														<td><?php echo $row['meta_desc']?></td>

							<td>
								<a href="manage_web_info?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
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

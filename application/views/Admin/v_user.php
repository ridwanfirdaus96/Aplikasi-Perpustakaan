<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active"><?php echo $title ?></li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $title ?></h1>
		</div>
	</div><!--/.row-->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Data user <?php if($this->session->userdata('level')=="s"){?>
				<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Tambah</button>
				<?php } ?></div>
			<div class="panel-body">
				<?php 
				if ($this->session->flashdata('error')!==null) {
					?>
					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('error') ?>
					</div>
					<?php
				}

				if ($this->session->flashdata('success')!==null) {
					?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('success') ?>
					</div>
					<?php
				}
				 ?>
				 <?php if (validation_errors()) : ?>
				      <div class="alert alert-danger">
				        Username telah digunakan
				      </div>
				  <?php endif; ?>
				 
				<table class="table table-hover table-bordered">
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Level</th>
                      <?php if ($this->session->userdata('level')=="s"): ?>
                      <th width="10%">Aksi</th>
                      <?php endif ?>
                    </tr>
                    <?php
                      if ($offset == "") { $i = 0; } else { $i = $offset; }
                      foreach ($query as $row) {
                          $i++;
                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->username; ?></td>
                            <td><?php if($this->session->userdata('level')=="s"){echo $row->password;}else{ echo "*******";} ?></td>
                            <td><?php if($row->level=="s"){echo "Manager";}else{ echo "Admin";} ?></td>
                            <?php if ($this->session->userdata('level')=="s"): ?>
                            <td>
                              <a title="Hapus" href="<?php echo site_url(); ?>/admin/delete_user/<?php echo $row->id; ?>" onclick="return confirm('Are You Sure?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                              <button class="btn btn-primary" title="update" data-toggle="modal" data-target="#edit<?php echo $i ?>"></button>
                            </td>
                            <?php endif ?>
                          </tr>
                      <?php
                      }
                      if($query==NULL){
                      ?>
                      <tr>
                        <td colspan="8"> <center>Tidak Ada Data</center> </td>
                      </tr>
                      <?php
                      }
                      ?>
                   </table>
				   <?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div><!--/.row-->
</div>

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Add new user</h3>
			</div>
				<div class="modal-body">
					<form method="post" action="<?php echo site_url('admin/add_user') ?>">
						<div class="row">
							<div class="col col-lg-12">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" placeholder="Username" required="" autofocus="" class="form-control">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" placeholder="Password" required="" autofocus="" class="form-control">
								</div>
								<div class="form-group">
									<label>Level</label>
									<select required="" class="form-control" name="level">
										<option value="s">Manager</option>
										<option value="a">Admin</option>
									</select>
								</div>
								<button type="submit" class="btn btn-primary pull-right">Tambah user</button>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
		</div>
	</div>
</div>

<?php 
    if ($offset == "") { $i = 0; } else { $i = $offset; }
    foreach ($query as $key) {
    	$i++;
    	?>
		<div id="edit<?php echo $i ?>" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Update user</h3>
					</div>
						<div class="modal-body">
							<form method="post" action="<?php echo site_url('admin/update_user/'.$key->id) ?>">
								<div class="row">
									<div class="col col-lg-12">
										<div class="form-group">
											<label>Username</label>
											<input type="text" name="username" placeholder="Username" required="" autofocus="" class="form-control" value="<?php echo $key->username ?>">
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" placeholder="Password" required="" autofocus="" class="form-control" value="<?php echo $key->password ?>">
										</div>
										<div class="form-group">
											<label>Level</label>
											<select required="" class="form-control" name="level">
												<option value="s">Manager</option>
												<option value="a">Admin</option>
											</select>
										</div>
										<button type="submit" class="btn btn-primary pull-right">Update</button>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
			</div>
		</div>    	
    	<?php
    }
 ?>
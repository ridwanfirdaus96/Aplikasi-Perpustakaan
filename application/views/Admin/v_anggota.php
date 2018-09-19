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
			<div class="panel-heading">Data anggota <?php if($this->session->userdata('level')=="s"){?>
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
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                      <th width="10%">Aksi</th>
                    </tr>
                    <?php
                      if ($offset == "") { $i = 0; } else { $i = $offset; }
                      foreach ($query as $row) {
                          $i++;
                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php if($row->jk=="l"){echo "laki-laki";}else{ echo "Perempuan";} ?></td>
                            <td><?php echo $row->alamat?></td>
                            <td><?php echo $row->no_hp?></td>
                            <td>
                              <a title="Hapus" href="<?php echo site_url(); ?>/admin/delete_anggota/<?php echo $row->id; ?>" onclick="return confirm('Are You Sure?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                              <button class="btn btn-primary" title="update" data-toggle="modal" data-target="#edit<?php echo $i ?>"></button>
                            </td>
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
				<h3 class="modal-title">Add anggota</h3> <span>Id Anggota : <?php echo $id_anggota ?></span>
			</div>
				<div class="modal-body">
					<form method="post" action="<?php echo site_url('admin/add_anggota') ?>">
						<div class="row">
							<input type="hidden" name="id" value="<?php echo $id_anggota ?>">
							<div class="col col-lg-12">
								<div class="form-group">
									<label>Nama </label>
									<input type="text" name="nama" placeholder="Nama " required="" autofocus="" class="form-control">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select class="form-control" name="jk" required="">
										<option value="p">Perempuan</option>
										<option value="l">Laki-laki</option>
									</select>
								</div>
								<div class="form-group">
									<label>Alamat </label>
									<textarea placeholder="Alamat" name="alamat" required="" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label>No telepon </label>
									<input type="text" name="no_hp" placeholder="No telepon " required="" autofocus="" class="form-control">
								</div>
								<button type="submit" class="btn btn-primary pull-right">Tambah anggota</button>
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
				<h3 class="modal-title">Add anggota</h3> <span>Id Anggota : <?php echo $key->id ?></span>
			</div>
				<div class="modal-body">
					<form method="post" action="<?php echo site_url('admin/update_anggota/'.$key->id) ?>">
						<div class="row">
							<div class="col col-lg-12">
								<div class="form-group">
									<label>Nama </label>
									<input type="text" name="nama" placeholder="Nama " required="" autofocus="" class="form-control" value="<?php echo $key->nama ?>">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select class="form-control" name="jk" required="">
										<option value="p">Perempuan</option>
										<option value="l">Laki-laki</option>
									</select>
								</div>
								<div class="form-group">
									<label>Alamat </label>
									<textarea placeholder="Alamat" name="alamat" required="" class="form-control"><?php echo $key->alamat ?></textarea>
								</div>
								<div class="form-group">
									<label>No telepon </label>
									<input type="text" name="no_hp" placeholder="No telepon " required="" autofocus="" value="<?php echo $key->no_hp ?>" class="form-control">
								</div>
								<button type="submit" class="btn btn-primary pull-right">Update anggota</button>
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
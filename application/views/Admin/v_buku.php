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
			<div class="panel-heading">Data Buku yang tersedia
				<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Tambah</button></div>
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
				  <div class="col col-lg-12">
					<?php 
					    if ($offset == "") { $i = 0; } else { $i = $offset; }
					    foreach ($query as $key) {
					    	$i++;
					    	?>
					    	<div class="col-lg-3" style="margin-bottom: 20px;">
							    <div class="card" style="padding: 10px; border-radius: 5px; box-shadow: 1px 1px 10px 1px gray">
								    <img class="card-img-top" src="<?php echo base_url('upload/img/'.$key->foto) ?>" alt="Card image" style="width:100%; height: 200px; ">
								    <div class="card-body">
								      <h4 class="card-title" style="font-weight: bold"><?php echo $key->nama_buku ?></h4>
								      <p class="card-text">Pengarang: <?php echo $key->pengarang ?></p>
								      <p class="card-text">Tahun terbit : <?php echo $key->tahun_terbit ?></p>
								      <p class="card-text">Jumlah tersedia: <?php echo $key->jumlah ?></p>
								      <a href="<?php echo base_url('admin/delete_buku/'.$key->id) ?>" onclick="confirm('Hapus data?')" class="btn btn-danger">Delete</a>
								      <button class="btn btn-primary" data-toggle="modal" data-target="#update<?php echo $key->id ?>">Update</button>
								    </div>
								</div>
					    	</div>
					    	<?php
					    }
					 ?>
				  </div>
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
				<h3 class="modal-title">Add Buku</h3> <span>Id Buku : <?php echo $id ?></span>
			</div>
				<div class="modal-body">
					<form method="post" action="<?php echo site_url('admin/add_buku') ?>" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<div class="form-group">
							<label>Gambar Buku</label>
                    		<input type="file" name="foto" id="input-file-now" class="dropify" data-default-file="" required="" />
						</div>
						<div class="col-sm-12">
							<div class="row">
								<div class="col col-lg-6">
									<div class="form-group">
										<label>Judul Buku</label>
										<input type="text" required="" name="nama_buku" class="form-control">
									</div>
									<div class="form-group">
										<label>Pengarang Buku</label>
										<input type="text" required="" name="pengarang" class="form-control">
									</div>
								</div>
								<div class="col col-lg-6">
									<div class="form-group">
										<label>Kategori Buku</label>
										<select class="form-control" name="kategori" required="">
											<?php foreach ($kategori->result() as $key ): ?>
												<option value="<?php echo $key->kategori ?>"><?php echo $key->kategori ?></option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
										<label>Tahun terbit</label>
										<select name="tahun_terbit" class="form-control" required="">
											<option>Tahun terbit</option>
											<?php 
											$tahun = date('Y');
											for ($i=$tahun; $i >=$tahun-70 ; $i--) { 
												?>
												<option value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php
											}
											 ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col col-sm-12">
								<div class="form-group">
									<label>Jumlah Buku</label>
									<input type="number" name="jumlah" required="" class="form-control" placeholder="Jumlah buku" min="10">
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary pull-right">Tambah</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" style="margin-right: 10px;" data-dismiss="modal">Close</button>
				</div>
		</div>
	</div>
</div>

<?php 
    foreach ($query as $key) {
    	?>
<div id="update<?php echo $key->id ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Update Buku</h3> <span>Id Buku : <?php echo $key->id ?></span>
			</div>
				<div class="modal-body">
					<form method="post" action="<?php echo site_url('admin/update_buku/'.$key->id) ?>" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $key->id ?>">
						<div class="form-group">
							<label>Gambar Buku</label>
                    		<input type="file" name="foto" id="input-file-now" class="dropify" data-default-file="<?php echo base_url('upload/img/'.$key->foto) ?>" />
						</div>
						<div class="col-sm-12">
							<div class="row">
								<div class="col col-lg-6">
									<div class="form-group">
										<label>Judul Buku</label>
										<input type="text" required="" name="nama_buku" value="<?php echo $key->nama_buku ?>" class="form-control">
									</div>
									<div class="form-group">
										<label>Pengarang Buku</label>
										<input type="text" required="" value="<?php echo $key->pengarang ?>" name="pengarang" class="form-control">
									</div>
								</div>
								<div class="col col-lg-6">
									<div class="form-group">
										<label>Kategori Buku</label>
										<select class="form-control" name="kategori" required="">
											<?php foreach ($kategori->result() as $row ): ?>
												<option value="<?php echo $row->kategori ?>"><?php echo $row->kategori ?></option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
										<label>Tahun terbit</label>
										<select name="tahun_terbit" class="form-control" required="">
											<option>Tahun terbit</option>
											<?php 
											$tahun = date('Y');
											for ($i=$tahun; $i >=$tahun-70 ; $i--) { 
												?>
												<option value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php
											}
											 ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col col-sm-12">
								<div class="form-group">
									<label>Jumlah Buku</label>
									<input type="number" name="jumlah" value="<?php echo $key->jumlah ?>" required="" class="form-control" placeholder="Jumlah buku" min="10">
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary pull-right">Tambah</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" style="margin-right: 10px;" data-dismiss="modal">Close</button>
				</div>
		</div>
	</div>
</div>
    	<?php
    }
 ?>
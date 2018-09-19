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
			<div class="panel-heading">Data Kategori 
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
				 
				<table class="table table-hover table-bordered">
                    <tr>
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Jumlah Buku</th>
                      <th width="10%">Aksi</th>
                    </tr>
                    <?php
                    $i = 0;
                      foreach ($kategori->result() as $row) {
                          $i++;
                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->kategori ?></td>
                            <td><?php echo $this->db->where('kategori',$row->kategori)->get('tbl_buku')->num_rows()?></td>
                            <td>
                              <a title="Hapus" href="<?php echo site_url(); ?>/admin/delete_kategori/<?php echo $row->id."/".$row->kategori; ?>" onclick="return confirm('Are You Sure?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                              <button class="btn btn-primary" title="update" data-toggle="modal" data-target="#edit<?php echo $i ?>"></button>
                            </td>
                          </tr>
                      <?php
                      }
                      if($i==0){
                      ?>
                      <tr>
                        <td colspan="8"> <center>Tidak Ada Data</center> </td>
                      </tr>
                      <?php
                      }
                      ?>
                   </table>
			</div>
		</div>
	</div>
</div><!--/.row-->
</div>

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Add kategori</h3>
			</div>
				<div class="modal-body">
					<form method="post" action="<?php echo site_url('admin/add_kategori') ?>">
						<div class="row">
							<div class="col col-lg-12">
								<div class="form-group">
									<label>Nama kategori</label>
									<input type="text" name="nama" placeholder="Nama kategori" required="" autofocus="" class="form-control">
								</div>
								<button type="submit" class="btn btn-primary pull-right">Tambah Kategori</button>
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
$no=0;
foreach ($kategori->result() as $key ) {
$no++;
	?>
<div id="edit<?php echo $no ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Update kategori</h3>
			</div>
				<div class="modal-body">
					<form method="post" action="<?php echo site_url('admin/update_kategori/'.$key->id) ?>">
						<div class="row">
							<div class="col col-lg-12">
								<div class="form-group">
									<label>Nama kategori</label>
									<input type="text" name="nama" placeholder="Nama kategori" required="" autofocus="" class="form-control" value="<?php echo $key->kategori ?>">
								</div>
								<button type="submit" class="btn btn-primary pull-right">Update Kategori</button>
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
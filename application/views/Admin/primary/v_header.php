
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Dashboard</title>

<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/dist/css/dropify.css">
<script src="<?php echo base_url() ?>assets/js/lumino.glyphs.js"></script>


<!--[if lt IE 9]>
<script src="<?php echo base_url() ?>assets/js/html5shiv.js"></script>
<script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $this->session->userdata('username') ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="<?php echo site_url('login/logout') ?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<?php if($title=="Dashboard"){echo "active";} ?>"><a href="<?php echo site_url('admin') ?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="<?php if($title=="Data User"){echo "active";} ?>"><a href="<?php echo site_url('admin/user') ?>"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Data User</a></li>
			<li class="<?php if($title=="Data Anggota"){echo "active";} ?>"><a href="<?php echo site_url('admin/anggota') ?>"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Data Anggota</a></li>
			<li class="<?php if($title=="Kategori"){echo "active";} ?>"><a href="<?php echo site_url('admin/kategori') ?>"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg> Kategori Buku</a></li>
			<li class="<?php if($title=="Data Buku"){echo "active";} ?>"><a href="<?php echo site_url('admin/buku') ?>"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Data Buku</a></li>
			<li class="<?php if($title=="Peminjaman"){echo "active";} ?>"><a href="<?php echo site_url('admin/peminjaman') ?>"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Peminjaman</a></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Report 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Report user
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Report anggota
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Report Peminjaman
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Report Buku
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
		</ul>
		<div class="attribution">Template by <a href="http://www.medialoot.com/item/lumino-admin-bootstrap-template/">Medialoot</a><br/><a href="http://www.glyphs.co" style="color: #333;">Icons by Glyphs</a></div>
	</div><!--/.sidebar-->
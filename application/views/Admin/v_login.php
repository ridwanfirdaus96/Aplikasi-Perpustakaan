
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Perpustakaan</title>

<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="<?php echo base_url() ?>assets/js/html5shiv.js"></script>
<script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<?php 
					if ($this->session->flashdata('error')!==null) {
						?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('error') ?>
						</div>
						<?php
					}
					 ?>
					<form role="form" action="<?php echo site_url('login/dologin') ?>" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text" autofocus=""  required="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required="">
							</div>
							<div class="checkbox">
								<!-- <label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label> -->	
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="<?php echo base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/chart.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/chart-data.js"></script>
	<script src="<?php echo base_url() ?>assets/js/easypiechart.js"></script>
	<script src="<?php echo base_url() ?>assets/js/easypiechart-data.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>

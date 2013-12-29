<!--DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>CRISP Login</title>
		<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('css/customize.css'); ?>">
		<script type="text/javascript" src="<?php echo base_url('js/jquery.js'); ?>"></script>
	</head>

	<body>
		<div class="wrapper full">
			<div class="row">
				<div class="col-md-3 col-md-offset-4">
					<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('images/logo.jpg'); ?>" class="img-responsive logo avoid-me"/></a>
					<div class="text-danger"><?php echo validation_errors(); ?></div>
					<?php echo form_open('verifylogin', 'role="form"'); ?>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember_me" value="true"> Remember Me
							</label>
						</div>
						<div class="center">
							<button type="submit" class="login btn btn-primary">Log in</button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</body>
</HTML>
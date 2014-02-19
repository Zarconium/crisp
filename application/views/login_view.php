<!--DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>CRISP Login</title>
		<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('css/customize.css'); ?>">
		<script type="text/javascript" src="<?php echo base_url('js/jquery.js'); ?>"></script>
	</head>

	<body>		
		
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">CRISP</a>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				</li>
			</ul>
		</nav>

		<div class="wrapper full">
			<div class="row">
				<div class="col-md-5 col-md-offset-2 front">
					<br/>
					<a href="<?php echo base_url(); ?>"><img class="front-logo" src="<?php echo base_url('images/logo-crisp.png'); ?>" class="img-responsive logo"/></a>	
					<h3 class="front-welcome"><b>Welcome to CRISP</b></h3>
					<p class="front-whisper">A website for tracking participants of the CHED-SEI programs</p>

				</div>
				<div class="col-md-3">
				<div class="panel panel-default">
				<div class="panel-heading">
					Login Information
				</div>
				<div class="panel-body">
					<div class="text-danger"><?php echo validation_errors(); ?></div>
					<?php echo form_open('verifylogin', 'role="form"'); ?>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Enter username" autofocus="autofocus">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember_me" value="true"> Remember Me
						</label>
						
					</div>
					<div class="center">
						<button type="submit" class="btn btn-primary">Log in</button>
					</div>
					<?php echo form_close(); ?>
				</div>
				</div>
					
				</div>
			</div>
		</div>
	</body>
</HTML>
<!DOCTYPE html>
<HTML>
<head>
	<title>CRISP</title>
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap-theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/customize.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('js/jquery.js'); ?>"></script>
	
</head>

<body>
	<div class="wrapper">
	
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">CRISP</a>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('logged_in')['username'] . ' (' . $this->session->userdata('logged_in')['type'] . ')'; ?>&nbsp;<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url('home/logout'); ?>">Logout</a></li>
				</ul>
			</li>
			</ul>
		</nav>

		<div class="main-area">
			<div class="col-md-2">
				<div class="bs-sidebar fixed">
					<ul class="nav">
							<li><a href="<?php echo base_url('home'); ?>">Home</a></li>
							<?php if($this->session->userdata('logged_in')['type'] != 'guest') {echo '<li><a href="' . base_url('dbms') . '">Manage Participants</a></li>';} ?>
							<li><a href="<?php echo base_url('reports'); ?>">Reports</a></li>
							<?php if($this->session->userdata('logged_in')['type'] != 'guest') {echo '<li><a href="' . base_url('resources') . '">Resources</a></li>';} ?>
							<?php if($this->session->userdata('logged_in')['type'] == 'admin') {echo '<li><a href="' . base_url('usermanagement') . '">User Management</a></li>';} ?>
					</ul>	
				</div>
			</div>
			<div class="col-md-10 main-page">


<HTML>
<head>
	<title>CRISP</title>
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/customize.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('js/jquery.js'); ?>"></script>
</head>

<body>
	<div class="wrapper">
		<nav class="navbar navbar-inverse" role="navigation">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "$username ($type)"; ?>&nbsp;<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="home/logout">Logout</a></li>
				</ul>
			</li>
			</ul>
		</nav>

		<div class="row">
			<div class="col-md-2">
				<div class="bs-sidebar">
					<ul class="nav bs-sidenav">
						<li><a href="<?php echo base_url('home'); ?>">Home</a></li>
						<li><a href="<?php echo base_url('dbms'); ?>">DBMS</a></li>
						<li><a href="<?php echo base_url('reports'); ?>">Reports</a></li>
						<?php if($type == 'admin') {echo '<li><a href="' . base_url('usermanagement') . '">User Management</a></li>';} ?>
					</ul>
				</div>
			</div>

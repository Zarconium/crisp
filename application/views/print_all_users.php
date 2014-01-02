<!DOCTYPE html>
<html>
	<head>
		<title>CRISP Users List</title>
		<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
	</head>
	<body>
		<h1>CRISP Users List</h1>
		<h2><?php echo date('Y/m/d h:i:s a'); ?></h2>
		<table class="table">
			<tr>
				<th>Username</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Privileges</th>
			</tr>
			<?php foreach ($users as $row): ?>
			<tr>
				<td><?php echo $row->Username; ?></td>
				<td><?php echo $row->First_Name; ?></td>
				<td><?php echo $row->Last_Name; ?></td>
				<td><?php echo $row->Type; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</body>
</html>
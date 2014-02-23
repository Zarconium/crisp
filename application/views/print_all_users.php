<!DOCTYPE html>
<html>
	<head>
		<title>CRISP Users List</title>
		<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
	</head>
	<body>
		<div class="report-form">
		<h1>CRISP Users List</h1>
		<h4>Date and Time: <?php echo date('Y/m/d h:i:s a'); ?></h4>
		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<th>Username</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Privileges</th>
				<th>Assigned School</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $row): ?>
			<tr>
				<td><?php echo $row->Username; ?></td>
				<td><?php echo $row->First_Name; ?></td>
				<td><?php echo $row->Last_Name; ?></td>
				<td><?php echo $row->Type; ?></td>
				<td><?php if($row->Type == 'encoder') { echo $row->School_Name; } else { echo 'All'; } ?></td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		</div>
	</body>
</html>
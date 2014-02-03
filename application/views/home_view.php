<div class="header">
	<h1>Notifications</h1>
</div>
<table class="table table-area">
	<tr>
		<th>Date</th>
		<th>User</th>
		<th>Description</th>
	</tr>
	
	<?php foreach ($logs as $log){ ?>
	<tr>
		<td><?php echo $log->Created_At; ?></td>
		<td><?php echo $log->Username; ?></td>
		<td><?php echo $log->Changes; ?></td>
	</tr>
	<?php } echo $links; ?>
	
</table>
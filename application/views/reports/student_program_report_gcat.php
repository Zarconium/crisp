<h1>GCAT Student Program Report</h1>
<legend>Number of Students Who Have Taken GCAT</legend>
<div class="report-form">
<table class="table">
<tr>
	<th>School</th>
	<th>Male</th>
	<th>Female</th>
	<th>Total</th>
	<?php foreach ($count_list as $count): ?>
</tr>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; ?></td>
		<td><?php echo $count->Female; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php foreach ($total as $t): ?>
	<tr>
		<td>TOTAL</td>
		<td colspan="4"><?php echo $t->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
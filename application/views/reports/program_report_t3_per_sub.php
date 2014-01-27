<h1>T3 Program Report Per Subject</h1>
<legend>Number of Teachers Finished with T3 in a Subject</legend>
<div class="report-form">
<table class="table">
<tr>
	<th>School</th>
	<th>Male</th>
	<th>Female</th>
	<th>Total</th>
</tr>
	<?php foreach ($t3_count_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; ?></td>
		<td><?php echo $count->Female; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php foreach ($t3_total as $count): ?>
	<tr>
		<td>TOTAL</td>
		<td colspan="4"><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
<legend>Number of Classes in School</legend>
<table class="table">
<tr>
	<th>School</th>
	<th>Subject Count</th>
</tr>
	<?php foreach ($class_count as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Count; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
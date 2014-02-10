<h1>T3 Program Report For <?php echo $subject->Subject_Name; ?></h1>
<h4>Period: <?php echo $start_date; ?> to <?php echo $end_date; ?> </h4>
<legend>Number of Teachers Finished with T3 in a Subject</legend>
<div class="report-form">
<table class="table">
<thead>
<tr>
	<th>School</th>
	<th>Male</th>
	<th>Female</th>
	<th>Total</th>
</tr>
</thead>
<tbody>
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
</tbody>
</table>
<legend>Number of Classes in School</legend>
<table class="table">
<thead>
<tr>
	<th>School</th>
	<th>Subject Count</th>
</tr>
</thead>
<tbody>
	<?php foreach ($class_count as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Count; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
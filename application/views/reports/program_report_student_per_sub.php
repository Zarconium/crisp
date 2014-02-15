<h1>Student Program Report For <?php echo $subject->Subject_Name; ?> </h1>
<h4>Period: <?php echo $start_date; ?> to <?php echo $end_date; ?> </h4>
<legend>Current Takers</legend>
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
	<?php if($currently_taking_list) foreach ($currently_taking_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; ?></td>
		<td><?php echo $count->Female; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php if($total_ct) foreach ($total_ct as $t): ?>
	<tr>
		<td>TOTAL</td>
		<td colspan="4"><?php echo $t->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>

<legend>Number of Students Finished with a Subject</legend>
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
	<?php if($finished_list) foreach ($finished_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; ?></td>
		<td><?php echo $count->Female; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
<tfoot>
	<?php if($total_ft) foreach ($total_ft as $t): ?>
	<tr>
		<td>TOTAL</td>
		<td colspan="4"><?php echo $t->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</tfoot>
</table>
</div>
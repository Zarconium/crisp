<h1>Student Program Report Per Subj</h1>
<legend>Number of Students Currently Taking a Subject</legend>
<div class="report-form">
<table class="table">
	<tr>
		<th>School</th>
		<th>Male</th>
		<th>Female</th>
		<th>Total</th>
	</tr>
	<?php foreach ($currently_taking_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; ?></td>
		<td><?php echo $count->Female; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php foreach ($total_ct as $t): ?>
	<tr>
		<td>TOTAL</td>
		<td colspan="4"><?php echo $t->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<legend>Number of Students Finished with a Subject</legend>
<table class="table">
	<tr>
		<th>School</th>
		<th>Male</th>
		<th>Female</th>
		<th>Total</th>
	</tr>
	<?php foreach ($finished_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; ?></td>
		<td><?php echo $count->Female; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php foreach ($total_ft as $t): ?>
	<tr>
		<td>TOTAL</td>
		<td colspan="4"><?php echo $t->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
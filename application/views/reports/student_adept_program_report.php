<<<<<<< HEAD
=======
<h1>Student Adept Program Report</h1>
<legend>Number of Pins Given</legend>
<div class="report-form">
>>>>>>> 4b71f4caa511a499f09bbf0cc79881e180deff90
<table class="table">
	<th>School</th>
	<th>Male</th>
	<th>Female</th>
	<th>Total</th>
	<?php foreach ($pin_count_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; ?></td>
		<td><?php echo $count->Female; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php foreach ($pin_total as $count): ?>
	<tr>
		<td>TOTAL</td>
		<td colspan="4"><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>


<legend>Number of Students Currently Taking Adept</legend>
<table class="table">
	<th>School</th>
	<th>Male</th>
	<th>Female</th>
	<th>Total</th>
	<?php foreach ($current_takers_count_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; ?></td>
		<td><?php echo $count->Female; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php foreach ($current_takers_total as $count): ?>
	<tr>
		<td>TOTAL</td>
		<td colspan="4"><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>	

<legend>Number of Students Completed with Adept</legend>
<table class="table">
	<th>School</th>
	<th>Male</th>
	<th>Female</th>
	<th>Total</th>
	<?php foreach ($completed_count_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; ?></td>
		<td><?php echo $count->Female; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
		<?php foreach ($completed_total as $count): ?>
	<tr>
		<td>TOTAL</td>
		<td colspan="4"><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>	
</div>

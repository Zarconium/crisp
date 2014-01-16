<h1>Student BEST Program Report</h1>
<legend>PINS Given</legend>
<table class="table	">
	<tr>
		<th>School</th>
		<th>Male</th>
		<th>Female</th>
		<th>Total</th>
	<tr>
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
		<td colspan="3"><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<legend>Number of Takers</legend>
<table class="table">
	<tr>
		<th>School</th>
		<th>Male</th>
		<th>Female</th>
		<th>Total</th>
	</tr>
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
		<td colspan="3"><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>	

<legend>Number of Finished Takers</legend>
<table class="table">
	<tr>
		<th>School</th>
		<th>Male</th>
		<th>Female</th>
		<th>Total</th>
	</tr>
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
		<td colspan="3"><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>	
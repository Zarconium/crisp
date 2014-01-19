<table>
	<tr>
		<td>AdEPT - T3</td>
	</tr>
	<tr>
		<td>Teacher List</td>
	</tr>
	<tr>
		<td>School:</td>
		<td><?php echo $count->School; ?></td>
	</tr>
	<tr>
		<td>Sem/Period</td>
		<td><?php echo $count->semester; ?></td>
	</tr>
	<th>Pin</th>
	<th>Teacher Name</th>
	<?php foreach ($pin_count_teacher_list as $count): ?>
	<tr>
		<td><?php echo $count->Pin; ?></td>
		<td><?php echo $count->Teacher; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php foreach ($pin_total as $count): ?>
	<tr>
		<td>TOTAL</td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
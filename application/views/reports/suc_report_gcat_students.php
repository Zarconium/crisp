<table>
	<tr>
		<td>GCAT - Student</td>
	</tr>
	<tr>
		<td>Teacher</td>
		<td><?php echo $count->Teacher; ?></td>
	</tr>
	<tr>
		<td>Sem/Period</td>
		<td><?php echo $count->semester; ?></td>
	</tr>
	<tr>
		<td>School</td>
		<td><?php echo $count->School; ?></td>
	</tr>
	<th>Class</th>
	<th>Class Size</th>
	<?php foreach ($pin_count_list as $count): ?>
	<tr>
		<td><?php echo $count->Class; ?></td>
		<td><?php echo $count->Size; ?></td>
	</tr>
	<?php endforeach; ?>
	<th>Total No. of Classes:</th>
	<th>Total No. of Students:</th>
	<?php foreach ($pin_total as $count): ?>
	<tr>
		<td><?php echo $count->Total; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<table>
	<tr>
		<td>GCAT - Student</td>
	</tr>
	<tr>
		<td>Student List</td>
	</tr>
	<tr>
		<td>Teacher</td>
		<td><?php echo $count->Teacher; ?></td>
	</tr>
	<tr>
		<td>Sem/Period</td>
		<td><?php echo $count->semester; ?></td>
	</tr>
	<tr>
		<td>School</td>
		<td><?php echo $count->School; ?></td>
	</tr>
	<tr>
		<td>Class</td>
		<td><?php echo $count->Class; ?></td>
	</tr>
	<tr>
		<td>Student Name</td>
	</tr>
	<?php foreach ($pin_count_list as $count): ?>
	<tr>
		<td><?php echo $count->Name; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php foreach ($pin_total as $count): ?>
	<tr>
		<td>TOTAL</td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
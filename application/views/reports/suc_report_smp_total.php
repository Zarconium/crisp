<table>
	<tr>
		<td>SMP</td>
	</tr>
	<tr>
		<td>Teacher</td>
		<td><?php echo $count->Teacher; ?></td>
	</tr>
	<tr>
		<td>Subject</td>
		<td><?php echo $count->Subject; ?></td>
	</tr>
	<tr>
		<td>Sem/Period</td>
		<td><?php echo $count->semester; ?></td>
	</tr>
	<tr>
		<td>School:</td>
		<td><?php echo $count->School; ?></td>
	</tr>
	<th>Class</th>
	<th>Size</th>
	<?php foreach ($class_size_list as $count): ?>
	<tr>
		<td><?php echo $count->Class; ?></td>
		<td><?php echo $count->Size; ?></td>
	</tr>
	<?php endforeach; ?>
	<th>Total No. of Classes</th>	
	<th>Total No. of Students</th>
	<?php foreach ($pin_total as $count): ?>
	<tr>
		<td><?php echo $count->Total; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<table>
	<tr>
		<td>SMP</td>
	</tr>
	<tr>
		<td>School</td>
		<td><?php echo $count->Teacher; ?></td>
	</tr>
	<tr>
		<td>Subject</td>
		<td><?php echo $count->Subject; ?></td>
	</tr>
	<tr>
		<td>Sem/Period</td>
		<td><?php echo $count->semester; ?></td>
	</tr>
	<th>Teacher</th>
	<th># of Students</th>
	<th># of Classes</th>
	<?php foreach ($class_size_list as $count): ?>
	<tr>
		<td><?php echo $count->Teacher; ?></td>
		<td><?php echo $count->Students; ?></td>
		<td><?php echo $count->Class; ?></td>
	</tr>
	<?php endforeach; ?>
	<th>Total No. of Teachers</th>
	<th>Total No. of Students</th>	
	<th>Total No. of Classes</th>	

	<?php foreach ($pin_total as $count): ?>
	<tr>
		<td><?php echo $count->Total; ?></td>
		<td><?php echo $count->Total; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<table>
	<?php foreach ($student_list as $student): ?>
	<tr>
		<td><?php echo $student->Full_Name; ?></td>
		<td><?php echo $student->School_Name; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
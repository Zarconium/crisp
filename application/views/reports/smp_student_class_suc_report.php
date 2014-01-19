<table>
	<th>Class Name</th>
	<th>Number of Students</th>

	<?php foreach ($student_class_list as $count): ?>
	<tr>
		<td><?php echo $count->"Class Name"; ?></td>
		<td><?php echo $count->"Number of Students"; ?></td>

	</tr>
	<?php endforeach; ?>

</table>


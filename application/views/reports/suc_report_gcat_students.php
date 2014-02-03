<legend>GCAT - Student</legend>
<div class="report-form">
<table class="table">
	<tr>
		<th>Student Name</th>
	</tr>
	<?php foreach ($gcat_student_list as $count): ?>
	<tr>
		<td><?php echo $count->Student_Names; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
<legend>GCAT - Student</legend>
<div class="report-form">
<table class="table">
	<tr>
		<th>Student List</th>
	</tr>
	<tr>
		<th>Teacher</th>
		<td>Teacher name</td>
	</tr>
	<tr>
		<th>Sem/period</th>
		<td>sem period here</td>
	</tr>
	<tr>
		<th>School</th>
		<td>school name here</td>
	</tr>
	<tr>
		<th>Class</th>
		<td>Class here</td>
	</tr>
	<tr>
		<th>Student Name</th>
	</tr>
	<tr>
		<td>Student name here</td>
	</tr>
	<?php foreach ($gcat_student_list as $count): ?>
	<tr>
		<td><?php echo $count->Student_Names; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
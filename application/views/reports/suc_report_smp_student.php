<h1>SUC SMP Students</h1>
<legend>Description: Number of Students Who Have Taken a Particular SMP Subject</legend>
<div class="report-form">
<table class="table">
	<tr>
		<th>Teacher</th>
		<td>Teacher name</td>
	</tr>
	<tr>
		<th>Subject</th>
		<td>Subject here</td>
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
	<?php foreach ($smp_student_list as $count): ?>
	<tr>
		<td><?php echo $count->Student_Names; ?></td>
	</tr>
	<?php endforeach; ?>
</table>


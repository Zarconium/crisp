<h1>SUC Adept Students Classes</h1>
<legend>Description: Number of Students Who Have Taken a Particular SMP Subject</legend>
<div class="report-form">
<table class="table">
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
		<th>Class Name</th>
		<th>Number of Students</th>
	</tr>
	<?php foreach ($gcat_class_list as $count): ?>
	<tr>
		<td><?php echo $count->Class_Name; ?></td>
		<td><?php echo $count->Number_of_Students; ?></td>
	</tr>
	<?php endforeach; ?>
</table>


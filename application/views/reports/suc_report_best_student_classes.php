<h1>SUC BEST Students Classes</h1>
<legend>Description: Number of Students Who Have Taken a Particular SMP Subject</legend>
<div class="report-form">
<table class="table">
	<tr>
		<th>Class Name</th>
		<th>Number of Students</th>
	</tr>
	<?php foreach ($best_class_list as $count): ?>
	<tr>
		<td><?php echo $count->Class_Name; ?></td>
		<td><?php echo $count->Number_of_Students; ?></td>
	</tr>
	<?php endforeach; ?>
</table>


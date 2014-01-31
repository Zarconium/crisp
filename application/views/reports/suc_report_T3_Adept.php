<h1>BEST - T3</h1>
<legend>Teacher List</legend>
<div class="report-form">
<table class="table">
	<tr>
		<th>School:</th>
		<td>School name here</td>
	</tr>
	<tr>
		<th>Class Name</th>
		<th>Number of Students</th>
	</tr>
	<?php foreach ($T3_adept_list as $count): ?>
	<tr>
		<td><?php echo $count->Control_Number; ?></td>
		<td><?php echo $count->Teachers; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
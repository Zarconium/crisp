<h1>AdEPT - T3</h1>
<h4>School: <?php echo $school->Name; ?></h4>
<h4>Period: <?php echo $start_date; ?> to <?php echo $end_date; ?> </h4>
<legend>Teacher List</legend>
<div class="report-form">
<table class="table">
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
<h1>AdEPT - T3</h1>
<h4>School: <?php echo $school->Name; ?></h4>
<h4>Period: <?php echo date('F j\, Y', strtotime($start_date)); ?> to <?php echo date('F j\, Y', strtotime($end_date)); ?> </h4>
<legend>Teacher List</legend>
<div class="report-form">
<table class="table table-striped table-bordered">
<thead>
	<tr>
		<th>Control Number</th>
		<th>Teacher Name</th>
	</tr>
</thead>
<tbody>
	<?php foreach ($T3_adept_list as $count): ?>
	<tr>
		<td><?php echo $count->Control_Number; ?></td>
		<td><?php echo $count->Teachers; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
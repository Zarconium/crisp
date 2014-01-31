<h1>SUC Adept Students Classes</h1>
<legend>Description: Number of Students Who Have Taken a Particular SMP Subject</legend>
<div class="report-form">
<table class="table">
	<tr>
		<th>School</th>
		<td>school name here</td>
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
		<th>Teacher</th>
		<th>Students</th>
		<th>Classes</th>
	</tr>
	<?php foreach ($smp_total_list as $count): ?>
	<tr>
		<td><?php echo $count->Teacher; ?></td>
		<td><?php echo $count->Students; ?></td>
		<td><?php echo $count->Classes; ?></td>
	</tr>
	<?php endforeach; ?>
</table>

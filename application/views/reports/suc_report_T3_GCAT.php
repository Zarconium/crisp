<h1>GCAT - T3</h1>
<legend>Teacher List</legend>
<div class="report-form">
<table class="table">
	<tr>
		<th>Sem/period</th>
		<td>it goes here</td>
	</tr>
	<?php foreach ($gcat_teacher_list as $count): ?>
	<tr>
		<td><?php echo $count->Teachers; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
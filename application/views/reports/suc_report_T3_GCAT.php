<h1>GCAT - T3</h1>
<legend>Teacher List</legend>
<div class="report-form">
<table class="table">
<thead>
	<tr>
		<th>Sem/period</th>
		<td>it goes here</td>
	</tr>
</thead>
<tbody>
	<?php foreach ($gcat_teacher_list as $count): ?>
	<tr>
		<td><?php echo $count->Teachers; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
</div>
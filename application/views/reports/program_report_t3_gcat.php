<h1>T3 GCAT Program Report</h1>
<h4>Period: <?php echo $start_date; ?> to <?php echo $end_date; ?> </h4>
<legend>Number of Teachers Finished with T3 GCAT</legend>
<div class="report-form">
<table class="table table-striped table-bordered">
<thead>
<tr>
	<th>School</th>
	<th>Male</th>
	<th>Female</th>
	<th>Total</th>
</tr>
</thead>
<tbody>
	<?php if($t3_count_list) foreach ($t3_count_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; ?></td>
		<td><?php echo $count->Female; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
<tfoot>
	<?php if($t3_total) foreach ($t3_total as $count): ?>
	<tr>
		<td>TOTAL</td>
		<td colspan="4"><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</tfoot>
</table>
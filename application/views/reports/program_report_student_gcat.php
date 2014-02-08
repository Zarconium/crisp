<h1>GCAT Student Program Report</h1>
<h4>Period: <?php echo $start_date; ?> to <?php echo $end_date; ?> </h4>
<legend>Number of Students Who Have Taken GCAT</legend>
<div class="report-form">


<div class="container-table">	
<table class="table" class="tryingThis">
<div class="fixed">
<thead>
<tr>
	<th>School</th>
	<th>Male</th>
	<th>Female</th>
	<th>Total</th>
</tr>
</thead>
<tbody>
</div>
	<?php foreach ($count_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; ?></td>
		<td><?php echo $count->Female; ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php foreach ($total as $t): ?>
	<tr>
		<td>TOTAL</td>
		<td colspan="4"><?php echo $t->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
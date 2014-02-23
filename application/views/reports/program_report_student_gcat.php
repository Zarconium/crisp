<h1>GCAT Student Program Report</h1>
<h4>Period: <?php echo date('F j\, Y', strtotime($start_date)); ?> to <?php echo date('F j\, Y', strtotime($end_date)); ?> </h4>
<legend>Number of Students Who Have Taken GCAT</legend>
<div class="report-form">

<?php
$male = 0;
$female = 0;
?>

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
	<?php if($count_list) foreach ($count_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; $male = $male + $count->Male; ?></td>
		<td><?php echo $count->Female; $female = $female + $count->Female;  ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
<tfoot>
	<?php if($total) foreach ($total as $t): ?>
	<tr>
		<td>TOTAL</td>
		<td><?php echo $male; ?></td>
		<td><?php echo $female; ?></td>
		<td><?php echo $t->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</tfoot>
</table>
</div>

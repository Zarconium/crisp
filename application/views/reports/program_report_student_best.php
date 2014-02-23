<h1>Student BEST Program Report</h1>
<h4>Period: <?php echo date('F j\, Y', strtotime($start_date)); ?> to <?php echo date('F j\, Y', strtotime($end_date)); ?> </h4>
<legend>Pins Given</legend>
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
	<?php if($pin_count_list) foreach ($pin_count_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; $male = $male + $count->Male; ?></td>
		<td><?php echo $count->Female; $female = $female + $count->Female;  ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
<tfoot>
<?php foreach ($pin_total as $count): ?>
<tr>
	<td>TOTAL</td>
	<td><?php echo $male; ?></td>
	<td><?php echo $female; ?></td>
	<td><?php echo $count->Total; ?></td>
</tr>
<?php endforeach; ?>
<tfoot>
</table>

<?php
$male = 0;
$female = 0;
?>

<legend>Current Takers</legend>
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
	<?php if($current_takers_count_list) foreach ($current_takers_count_list as $count): ?>
	<tr>
		<td><?php echo $count->School; ?></td>
		<td><?php echo $count->Male; $male = $male + $count->Male; ?></td>
		<td><?php echo $count->Female; $female = $female + $count->Female;  ?></td>
		<td><?php echo $count->Total; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
<tfoot>
<?php if($current_takers_total) foreach ($current_takers_total as $count): ?>
<tr>
	<td>TOTAL</td>
	<td><?php echo $male; ?></td>
	<td><?php echo $female; ?></td>
	<td><?php echo $count->Total; ?></td>
</tr>
<?php endforeach; ?>
</tfoot>
</table>	

<?php
$male = 0;
$female = 0;
?>

<legend>Students Completed</legend>
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
<?php if($completed_count_list) foreach ($completed_count_list as $count): ?>
<tr>
	<td><?php echo $count->School; ?></td>
	<td><?php echo $count->Male; $male = $male + $count->Male; ?></td>
	<td><?php echo $count->Female; $female = $female + $count->Female;  ?></td>
	<td><?php echo $count->Total; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
<tfoot>
<?php if($completed_total) foreach ($completed_total as $count): ?>
<tr>
	<td>TOTAL</td>
	<td><?php echo $male; ?></td>
	<td><?php echo $female; ?></td>
	<td><?php echo $count->Total; ?></td>
</tr>
<?php endforeach; ?>
<tfoot>
</table>	
</div>
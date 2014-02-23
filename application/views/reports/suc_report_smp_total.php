<h1>SUC Adept Students Classes</h1>
<h4>Subject: <?php echo $subject->Subject_Name; ?></h4>
<h4>Period: <?php echo date('F j\, Y', strtotime($start_date)); ?> to <?php echo date('F j\, Y', strtotime($end_date)); ?> </h4>
<h4>Semester: <?php echo $semester; ?></h4>
<h4>School: <?php echo $school->Name; ?></h4><div class="report-form">
<table class="table table-striped table-bordered">
<thead>
	<tr>
		<th>Teacher</th>
		<th>Students</th>
		<th>Classes</th>
	</tr>
</thead>
<tbody>
	<?php foreach ($smp_total_list as $count): ?>
	<tr>
		<td><?php echo $count->Teacher; ?></td>
		<td><?php echo $count->Students; ?></td>
		<td><?php echo $count->Classes; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>

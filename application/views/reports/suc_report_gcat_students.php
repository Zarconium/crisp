<legend>GCAT - Student</legend>
<h4>Proctor: <?php echo $proctor->First_Name; ?> <?php echo $proctor->Middle_Initial; ?> <?php echo $proctor->Last_Name; ?> <?php echo $proctor->Name_Suffix; ?></h4>
<h4>Period: <?php echo $start_date; ?> to <?php echo $end_date; ?> </h4>
<h4>Semester: <?php echo $semester; ?></h4>
<h4>School: <?php echo $school->Name; ?></h4>
<h4>Class: <?php echo $class; ?></h4>
<div class="report-form">
<table class="table table-striped table-bordered">
<thead>
	<tr>
		<th>Student Name</th>
	</tr>
</thead>
<tbody>
	<?php foreach ($gcat_student_list as $count): ?>
	<tr>
		<td><?php echo $count->Student_Names; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
</div>
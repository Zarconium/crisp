<h1>SUC GCAT Students Classes</h1>
<h4>Proctor: <?php echo $proctor->First_Name; ?> <?php echo $proctor->Middle_Initial; ?> <?php echo $proctor->Last_Name; ?> <?php echo $proctor->Name_Suffix; ?></h4>
<h4>Semester: <?php echo $semester; ?></h4>
<h4>School: <?php echo $school->Name; ?></h4>
<div class="report-form">
<table class="table">
<thead>
	<tr>
		<th>Class Name</th>
		<th>Number of Students</th>
	</tr>
</thead>
<tbody>
	<?php foreach ($gcat_class_list as $count): ?>
	<tr>
		<td><?php echo $count->Class_Name; ?></td>
		<td><?php echo $count->Number_of_Students; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>


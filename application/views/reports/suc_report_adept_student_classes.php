<h1>SUC Adept Students Classes</h1>
<h4>Teacher: <?php echo $teacher->First_Name; ?> <?php echo $teacher->Middle_Initial; ?> <?php echo $teacher->Last_Name; ?> <?php echo $teacher->Name_Suffix; ?></h4>
<h4>Period: <?php echo date('F j\, Y', strtotime($start_date)); ?> to <?php echo date('F j\, Y', strtotime($end_date)); ?> </h4>
<h4>Semester: <?php echo $semester; ?></h4>
<h4>School: <?php echo $school->Name; ?></h4>
<div class="report-form">
<table class="table table-striped table-bordered">
<thead>
	<tr>
		<th>Class Name</th>
		<th>Number of Students</th>
	</tr>
</thead>
<tbody>
	<?php if($adept_class_list) foreach ($adept_class_list as $count): ?>
	<tr>
		<td><?php echo $count->Class_Name; ?></td>
		<td><?php echo $count->Number_of_Students; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>


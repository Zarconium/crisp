<h1>Adept Students</h1>
<h4>Teacher: <?php echo $teacher->First_Name; ?> <?php echo $teacher->Middle_Initial; ?> <?php echo $teacher->Last_Name; ?> <?php echo $teacher->Name_Suffix; ?></h4>
<h4>Semester: <?php echo $semester; ?></h4>
<h4>School: <?php echo $school->Name; ?></h4>
<h4>Class: <?php echo $class; ?></h4>
<div class="report-form">
<table class="table">
	<?php foreach ($adept_student_list as $count): ?>
	<tr>
		<td><?php echo $count->Control_Number; ?></td>
		<td><?php echo $count->Student_Names; ?></td>
	</tr>
	<?php endforeach; ?>
</table>


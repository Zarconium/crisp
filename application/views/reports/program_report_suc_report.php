<h1>SUC Report</h1>
<h4>School: <?php echo $school->Name; ?></h4>
<h4>Period: <?php echo $start_date; ?> to <?php echo $end_date; ?> </h4>
<div class="report-form">
<table class="table table-striped table-bordered">
<thead>
<tr>
	<th>Description</th>
	<th>BPO101</th>
	<th>BPO102</th>
	<th>Service Culture</th>
	<th>Business Communication</th>
	<th>Systems Thinking</th>
	<th>AdEPT</th>
	<th>BEST</th>
	<th>GCAT</th>
</tr>
</thead>
<tbody>
	<tr>
		<td>Teachers Trained</td>
		<?php if($teacher_count_list) foreach ($teacher_count_list as $count): ?>
			<td><?php echo $count->BPO101; ?></td>
			<td><?php echo $count->BPO102; ?></td>
			<td><?php echo $count->ServiceCulture; ?></td>
			<td><?php echo $count->BusinessCommunication; ?></td>
			<td><?php echo $count->SystemsThinking; ?></td>
			<td><?php echo $count->AdEPT; ?></td>
			<td><?php echo $count->BEST; ?></td>
			<td><?php echo $count->GCAT; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed</td>
		<?php if($student_completed_count_list) foreach ($student_completed_count_list as $count): ?>
			<td><?php echo $count->BPO101; ?></td>
			<td><?php echo $count->BPO102; ?></td>
			<td><?php echo $count->ServiceCulture; ?></td>
			<td><?php echo $count->BusinessCommunication; ?></td>
			<td><?php echo $count->SystemsThinking; ?></td>
			<td><?php echo $count->AdEPT; ?></td>
			<td><?php echo $count->BEST; ?></td>
			<td><?php echo $count->GCAT; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Currently Taking</td>
		<?php if($student_currently_taking_count_list) foreach ($student_currently_taking_count_list as $count): ?>
			<td><?php echo $count->BPO101; ?></td>
			<td><?php echo $count->BPO102; ?></td>
			<td><?php echo $count->ServiceCulture; ?></td>
			<td><?php echo $count->BusinessCommunication; ?></td>
			<td><?php echo $count->SystemsThinking; ?></td>
			<td><?php echo $count->AdEPT; ?></td>
			<td><?php echo $count->BEST; ?></td>
			<td><?php echo $count->GCAT; ?></td>
		<?php endforeach; ?>
	</tr>
	</tr>
</tbody>
</table>

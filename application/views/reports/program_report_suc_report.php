<h1>SUC Report</h1>
<legend>Teachers</legend>
<div class="report-form">
<table class="table">
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
	<tr>
		<td>Number of Teachers Trained</td>
		<?php foreach ($teacher_count_list as $count): ?>
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
</table>

<table class="table">
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
	<tr>
		<td>Number of Students Completed</td>
		<?php foreach ($student_completed_count_list as $count): ?>
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
</table>

<table class="table">
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
	<tr>
		<td>Number of Students Currently Taking</td>
		<?php foreach ($student_currently_taking_count_list as $count): ?>
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
</table>
</div>

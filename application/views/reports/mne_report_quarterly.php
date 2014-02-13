<?php $number = 1000; ?>
<h1>MNE Quarterly Report</h1>
<h4>Period: <?php echo $annual_start; ?> to <?php echo $annual_end; ?> </h4>
<legend>CHED-LFA</legend>
<div class="report-form">
<table class="table">
<thead>
<tr>
	<th>Description</th>
	<th>LFA Targets</th>
	<th>Q1</th>
	<th>Target</th>
	<th>%</th>
	<th>Q2</th>
	<th>Target</th>
	<th>%</th>
	<th>Q3</th>
	<th>Target</th>
	<th>%</th>
	<th>Q4</th>
	<th>Target</th>
	<th>%</th>
	<th>Annual</th>
	<th>Annual Target</th>
	<th>Annual %</th>
	<th>Cumulative</th>
</tr>
</thead>
<tbody>
	<tr><td>T3<td></tr>
	<tr>
		<td>Teachers Trained in GCAT</td>
		<td>20,000</td>
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td>1000</td>
			<td><?php echo $count->Q1 / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td>1000</td>
			<td><?php echo $count->Q2 / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td>1000</td>
			<td><?php echo $count->Q3 / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td>1000</td>
			<td>.<?php echo $count->Q4 / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in Best</td>
		<td>20,000</td>
		<?php foreach ($teacher_best_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td>1000</td>
			<td><?php echo $count->Q1 / $number; ?></td>	
		<?php endforeach; ?>
		<?php foreach ($teacher_best_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td>1000</td>
			<td><?php echo $count->Q2 / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($teacher_best_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td>1000</td>
			<td><?php echo $count->Q3 / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($teacher_best_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td>1000</td>
			<td><?php echo $count->Q4 / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($teacher_best_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
			<td>1000</td>
			<td><?php echo $count->Annual / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($teacher_best_completed_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in AdEPT</td>
		<td>20,000</td>
		<?php foreach ($teacher_adept_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($teacher_adept_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($teacher_adept_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($teacher_adept_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($teacher_adept_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($teacher_adept_completed_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in SMP Subjects</td>
		<td>20,000</td>
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td>1000</td>
			<td><?php echo $count->Q1 / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td>1000</td>
			<td><?php echo $count->Q2 / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td>1000</td>
			<td><?php echo $count->Q3 / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td>1000</td>
			<td><?php echo $count->Q4 / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
			<td><?php echo $count->Annual; ?></td>
			<td>1000</td>
			<td><?php echo $count->Annual / $number; ?></td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in BPO101</td>
		<td>20,000</td>
		<?php foreach ($getallTeacherBpo101 as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBpo101 as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBpo101 as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBpo101 as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBpo101 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBpo101 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in BPO102</td>
		<td>20,000</td>
		<?php foreach ($getallTeacherBpo102 as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBpo102 as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBpo102 as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBpo102 as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBpo102 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBpo102 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in Service Culture</td>
		<td>20,000</td>
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in Business Communication</td>
		<td>20,000</td>
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in Systems Thinking</td>
		<td>20,000</td>
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>SUC's with complete SMP Subjects and Trained Teachers</td>
		<td>20,000</td>
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr><td>GCAT, BEST, AdEPT</td></tr>
	<tr>
		<td>Students completed in GCAT</td>
		<td>20,000</td>
		<?php foreach ($gcat_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($gcat_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($gcat_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($gcat_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($gcat_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($gcat_completed_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students completed in BEST</td>
		<td>20,000</td>
		<?php foreach ($best_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($best_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($best_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($best_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($best_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($best_completed_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students completed in AdEPT</td>
		<td>20,000</td>
		<?php foreach ($adept_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($adept_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($adept_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($adept_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($adept_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($adept_completed_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr><td>SMP Running</td></tr>
	<tr>
		<td>Students enrolled in any SMP</td>
		<td>20,000</td>
		<?php foreach ($smp_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($smp_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($smp_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($smp_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($smp_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($smp_currently_taking_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students enrolled in BPO101</td>
		<td>20,000</td>
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students enrolled in BPO102</td>
		<td>20,000</td>
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students enrolled in Service Culture</td>
		<td>20,000</td>
		<?php foreach ($sc101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($sc101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($sc101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($sc101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($sc101_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($sc101_currently_taking_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students enrolled in Business Communication</td>
		<td>20,000</td>
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students enrolled in Systems Thinking</td>
		<td>20,000</td>
		<?php foreach ($systh101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($systh101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($systh101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($systh101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($systh101_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($systh101_currently_taking_row as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr><td>SMP Completion</td></tr>
	<tr>
		<td>Students Completed in any SMP</td>
		<td>20,000</td>
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in BPO101</td>
		<td>20,000</td>
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in BPO102</td>
		<td>20,000</td>
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in Service Culture</td>
		<td>20,000</td>
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in Business Communication</td>
		<td>20,000</td>
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in Systems Thinking</td>
		<td>20,000</td>
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in Internship</td>
		<td>20,000</td>
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
			<td><?php echo $count->Q1; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
			<td><?php echo $count->Q2; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
			<td><?php echo $count->Q3; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
			<td><?php echo $count->Q4; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
</tbody>
</table>
</div>

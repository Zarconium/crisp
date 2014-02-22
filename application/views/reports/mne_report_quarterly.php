<?php $lfa_target = 1000; ?>
<h1>MNE Quarterly Report</h1>
<h4>Period: <?php echo $annual_start; ?> to <?php echo $annual_end; ?> </h4>
<legend>CHED-LFA</legend>
<div class="report-form">

<legend>Teachers Trained</legend>
<table class="table table-striped table-bordered">
<thead>
<tr>
	<th>Description</th>
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
	<tr>
		<td>Teachers Trained in GCAT</td>
		<td><?php echo $lfa_targets[0]->LFA; ?></td>
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[0]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[0]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[0]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[0]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[0]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[0]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[0]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[0]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[0]->QTR_1 + $lfa_targets[0]->QTR_2 + $lfa_targets[0]->QTR_3 + $lfa_targets[0]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[0]->QTR_1 + $lfa_targets[0]->QTR_2 + $lfa_targets[0]->QTR_3 + $lfa_targets[0]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($teacher_gcat_completed_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Teachers Trained in Best</td>
		<td><?php echo $lfa_targets[1]->LFA; ?></td>
		<?php foreach ($teacher_best_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[1]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[1]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_best_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[1]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[1]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_best_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[1]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[1]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_best_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[1]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[1]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_best_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[1]->QTR_1 + $lfa_targets[1]->QTR_2 + $lfa_targets[1]->QTR_3 + $lfa_targets[1]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[1]->QTR_1 + $lfa_targets[1]->QTR_2 + $lfa_targets[1]->QTR_3 + $lfa_targets[1]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($teacher_best_completed_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>
		
	<tr>
		<td>Teachers Trained in AdEPT</td>
		<td><?php echo $lfa_targets[2]->LFA; ?></td>
		<?php foreach ($teacher_adept_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[2]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[2]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_adept_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[2]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[2]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_adept_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[2]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[2]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_adept_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[2]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[2]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($teacher_adept_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[2]->QTR_1 + $lfa_targets[2]->QTR_2 + $lfa_targets[2]->QTR_3 + $lfa_targets[2]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[2]->QTR_1 + $lfa_targets[2]->QTR_2 + $lfa_targets[2]->QTR_3 + $lfa_targets[2]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($teacher_adept_completed_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Teachers Trained in SMP Subjects</td>
		<td><?php echo $lfa_targets[3]->LFA; ?></td>
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[3]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[3]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[3]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[3]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[3]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[3]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[3]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[3]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[3]->QTR_1 + $lfa_targets[3]->QTR_2 + $lfa_targets[3]->QTR_3 + $lfa_targets[3]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[3]->QTR_1 + $lfa_targets[3]->QTR_2 + $lfa_targets[3]->QTR_3 + $lfa_targets[3]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallTeacherSmpAnySubject as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Teachers Trained in BPO101</td>
		<td><?php echo $lfa_targets[4]->LFA; ?></td>
		<?php foreach ($getallTeacherBpo101 as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[4]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[4]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBpo101 as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[4]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[4]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBpo101 as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[4]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[4]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBpo101 as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[4]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[4]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBpo101 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[4]->QTR_1 + $lfa_targets[4]->QTR_2 + $lfa_targets[4]->QTR_3 + $lfa_targets[4]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[4]->QTR_1 + $lfa_targets[4]->QTR_2 + $lfa_targets[4]->QTR_3 + $lfa_targets[4]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallTeacherBpo101 as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Teachers Trained in BPO102</td>
		<td><?php echo $lfa_targets[5]->LFA; ?></td>
		<?php foreach ($getallTeacherBpo102 as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[5]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[5]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBpo102 as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[5]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[5]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBpo102 as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[5]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[5]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBpo102 as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[5]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[5]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBpo102 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[5]->QTR_1 + $lfa_targets[5]->QTR_2 + $lfa_targets[5]->QTR_3 + $lfa_targets[5]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[5]->QTR_1 + $lfa_targets[5]->QTR_2 + $lfa_targets[5]->QTR_3 + $lfa_targets[5]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallTeacherBpo102 as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Teachers Trained in Service Culture</td>
		<td><?php echo $lfa_targets[6]->LFA; ?></td>
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[6]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[6]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[6]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[6]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[6]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[6]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[6]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[6]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[6]->QTR_1 + $lfa_targets[6]->QTR_2 + $lfa_targets[6]->QTR_3 + $lfa_targets[6]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[6]->QTR_1 + $lfa_targets[6]->QTR_2 + $lfa_targets[6]->QTR_3 + $lfa_targets[6]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallTeacherServiceCulture as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Teachers Trained in Business Communication</td>
		<td><?php echo $lfa_targets[7]->LFA; ?></td>
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[7]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[7]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[7]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[7]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[7]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[7]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[7]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[7]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[7]->QTR_1 + $lfa_targets[7]->QTR_2 + $lfa_targets[7]->QTR_3 + $lfa_targets[7]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[7]->QTR_1 + $lfa_targets[7]->QTR_2 + $lfa_targets[7]->QTR_3 + $lfa_targets[7]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallTeacherBusinessCommunication as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Teachers Trained in Systems Thinking</td>
		<td><?php echo $lfa_targets[8]->LFA; ?></td>
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[8]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[8]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[8]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[8]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[8]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[8]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[8]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[8]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[8]->QTR_1 + $lfa_targets[8]->QTR_2 + $lfa_targets[8]->QTR_3 + $lfa_targets[8]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[8]->QTR_1 + $lfa_targets[8]->QTR_2 + $lfa_targets[8]->QTR_3 + $lfa_targets[8]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallTeacherSystemsThinking as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>SUC's with complete SMP Subjects and Trained Teachers</td>
		<td><?php echo $lfa_targets[9]->LFA; ?></td>
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[9]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[9]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[9]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[9]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[9]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[9]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[9]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[9]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[9]->QTR_1 + $lfa_targets[9]->QTR_2 + $lfa_targets[9]->QTR_3 + $lfa_targets[9]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[9]->QTR_1 + $lfa_targets[9]->QTR_2 + $lfa_targets[9]->QTR_3 + $lfa_targets[9]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallTeacherCompleteSmpSubjAndTrainedTeachers as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	</tbody>
</table>

<legend>Students in Programs</legend>
<table class="table table-striped table-bordered">
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
	<tr>
		<td>Students completed in GCAT</td>
		<td><?php echo $lfa_targets[10]->LFA; ?></td>
		<?php foreach ($gcat_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[10]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[10]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($gcat_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[10]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[10]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($gcat_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[10]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[10]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($gcat_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[10]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[10]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($gcat_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[10]->QTR_1 + $lfa_targets[10]->QTR_2 + $lfa_targets[10]->QTR_3 + $lfa_targets[10]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[10]->QTR_1 + $lfa_targets[10]->QTR_2 + $lfa_targets[10]->QTR_3 + $lfa_targets[10]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($gcat_completed_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students completed in BEST</td>
		<td><?php echo $lfa_targets[11]->LFA; ?></td>
		<?php foreach ($best_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[11]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[11]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($best_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[11]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[11]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($best_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[11]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[11]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($best_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[11]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[11]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($best_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[11]->QTR_1 + $lfa_targets[11]->QTR_2 + $lfa_targets[11]->QTR_3 + $lfa_targets[11]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[11]->QTR_1 + $lfa_targets[11]->QTR_2 + $lfa_targets[11]->QTR_3 + $lfa_targets[11]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($best_completed_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students completed in AdEPT</td>
		<td><?php echo $lfa_targets[12]->LFA; ?></td>
		<?php foreach ($adept_completed_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[12]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[12]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($adept_completed_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[12]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[12]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($adept_completed_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[12]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[12]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($adept_completed_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[12]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[12]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($adept_completed_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[12]->QTR_1 + $lfa_targets[12]->QTR_2 + $lfa_targets[12]->QTR_3 + $lfa_targets[12]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[12]->QTR_1 + $lfa_targets[12]->QTR_2 + $lfa_targets[12]->QTR_3 + $lfa_targets[12]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($adept_completed_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students enrolled in any SMP</td>
		<td><?php echo $lfa_targets[13]->LFA; ?></td>
		<?php foreach ($smp_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[13]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[13]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($smp_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[13]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[13]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($smp_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[13]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[13]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($smp_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[13]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[13]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($smp_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[13]->QTR_1 + $lfa_targets[13]->QTR_2 + $lfa_targets[13]->QTR_3 + $lfa_targets[13]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[13]->QTR_1 + $lfa_targets[13]->QTR_2 + $lfa_targets[13]->QTR_3 + $lfa_targets[13]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($smp_currently_taking_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students enrolled in BPO101</td>
		<td><?php echo $lfa_targets[14]->LFA; ?></td>
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[14]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[14]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[14]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[14]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[14]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[14]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[14]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[14]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[14]->QTR_1 + $lfa_targets[14]->QTR_2 + $lfa_targets[14]->QTR_3 + $lfa_targets[14]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[14]->QTR_1 + $lfa_targets[14]->QTR_2 + $lfa_targets[14]->QTR_3 + $lfa_targets[14]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($bpo101_currently_taking_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students enrolled in BPO102</td>
		<td><?php echo $lfa_targets[15]->LFA; ?></td>
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[15]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[15]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[15]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[15]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[15]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[15]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[15]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[15]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[15]->QTR_1 + $lfa_targets[15]->QTR_2 + $lfa_targets[15]->QTR_3 + $lfa_targets[15]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[15]->QTR_1 + $lfa_targets[15]->QTR_2 + $lfa_targets[15]->QTR_3 + $lfa_targets[15]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($bpo102_currently_taking_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students enrolled in Service Culture</td>
		<td><?php echo $lfa_targets[16]->LFA; ?></td>
		<?php foreach ($sc101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[16]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[16]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($sc101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[16]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[16]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($sc101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[16]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[16]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($sc101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[16]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[16]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($sc101_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[16]->QTR_1 + $lfa_targets[16]->QTR_2 + $lfa_targets[16]->QTR_3 + $lfa_targets[16]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[16]->QTR_1 + $lfa_targets[16]->QTR_2 + $lfa_targets[16]->QTR_3 + $lfa_targets[16]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($sc101_currently_taking_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students enrolled in Business Communication</td>
		<td><?php echo $lfa_targets[17]->LFA; ?></td>
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[17]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[17]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[17]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[17]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[17]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[17]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[17]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[17]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[17]->QTR_1 + $lfa_targets[17]->QTR_2 + $lfa_targets[17]->QTR_3 + $lfa_targets[17]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[17]->QTR_1 + $lfa_targets[17]->QTR_2 + $lfa_targets[17]->QTR_3 + $lfa_targets[17]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($bizcom_currently_taking_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students enrolled in Systems Thinking</td>
		<td><?php echo $lfa_targets[18]->LFA; ?></td>
		<?php foreach ($systh101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[18]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[18]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($systh101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[18]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[18]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($systh101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[18]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[18]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($systh101_currently_taking_row as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[18]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[18]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($systh101_currently_taking_row as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[18]->QTR_1 + $lfa_targets[18]->QTR_2 + $lfa_targets[18]->QTR_3 + $lfa_targets[18]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[18]->QTR_1 + $lfa_targets[18]->QTR_2 + $lfa_targets[18]->QTR_3 + $lfa_targets[18]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($systh101_currently_taking_row as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students Completed in any SMP</td>
		<td><?php echo $lfa_targets[19]->LFA; ?></td>
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[19]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[19]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[19]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[19]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[19]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[19]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[19]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[19]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[19]->QTR_1 + $lfa_targets[19]->QTR_2 + $lfa_targets[19]->QTR_3 + $lfa_targets[19]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[19]->QTR_1 + $lfa_targets[19]->QTR_2 + $lfa_targets[19]->QTR_3 + $lfa_targets[19]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallStudentsSmpCompleted as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students Completed in BPO101</td>
		<td><?php echo $lfa_targets[20]->LFA; ?></td>
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[20]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[20]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[20]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[20]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[20]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[20]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[20]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[20]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[20]->QTR_1 + $lfa_targets[20]->QTR_2 + $lfa_targets[20]->QTR_3 + $lfa_targets[20]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[20]->QTR_1 + $lfa_targets[20]->QTR_2 + $lfa_targets[20]->QTR_3 + $lfa_targets[20]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallStudentsBpo101Completed as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students Completed in BPO102</td>
		<td><?php echo $lfa_targets[21]->LFA; ?></td>
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[21]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[21]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[21]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[21]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[21]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[21]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[21]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[21]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[21]->QTR_1 + $lfa_targets[21]->QTR_2 + $lfa_targets[21]->QTR_3 + $lfa_targets[21]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[21]->QTR_1 + $lfa_targets[21]->QTR_2 + $lfa_targets[21]->QTR_3 + $lfa_targets[21]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallStudentsBpo102Completed as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>
		
	<tr>
		<td>Students Completed in Service Culture</td>
		<td><?php echo $lfa_targets[22]->LFA; ?></td>
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[22]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[22]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[22]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[22]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[22]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[22]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[22]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[22]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[22]->QTR_1 + $lfa_targets[22]->QTR_2 + $lfa_targets[22]->QTR_3 + $lfa_targets[22]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[22]->QTR_1 + $lfa_targets[22]->QTR_2 + $lfa_targets[22]->QTR_3 + $lfa_targets[22]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallStudentsServiceCultureCompleted as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students Completed in Business Communication</td>
		<td><?php echo $lfa_targets[23]->LFA; ?></td>
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[23]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[23]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[23]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[23]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[23]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[23]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[23]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[23]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[23]->QTR_1 + $lfa_targets[23]->QTR_2 + $lfa_targets[23]->QTR_3 + $lfa_targets[23]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[23]->QTR_1 + $lfa_targets[23]->QTR_2 + $lfa_targets[23]->QTR_3 + $lfa_targets[23]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallStudentsBusinessCommunicationCompleted as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students Completed in Systems Thinking</td>
		<td><?php echo $lfa_targets[24]->LFA; ?></td>
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[24]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[24]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[24]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[24]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[24]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[24]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[24]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[24]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[24]->QTR_1 + $lfa_targets[24]->QTR_2 + $lfa_targets[24]->QTR_3 + $lfa_targets[24]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[24]->QTR_1 + $lfa_targets[24]->QTR_2 + $lfa_targets[24]->QTR_3 + $lfa_targets[24]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallStudentsSystemsThinkingCompleted as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>

	<tr>
		<td>Students Completed in Internship</td>
		<td><?php echo $lfa_targets[25]->LFA; ?></td>
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
			<td><?php echo $count->Q1; ?></td>
			<td><?php echo round($lfa_targets[25]->QTR_1 ); ?></td>
			<td><?php echo number_format((float)($count->Q1 / ($lfa_targets[25]->QTR_1)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
			<td><?php echo $count->Q2; ?></td>
			<td><?php echo round($lfa_targets[25]->QTR_2 ); ?></td>
			<td><?php echo number_format((float)($count->Q2 / ($lfa_targets[25]->QTR_2)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
			<td><?php echo $count->Q3; ?></td>
			<td><?php echo round($lfa_targets[25]->QTR_3 ); ?></td>
			<td><?php echo number_format((float)($count->Q3 / ($lfa_targets[25]->QTR_3)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
			<td><?php echo $count->Q4; ?></td>
			<td><?php echo round($lfa_targets[25]->QTR_4 ); ?></td>
			<td><?php echo number_format((float)($count->Q4 / ($lfa_targets[25]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		<?php endforeach; ?>
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>

		<td><?php echo $lfa_targets[25]->QTR_1 + $lfa_targets[25]->QTR_2 + $lfa_targets[25]->QTR_3 + $lfa_targets[25]->QTR_4 ; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[25]->QTR_1 + $lfa_targets[25]->QTR_2 + $lfa_targets[25]->QTR_3 + $lfa_targets[25]->QTR_4)) * 100, 2, '.', ''); ?>%</td>
		
		<?php foreach ($getallStudentsInternshipCompleted as $count): ?>
		<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
		</tr>
		
</tbody>
</table>
</div>



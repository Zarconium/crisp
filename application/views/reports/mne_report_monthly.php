<h1>MNE Monthly Report</h1>
<h4>Period: <?php echo $annual_start; ?> to <?php echo $annual_end; ?> </h4>
<legend>CHED-LFA</legend>
	
<div class="report-form">
<legend>T3</legend>
<table class="table table-striped table-bordered">
<thead>
<tr>
	<th>Description</th>
	<th>LFA Targets</th>
	<th>January</th>
	<th>Target</th>
	<th>%</th>
	<th>February</th>
	<th>Target</th>
	<th>%</th>
	<th>March</th>
	<th>Target</th>
	<th>%</th>
	<th>April</th>
	<th>Target</th>
	<th>%</th>
	<th>May</th>
	<th>Target</th>
	<th>%</th>
	<th>June</th>
	<th>Target</th>
	<th>%</th>
	<th>July</th>
	<th>Target</th>
	<th>%</th>
	<th>August</th>
	<th>Target</th>
	<th>%</th>
	<th>September</th>
	<th>Target</th>
	<th>%</th>
	<th>October</th>
	<th>Target</th>
	<th>%</th>
	<th>November</th>
	<th>Target</th>
	<th>%</th>
	<th>December</th>
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
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[0]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[0]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[0]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[0]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[0]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[0]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[0]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[0]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[0]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[0]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[0]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[0]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[0]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[0]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[0]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in Best</td>
		<td><?php echo $lfa_targets[1]->LFA; ?></td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[1]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[1]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[1]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[1]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[1]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[1]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[1]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[1]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[1]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[1]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[1]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[1]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[1]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[1]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[1]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Teachers Trained in AdEPT</td>
		<td><?php echo $lfa_targets[2]->LFA; ?></td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[2]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[2]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[2]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[2]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[2]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[2]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[2]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[2]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[2]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[2]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[2]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[2]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[2]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[2]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[2]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Teachers Trained in SMP Subjects</td>
		<td><?php echo $lfa_targets[3]->LFA; ?></td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[3]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[3]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[3]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[3]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[3]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[3]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[3]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[3]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[3]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[3]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[3]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[3]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[3]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[3]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[3]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Teachers Trained in BPO101</td>
		<td><?php echo $lfa_targets[4]->LFA; ?></td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[4]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[4]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[4]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[4]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[4]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[4]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[4]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[4]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[4]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[4]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[4]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[4]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[4]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[4]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[4]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Teachers Trained in BPO102</td>
		<td><?php echo $lfa_targets[5]->LFA; ?></td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[5]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[5]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[5]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[5]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[5]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[5]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[5]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[5]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[5]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[5]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[5]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[5]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[5]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[5]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[5]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Teachers Trained in Service Culture</td>
		<td><?php echo $lfa_targets[6]->LFA; ?></td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[6]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[6]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[6]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[6]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[6]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[6]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[6]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[6]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[6]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[6]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[6]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[6]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[6]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[6]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[6]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Teachers Trained in Business Communication</td>
		<td><?php echo $lfa_targets[7]->LFA; ?></td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[7]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[7]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[7]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[7]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[7]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[7]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[7]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[7]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[7]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[7]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[7]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[7]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[7]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[7]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[7]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Teachers Trained in Systems Thinking</td>
		<td><?php echo $lfa_targets[8]->LFA; ?></td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[8]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[8]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[8]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[8]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[8]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[8]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[8]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[8]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[8]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[8]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[8]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[8]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[8]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[8]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[8]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>SUC's with complete SMP Subjects and Trained Teachers</td>
		<td><?php echo $lfa_targets[9]->LFA; ?></td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[9]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[9]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[9]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[9]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[9]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[9]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[9]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[9]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[9]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[9]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[9]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[9]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[9]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[9]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[9]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

</tbody>
</table>


<legend>GCAT, BEST, AdEPT</legend>
<table class="table table-striped table-bordered"><thead>
<tr>
	<th>Description</th>
	<th>LFA Targets</th>
	<th>January</th>
	<th>Target</th>
	<th>%</th>
	<th>February</th>
	<th>Target</th>
	<th>%</th>
	<th>March</th>
	<th>Target</th>
	<th>%</th>
	<th>April</th>
	<th>Target</th>
	<th>%</th>
	<th>May</th>
	<th>Target</th>
	<th>%</th>
	<th>June</th>
	<th>Target</th>
	<th>%</th>
	<th>July</th>
	<th>Target</th>
	<th>%</th>
	<th>August</th>
	<th>Target</th>
	<th>%</th>
	<th>September</th>
	<th>Target</th>
	<th>%</th>
	<th>October</th>
	<th>Target</th>
	<th>%</th>
	<th>November</th>
	<th>Target</th>
	<th>%</th>
	<th>December</th>
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
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[10]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[10]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[10]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[10]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[10]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[10]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[10]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[10]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[10]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[10]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[10]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[10]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[10]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[10]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[10]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students completed in BEST</td>
		<td><?php echo $lfa_targets[11]->LFA; ?></td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[11]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[11]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[11]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[11]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[11]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[11]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[11]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[11]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[11]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[11]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[11]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[11]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[11]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[11]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[11]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students completed in AdEPT</td>
		<td><?php echo $lfa_targets[12]->LFA; ?></td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[12]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[12]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[12]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[12]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[12]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[12]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[12]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[12]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[12]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[12]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[12]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[12]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[12]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[12]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[12]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr><td>SMP Running</td></tr>
	
	<tr>
		<td>Students enrolled in any SMP</td>
		<td><?php echo $lfa_targets[13]->LFA; ?></td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[13]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[13]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[13]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[13]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[13]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[13]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[13]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[13]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[13]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[13]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[13]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[13]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[13]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[13]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[13]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students enrolled in BPO101</td>
		<td><?php echo $lfa_targets[14]->LFA; ?></td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[14]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[14]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[14]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[14]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[14]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[14]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[14]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[14]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[14]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[14]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[14]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[14]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[14]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[14]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[14]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students enrolled in BPO102</td>
		<td><?php echo $lfa_targets[15]->LFA; ?></td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[15]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[15]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[15]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[15]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[15]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[15]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[15]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[15]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[15]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[15]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[15]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[15]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[15]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[15]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[15]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students enrolled in Service Culture</td>
		<td><?php echo $lfa_targets[16]->LFA; ?></td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[16]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[16]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[16]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[16]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[16]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[16]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[16]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[16]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[16]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[16]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[16]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[16]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[16]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[16]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[16]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students enrolled in Business Communication</td>
		<td><?php echo $lfa_targets[17]->LFA; ?></td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[17]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[17]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[17]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[17]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[17]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[17]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[17]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[17]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[17]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[17]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[17]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[17]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[17]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[17]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[17]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students enrolled in Systems Thinking</td>
		<td><?php echo $lfa_targets[18]->LFA; ?></td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[18]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[18]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[18]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[18]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[18]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[18]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[18]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[18]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[18]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[18]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[18]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[18]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[18]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[18]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[18]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

</tbody>
</table>


<legend>SMP Completion</legend>
<table class="table table-striped table-bordered"><thead>
<tr>
	<th>Description</th>
	<th>LFA Targets</th>
	<th>January</th>
	<th>Target</th>
	<th>%</th>
	<th>February</th>
	<th>Target</th>
	<th>%</th>
	<th>March</th>
	<th>Target</th>
	<th>%</th>
	<th>April</th>
	<th>Target</th>
	<th>%</th>
	<th>May</th>
	<th>Target</th>
	<th>%</th>
	<th>June</th>
	<th>Target</th>
	<th>%</th>
	<th>July</th>
	<th>Target</th>
	<th>%</th>
	<th>August</th>
	<th>Target</th>
	<th>%</th>
	<th>September</th>
	<th>Target</th>
	<th>%</th>
	<th>October</th>
	<th>Target</th>
	<th>%</th>
	<th>November</th>
	<th>Target</th>
	<th>%</th>
	<th>December</th>
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
		<td>Students Completed in any SMP</td>
		<td><?php echo $lfa_targets[19]->LFA; ?></td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[19]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[19]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[19]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[19]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[19]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[19]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[19]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[19]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[19]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[19]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[19]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[19]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[19]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[19]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[19]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students Completed in BPO101</td>
		<td><?php echo $lfa_targets[20]->LFA; ?></td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[20]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[20]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[20]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[20]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[20]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[20]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[20]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[20]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[20]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[20]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[20]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[20]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[20]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[20]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[20]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students Completed in BPO102</td>
		<td><?php echo $lfa_targets[21]->LFA; ?></td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[21]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[21]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[21]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[21]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[21]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[21]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[21]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[21]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[21]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[21]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[21]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[21]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[21]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[21]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[21]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students Completed in Service Culture</td>
		<td><?php echo $lfa_targets[22]->LFA; ?></td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[22]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[22]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[22]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[22]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[22]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[22]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[22]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[22]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[22]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[22]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[22]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[22]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[22]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[22]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[22]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students Completed in Business Communication</td>
		<td><?php echo $lfa_targets[23]->LFA; ?></td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[23]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[23]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[23]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[23]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[23]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[23]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[23]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[23]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[23]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[23]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[23]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[23]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[23]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[23]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[23]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students Completed in Systems Thinking</td>
		<td><?php echo $lfa_targets[24]->LFA; ?></td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[24]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[24]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[24]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[24]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[24]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[24]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[24]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[24]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[24]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[24]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[24]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[24]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[24]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[24]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[24]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

	<tr>
		<td>Students Completed in Internship</td>
		<td><?php echo $lfa_targets[25]->LFA; ?></td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_targets[25]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_targets[25]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_targets[25]->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_targets[25]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_targets[25]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_targets[25]->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_targets[25]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_targets[25]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_targets[25]->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_targets[25]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_targets[25]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_targets[25]->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_targets[25]->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_targets[25]->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_targets[25]->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>

</tbody>
</table>
</div>

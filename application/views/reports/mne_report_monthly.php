<h1>MNE Monthly Report</h1>
<h4>Period: <?php echo $annual_start; ?> to <?php echo $annual_end; ?> </h4>
<legend>CHED-LFA</legend>
	
<div class="report-form">
<legend>T3</legend>
<<<<<<< HEAD

<table class="table">
=======
<table class="table table-striped table-bordered">
>>>>>>> 6f5f0d8272fe6941b416abfe494baaaaf7f44f32
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
		<td><?php echo $lfa_target1->LFA; ?></td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->January / ($lfa_target1->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->February / ($lfa_target1->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_1 / 3); ?></td>
		<td><?php echo number_format((float)($count->March / ($lfa_target1->QTR_1 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->April / ($lfa_target1->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->May / ($lfa_target1->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_2 / 3); ?></td>
		<td><?php echo number_format((float)($count->June / ($lfa_target1->QTR_2 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->July / ($lfa_target1->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->August / ($lfa_target1->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_3 / 3); ?></td>
		<td><?php echo number_format((float)($count->September / ($lfa_target1->QTR_3 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->October / ($lfa_target1->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->November / ($lfa_target1->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td><?php echo round($lfa_target1->QTR_4 / 3); ?></td>
		<td><?php echo number_format((float)($count->December / ($lfa_target1->QTR_4 / 3)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td><?php echo $lfa_target1->LFA; ?></td>
		<td><?php echo number_format((float)($count->Annual / ($lfa_target1->LFA)) * 100, 2, '.', ''); ?>%</td>
		<?php foreach ($getMonthlyTeachersCompletedGcat as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in Best</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBest as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in AdEPT</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAdept as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in SMP Subjects</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInAnySmp as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in BPO101</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo101 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in BPO102</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBpo102 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in Service Culture</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInServiceCulture as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in Business Communication</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInBusinessCommunication as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Teachers Trained in Systems Thinking</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyTeachersTrainedInSystemsThinking as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>SUC's with complete SMP Subjects and Trained Teachers</td>
		<td>20,000</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
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
		<td>20,000</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsAdministeredGcat as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students completed in BEST</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedBest as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students completed in AdEPT</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsCompletedAdept as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr><td>SMP Running</td></tr>
	<tr>
		<td>Students enrolled in any SMP</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInAnySmpSubject as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students enrolled in BPO101</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo101 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students enrolled in BPO102</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBpo102 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students enrolled in Service Culture</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInServiceCulture as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students enrolled in Business Communication</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInBusinessCommunication as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students enrolled in Systems Thinking</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsEnrolledInSystemsThinking as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
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
		<td>20,000</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedAnySmpSubject as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in BPO101</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo101 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in BPO102</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBpo102 as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in Service Culture</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedServiceCulture as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in Business Communication</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedBusinessCommunication as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in Systems Thinking</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyCompletedSystemsThinking as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<td>Students Completed in Internship</td>
		<td>20,000</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->January; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->February; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->March; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->April; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->May; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->June; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->July; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->August; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->September; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->October; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->November; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->December; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->Annual; ?></td>
		<?php endforeach; ?>
		<td>1000</td>
		<td>.05</td>
		<?php foreach ($getMonthlyStudentsUndergoneInternship as $count): ?>
			<td><?php echo $count->Cumulative; ?></td>
		<?php endforeach; ?>
	</tr>
</tbody>
</table>
</div>

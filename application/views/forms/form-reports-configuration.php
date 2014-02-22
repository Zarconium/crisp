<div class="header">
	<h1>Target Configuration</h1>
</div>
<div class="report-form">

<legend>General Information</legend>

<div class="form-group">
	<label>Target Year</label>
	<input class="form-control" type="number" name="target_year" value="<?php echo date('Y'); ?>" min="1990">
	<?php echo form_error('target_year'); ?>
</div>
	
<legend>Teachers Trained</legend>
<form class="form" role="form">

	
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Description</th>
			<th>LFA Targets</th>
			<th>1st Quarter</th>
			<th>2nd Quarter</th>
			<th>3rd Quarter</th>
			<th>4th Quarter</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>GCAT</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_lfa_gcat">
				<?php echo form_error('teacher_lfa_gcat'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q1_gcat">
				<?php echo form_error('teacher_q1_gcat'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q2_gcat">
				<?php echo form_error('teacher_q2_gcat'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q3_gcat">
				<?php echo form_error('teacher_q3_gcat'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q4_gcat">
				<?php echo form_error('teacher_q4_gcat'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>BEST</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_lfa_best">
				<?php echo form_error('teacher_lfa_best'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q1_best">
				<?php echo form_error('teacher_q1_best'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q2_best">
				<?php echo form_error('teacher_q2_best'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q3_best">
				<?php echo form_error('teacher_q3_best'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q4_best">
				<?php echo form_error('teacher_q4_best'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>ADEPT</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_lfa_adept">
				<?php echo form_error('teacher_lfa_adept'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q1_adept">
				<?php echo form_error('teacher_q1_adept'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q2_adept">
				<?php echo form_error('teacher_q2_adept'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q3_adept">
				<?php echo form_error('teacher_q3_adept'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q4_adept">
				<?php echo form_error('teacher_q4_adept'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>SMP Subjects</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_lfa_smp">
				<?php echo form_error('teacher_lfa_smp'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q1_smp">
				<?php echo form_error('teacher_q1_smp'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q2_smp">
				<?php echo form_error('teacher_q2_smp'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q3_smp">
				<?php echo form_error('teacher_q3_smp'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q4_smp">
				<?php echo form_error('teacher_q4_smp'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>BPO101</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_lfa_bpo101">
				<?php echo form_error('teacher_lfa_bpo101'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q1_bpo101">
				<?php echo form_error('teacher_q1_bpo101'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q2_bpo101">
				<?php echo form_error('teacher_q2_bpo101'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q3_bpo101">
				<?php echo form_error('teacher_q3_bpo101'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q4_bpo101">
				<?php echo form_error('teacher_q4_bpo101'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>BPO102</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_lfa_bpo102">
				<?php echo form_error('teacher_lfa_bpo102'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q1_bpo102">
				<?php echo form_error('teacher_q1_bpo102'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q2_bpo102">
				<?php echo form_error('teacher_q2_bpo102'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q3_bpo102">
				<?php echo form_error('teacher_q3_bpo102'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q4_bpo102">
				<?php echo form_error('teacher_q4_bpo102'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>Service Culture</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_lfa_sc">
				<?php echo form_error('teacher_lfa_sc'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q1_sc">
				<?php echo form_error('teacher_q1_sc'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q2_sc">
				<?php echo form_error('teacher_q2_sc'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q3_sc">
				<?php echo form_error('teacher_q3_sc'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q4_sc">
				<?php echo form_error('teacher_q4_sc'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>Business Communication</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_lfa_bc">
				<?php echo form_error('teacher_lfa_bc'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q1_bc">
				<?php echo form_error('teacher_q1_bc'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q2_bc">
				<?php echo form_error('teacher_q2_bc'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q3_bc">
				<?php echo form_error('teacher_q3_bc'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q4_bc">
				<?php echo form_error('teacher_q4_bc'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>Systems Thinking</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_lfa_st">
				<?php echo form_error('teacher_lfa_st'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q1_st">
				<?php echo form_error('teacher_q1_st'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q2_st">
				<?php echo form_error('teacher_q2_st'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q3_st">
				<?php echo form_error('teacher_q3_st'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q4_st">
				<?php echo form_error('teacher_q4_st'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>SUCs with complete SMP Subjects and Trained Teachers</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_lfa_suc_smp">
				<?php echo form_error('teacher_lfa_suc_smp'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q1_suc_smp">
				<?php echo form_error('teacher_q1_suc_smp'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q2_suc_smp">
				<?php echo form_error('teacher_q2_suc_smp'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q3_suc_smp">
				<?php echo form_error('teacher_q3_suc_smp'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="teacher_q4_suc_smp">
				<?php echo form_error('teacher_q4_suc_smp'); ?>
			</td>
		</tr>	
	</tbody>
</table>
</form>

<br/>
<legend>Students in Programs</legend>
<form class="form" role="form">
	<table class="table table-striped">	
		
		<thead>
		<tr>
			<th>Description</th>
			<th>LFA Targets</th>
			<th>1st Quarter</th>
			<th>2nd Quarter</th>
			<th>3rd Quarter</th>
			<th>4th Quarter</th>
		</tr>
		</thead>
		<tbody>
		
		<tr>
			<td>GCAT</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_gcat">
				<?php echo form_error('student_lfa_gcat'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_gcat">
				<?php echo form_error('student_q1_gcat'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_gcat">
				<?php echo form_error('student_q2_gcat'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_gcat">
				<?php echo form_error('student_q3_gcat'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_gcat">
				<?php echo form_error('student_q4_gcat'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>BEST</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_best">
				<?php echo form_error('student_lfa_best'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_best">
				<?php echo form_error('student_q1_best'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_best">
				<?php echo form_error('student_q2_best'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_best">
				<?php echo form_error('student_q3_best'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_best">
				<?php echo form_error('student_q4_best'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>ADEPT</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_adept">
				<?php echo form_error('student_lfa_adept'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_adept">
				<?php echo form_error('student_q1_adept'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_adept">
				<?php echo form_error('student_q2_adept'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_adept">
				<?php echo form_error('student_q3_adept'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_adept">
				<?php echo form_error('student_q4_adept'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>SMP Running</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_smp_running">
				<?php echo form_error('student_lfa_smp_running'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_smp_running">
				<?php echo form_error('student_q1_smp_running'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_smp_running">
				<?php echo form_error('student_q2_smp_running'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_smp_running">
				<?php echo form_error('student_q3_smp_running'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_smp_running">
				<?php echo form_error('student_q4_smp_running'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>BPO101 - Enrolled</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_bpo101_enrolled">
				<?php echo form_error('student_lfa_bpo101_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_bpo101_enrolled">
				<?php echo form_error('student_q1_bpo101_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_bpo101_enrolled">
				<?php echo form_error('student_q2_bpo101_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_bpo101_enrolled">
				<?php echo form_error('student_q3_bpo101_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_bpo101_enrolled">
				<?php echo form_error('student_q4_bpo101_enrolled'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>BPO102 - Enrolled</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_bpo102_enrolled">
				<?php echo form_error('student_lfa_bpo102_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_bpo102_enrolled">
				<?php echo form_error('student_q1_bpo102_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_bpo102_enrolled">
				<?php echo form_error('student_q2_bpo102_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_bpo102_enrolled">
				<?php echo form_error('student_q3_bpo102_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_bpo102_enrolled">
				<?php echo form_error('student_q4_bpo102_enrolled'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>Service Culture - Enrolled</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_sc_enrolled">
				<?php echo form_error('student_lfa_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_sc_enrolled">
				<?php echo form_error('student_q1_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_sc_enrolled">
				<?php echo form_error('student_q2_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_sc_enrolled">
				<?php echo form_error('student_q3_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_sc_enrolled">
				<?php echo form_error('student_q4_sc_enrolled'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>Business Communication - Enrolled</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_bc_enrolled">
				<?php echo form_error('student_lfa_bc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_bc_enrolled">
				<?php echo form_error('student_q1_bc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_bc_enrolled">
				<?php echo form_error('student_q2_bc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_bc_enrolled">
				<?php echo form_error('student_q3_bc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_bc_enrolled">
				<?php echo form_error('student_q4_bc_enrolled'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>Systems Thinking - Enrolled</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_sc_enrolled">
				<?php echo form_error('student_lfa_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_sc_enrolled">
				<?php echo form_error('student_q1_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_sc_enrolled">
				<?php echo form_error('student_q2_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_sc_enrolled">
				<?php echo form_error('student_q3_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_sc_enrolled">
				<?php echo form_error('student_q4_sc_enrolled'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>SMP Completion</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_smp_completion">
				<?php echo form_error('student_lfa_smp_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_smp_completion">
				<?php echo form_error('student_q1_smp_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_smp_completion">
				<?php echo form_error('student_q2_smp_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_smp_completion">
				<?php echo form_error('student_q3_smp_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_smp_completion">
				<?php echo form_error('student_q4_smp_completion'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>BPO101 - Completed</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_bpo101_completion">
				<?php echo form_error('student_lfa_bpo101_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_bpo101_completion">
				<?php echo form_error('student_q1_bpo101_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_bpo101_completion">
				<?php echo form_error('student_q2_bpo101_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_bpo101_completion">
				<?php echo form_error('student_q3_bpo101_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_bpo101_completion">
				<?php echo form_error('student_q4_bpo101_completion'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>BPO102 - Completed</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_bpo102_completion">
				<?php echo form_error('student_lfa_bpo102_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_bpo102_completion">
				<?php echo form_error('student_q1_bpo102_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_bpo102_completion">
				<?php echo form_error('student_q2_bpo102_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_bpo102_completion">
				<?php echo form_error('student_q3_bpo102_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_bpo102_completion">
				<?php echo form_error('student_q4_bpo102_completion'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>Service Culture - Completed</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_sc_completion">
				<?php echo form_error('student_lfa_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_sc_completion">
				<?php echo form_error('student_q1_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_sc_completion">
				<?php echo form_error('student_q2_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_sc_completion">
				<?php echo form_error('student_q3_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_sc_completion">
				<?php echo form_error('student_q4_sc_completion'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>Business Communication - Completed</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_bc_completion">
				<?php echo form_error('student_lfa_bc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_bc_completion">
				<?php echo form_error('student_q1_bc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_bc_completion">
				<?php echo form_error('student_q2_bc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_bc_completion">
				<?php echo form_error('student_q3_bc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_bc_completion">
				<?php echo form_error('student_q4_bc_completion'); ?>
			</td>
		</tr>	
		
		<tr>
			<td>Systems Thinking - Completed</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_sc_completion">
				<?php echo form_error('student_lfa_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_sc_completion">
				<?php echo form_error('student_q1_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_sc_completion">
				<?php echo form_error('student_q2_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_sc_completion">
				<?php echo form_error('student_q3_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_sc_completion">
				<?php echo form_error('student_q4_sc_completion'); ?>
			</td>
		</tr>			
		
		<tr>
			<td>Internship - Completed</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_lfa_internship_completion">
				<?php echo form_error('student_lfa_internship_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q1_internship_completion">
				<?php echo form_error('student_q1_internship_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q2_internship_completion">
				<?php echo form_error('student_q2_internship_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q3_internship_completion">
				<?php echo form_error('student_q3_internship_completion'); ?>
			</td>
			<td>
				<input class="form-control" value="0" type="number" name="student_q4_internship_completion">
				<?php echo form_error('student_q4_internship_completion'); ?>
			</td>
		</tr>	
		
		</tbody>
	</table>
</form>
</div>
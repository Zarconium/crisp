<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Targets successfully added.</div>';} ?>
<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	

<div class="header">
	<h1>Target Configuration</h1>
</div>
<div class="report-form">
<?php echo form_open('/reports/reportTargetConfigurationQuarterlyAdd'); ?>
	<div class="save">
		<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
		<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
		<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
		<a href="<?php echo base_url('reports'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
	</div>
					
	<legend>General Information</legend>

	<div class="form-group">
		<label>Target Year</label>
		<input class="form-control" type="number" name="target_year" value="<?php echo set_value('target_year'); ?>" min="1990" max="9999">
		<!-- <select class="form-control" name="target_year">
		<?php foreach ($mne_years as $year): ?>
			<option value="<?php echo $year->Year; ?>"><?php echo $year->Year; ?></option>
		<?php endforeach; ?>
		</select> -->
		<?php echo form_error('target_year'); ?>
	</div>
		
	<legend>Teachers Trained</legend>
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
				<input class="form-control" placeholder="0" type="number" name="teacher_lfa_gcat" value="<?php echo set_value('teacher_lfa_gcat'); ?>" min="0">
				<?php echo form_error('teacher_lfa_gcat'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q1_gcat" value="<?php echo set_value('teacher_q1_gcat'); ?>" min="0">
				<?php echo form_error('teacher_q1_gcat'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q2_gcat" value="<?php echo set_value('teacher_q2_gcat'); ?>" min="0">
				<?php echo form_error('teacher_q2_gcat'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q3_gcat" value="<?php echo set_value('teacher_q3_gcat'); ?>" min="0">
				<?php echo form_error('teacher_q3_gcat'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q4_gcat" value="<?php echo set_value('teacher_q4_gcat'); ?>" min="0">
				<?php echo form_error('teacher_q4_gcat'); ?>
			</td>
		</tr>
		
		<tr>
			<td>BEST</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_lfa_best" value="<?php echo set_value('teacher_lfa_best'); ?>" min="0">
				<?php echo form_error('teacher_lfa_best'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q1_best" value="<?php echo set_value('teacher_q1_best'); ?>" min="0">
				<?php echo form_error('teacher_q1_best'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q2_best" value="<?php echo set_value('teacher_q2_best'); ?>" min="0">
				<?php echo form_error('teacher_q2_best'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q3_best" value="<?php echo set_value('teacher_q3_best'); ?>" min="0">
				<?php echo form_error('teacher_q3_best'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q4_best" value="<?php echo set_value('teacher_q4_best'); ?>" min="0">
				<?php echo form_error('teacher_q4_best'); ?>
			</td>
		</tr>
		
		<tr>
			<td>ADEPT</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_lfa_adept" value="<?php echo set_value('teacher_lfa_adept'); ?>" min="0">
				<?php echo form_error('teacher_lfa_adept'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q1_adept" value="<?php echo set_value('teacher_q1_adept'); ?>" min="0">
				<?php echo form_error('teacher_q1_adept'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q2_adept" value="<?php echo set_value('teacher_q2_adept'); ?>" min="0">
				<?php echo form_error('teacher_q2_adept'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q3_adept" value="<?php echo set_value('teacher_q3_adept'); ?>" min="0">
				<?php echo form_error('teacher_q3_adept'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q4_adept" value="<?php echo set_value('teacher_q4_adept'); ?>" min="0">
				<?php echo form_error('teacher_q4_adept'); ?>
			</td>
		</tr>
		
		<tr>
			<td>SMP Subjects</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_lfa_smp" value="<?php echo set_value('teacher_lfa_smp'); ?>" min="0">
				<?php echo form_error('teacher_lfa_smp'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q1_smp" value="<?php echo set_value('teacher_q1_smp'); ?>" min="0">
				<?php echo form_error('teacher_q1_smp'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q2_smp" value="<?php echo set_value('teacher_q2_smp'); ?>" min="0">
				<?php echo form_error('teacher_q2_smp'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q3_smp" value="<?php echo set_value('teacher_q3_smp'); ?>" min="0">
				<?php echo form_error('teacher_q3_smp'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q4_smp" value="<?php echo set_value('teacher_q4_smp'); ?>" min="0">
				<?php echo form_error('teacher_q4_smp'); ?>
			</td>
		</tr>
		
		<tr>
			<td>BPO101</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_lfa_bpo101" value="<?php echo set_value('teacher_lfa_bpo101'); ?>" min="0">
				<?php echo form_error('teacher_lfa_bpo101'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q1_bpo101" value="<?php echo set_value('teacher_q1_bpo101'); ?>" min="0">
				<?php echo form_error('teacher_q1_bpo101'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q2_bpo101" value="<?php echo set_value('teacher_q2_bpo101'); ?>" min="0">
				<?php echo form_error('teacher_q2_bpo101'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q3_bpo101" value="<?php echo set_value('teacher_q3_bpo101'); ?>" min="0">
				<?php echo form_error('teacher_q3_bpo101'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q4_bpo101" value="<?php echo set_value('teacher_q4_bpo101'); ?>" min="0">
				<?php echo form_error('teacher_q4_bpo101'); ?>
			</td>
		</tr>
		
		<tr>
			<td>BPO102</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_lfa_bpo102" value="<?php echo set_value('teacher_lfa_bpo102'); ?>" min="0">
				<?php echo form_error('teacher_lfa_bpo102'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q1_bpo102" value="<?php echo set_value('teacher_q1_bpo102'); ?>" min="0">
				<?php echo form_error('teacher_q1_bpo102'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q2_bpo102" value="<?php echo set_value('teacher_q2_bpo102'); ?>" min="0">
				<?php echo form_error('teacher_q2_bpo102'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q3_bpo102" value="<?php echo set_value('teacher_q3_bpo102'); ?>" min="0">
				<?php echo form_error('teacher_q3_bpo102'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q4_bpo102" value="<?php echo set_value('teacher_q4_bpo102'); ?>" min="0">
				<?php echo form_error('teacher_q4_bpo102'); ?>
			</td>
		</tr>
		
		<tr>
			<td>Service Culture</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_lfa_sc" value="<?php echo set_value('teacher_lfa_sc'); ?>" min="0">
				<?php echo form_error('teacher_lfa_sc'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q1_sc" value="<?php echo set_value('teacher_q1_sc'); ?>" min="0">
				<?php echo form_error('teacher_q1_sc'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q2_sc" value="<?php echo set_value('teacher_q2_sc'); ?>" min="0">
				<?php echo form_error('teacher_q2_sc'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q3_sc" value="<?php echo set_value('teacher_q3_sc'); ?>" min="0">
				<?php echo form_error('teacher_q3_sc'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q4_sc" value="<?php echo set_value('teacher_q4_sc'); ?>" min="0">
				<?php echo form_error('teacher_q4_sc'); ?>
			</td>
		</tr>
		
		<tr>
			<td>Business Communication</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_lfa_bc" value="<?php echo set_value('teacher_lfa_bc'); ?>" min="0">
				<?php echo form_error('teacher_lfa_bc'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q1_bc" value="<?php echo set_value('teacher_q1_bc'); ?>" min="0">
				<?php echo form_error('teacher_q1_bc'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q2_bc" value="<?php echo set_value('teacher_q2_bc'); ?>" min="0">
				<?php echo form_error('teacher_q2_bc'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q3_bc" value="<?php echo set_value('teacher_q3_bc'); ?>" min="0">
				<?php echo form_error('teacher_q3_bc'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q4_bc" value="<?php echo set_value('teacher_q4_bc'); ?>" min="0">
				<?php echo form_error('teacher_q4_bc'); ?>
			</td>
		</tr>
		
		<tr>
			<td>Systems Thinking</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_lfa_st" value="<?php echo set_value('teacher_lfa_st'); ?>" min="0">
				<?php echo form_error('teacher_lfa_st'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q1_st" value="<?php echo set_value('teacher_q1_st'); ?>" min="0">
				<?php echo form_error('teacher_q1_st'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q2_st" value="<?php echo set_value('teacher_q2_st'); ?>" min="0">
				<?php echo form_error('teacher_q2_st'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q3_st" value="<?php echo set_value('teacher_q3_st'); ?>" min="0">
				<?php echo form_error('teacher_q3_st'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q4_st" value="<?php echo set_value('teacher_q4_st'); ?>" min="0">
				<?php echo form_error('teacher_q4_st'); ?>
			</td>
		</tr>
		
		<tr>
			<td>SUCs with complete SMP Subjects and Trained Teachers</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_lfa_suc_smp" value="<?php echo set_value('teacher_lfa_suc_smp'); ?>" min="0">
				<?php echo form_error('teacher_lfa_suc_smp'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q1_suc_smp" value="<?php echo set_value('teacher_q1_suc_smp'); ?>" min="0">
				<?php echo form_error('teacher_q1_suc_smp'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q2_suc_smp" value="<?php echo set_value('teacher_q2_suc_smp'); ?>" min="0">
				<?php echo form_error('teacher_q2_suc_smp'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q3_suc_smp" value="<?php echo set_value('teacher_q3_suc_smp'); ?>" min="0">
				<?php echo form_error('teacher_q3_suc_smp'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="teacher_q4_suc_smp" value="<?php echo set_value('teacher_q4_suc_smp'); ?>" min="0">
				<?php echo form_error('teacher_q4_suc_smp'); ?>
			</td>
		</tr>
		</tbody>
	</table>

	<br/>
	<legend>Students in Programs</legend>
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
				<input class="form-control" placeholder="0" type="number" name="student_lfa_gcat" value="<?php echo set_value('student_lfa_gcat'); ?>" min="0">
				<?php echo form_error('student_lfa_gcat'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_gcat" value="<?php echo set_value('student_q1_gcat'); ?>" min="0">
				<?php echo form_error('student_q1_gcat'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_gcat" value="<?php echo set_value('student_q2_gcat'); ?>" min="0">
				<?php echo form_error('student_q2_gcat'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_gcat" value="<?php echo set_value('student_q3_gcat'); ?>" min="0">
				<?php echo form_error('student_q3_gcat'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_gcat" value="<?php echo set_value('student_q4_gcat'); ?>" min="0">
				<?php echo form_error('student_q4_gcat'); ?>
			</td>
		</tr>
		
		<tr>
			<td>BEST</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_best" value="<?php echo set_value('student_lfa_best'); ?>" min="0">
				<?php echo form_error('student_lfa_best'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_best" value="<?php echo set_value('student_q1_best'); ?>" min="0">
				<?php echo form_error('student_q1_best'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_best" value="<?php echo set_value('student_q2_best'); ?>" min="0">
				<?php echo form_error('student_q2_best'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_best" value="<?php echo set_value('student_q3_best'); ?>" min="0">
				<?php echo form_error('student_q3_best'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_best" value="<?php echo set_value('student_q4_best'); ?>" min="0">
				<?php echo form_error('student_q4_best'); ?>
			</td>
		</tr>
		
		<tr>
			<td>ADEPT</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_adept" value="<?php echo set_value('student_lfa_adept'); ?>" min="0">
				<?php echo form_error('student_lfa_adept'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_adept" value="<?php echo set_value('student_q1_adept'); ?>" min="0">
				<?php echo form_error('student_q1_adept'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_adept" value="<?php echo set_value('student_q2_adept'); ?>" min="0">
				<?php echo form_error('student_q2_adept'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_adept" value="<?php echo set_value('student_q3_adept'); ?>" min="0">
				<?php echo form_error('student_q3_adept'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_adept" value="<?php echo set_value('student_q4_adept'); ?>" min="0">
				<?php echo form_error('student_q4_adept'); ?>
			</td>
		</tr>
		
		<tr>
			<td>SMP Running</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_smp_running" value="<?php echo set_value('student_lfa_smp_running'); ?>" min="0">
				<?php echo form_error('student_lfa_smp_running'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_smp_running" value="<?php echo set_value('student_q1_smp_running'); ?>" min="0">
				<?php echo form_error('student_q1_smp_running'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_smp_running" value="<?php echo set_value('student_q2_smp_running'); ?>" min="0">
				<?php echo form_error('student_q2_smp_running'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_smp_running" value="<?php echo set_value('student_q3_smp_running'); ?>" min="0">
				<?php echo form_error('student_q3_smp_running'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_smp_running" value="<?php echo set_value('student_q4_smp_running'); ?>" min="0">
				<?php echo form_error('student_q4_smp_running'); ?>
			</td>
		</tr>
		
		<tr>
			<td>BPO101 - Enrolled</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_bpo101_enrolled" value="<?php echo set_value('student_lfa_bpo101_enrolled'); ?>" min="0">
				<?php echo form_error('student_lfa_bpo101_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_bpo101_enrolled" value="<?php echo set_value('student_q1_bpo101_enrolled'); ?>" min="0">
				<?php echo form_error('student_q1_bpo101_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_bpo101_enrolled" value="<?php echo set_value('student_q2_bpo101_enrolled'); ?>" min="0">
				<?php echo form_error('student_q2_bpo101_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_bpo101_enrolled" value="<?php echo set_value('student_q3_bpo101_enrolled'); ?>" min="0">
				<?php echo form_error('student_q3_bpo101_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_bpo101_enrolled" value="<?php echo set_value('student_q4_bpo101_enrolled'); ?>" min="0">
				<?php echo form_error('student_q4_bpo101_enrolled'); ?>
			</td>
		</tr>
		
		<tr>
			<td>BPO102 - Enrolled</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_bpo102_enrolled" value="<?php echo set_value('student_lfa_bpo102_enrolled'); ?>" min="0">
				<?php echo form_error('student_lfa_bpo102_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_bpo102_enrolled" value="<?php echo set_value('student_q1_bpo102_enrolled'); ?>" min="0">
				<?php echo form_error('student_q1_bpo102_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_bpo102_enrolled" value="<?php echo set_value('student_q2_bpo102_enrolled'); ?>" min="0">
				<?php echo form_error('student_q2_bpo102_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_bpo102_enrolled" value="<?php echo set_value('student_q3_bpo102_enrolled'); ?>" min="0">
				<?php echo form_error('student_q3_bpo102_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_bpo102_enrolled" value="<?php echo set_value('student_q4_bpo102_enrolled'); ?>" min="0">
				<?php echo form_error('student_q4_bpo102_enrolled'); ?>
			</td>
		</tr>
		
		<tr>
			<td>Service Culture - Enrolled</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_sc_enrolled" value="<?php echo set_value('student_lfa_sc_enrolled'); ?>" min="0">
				<?php echo form_error('student_lfa_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_sc_enrolled" value="<?php echo set_value('student_q1_sc_enrolled'); ?>" min="0">
				<?php echo form_error('student_q1_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_sc_enrolled" value="<?php echo set_value('student_q2_sc_enrolled'); ?>" min="0">
				<?php echo form_error('student_q2_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_sc_enrolled" value="<?php echo set_value('student_q3_sc_enrolled'); ?>" min="0">
				<?php echo form_error('student_q3_sc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_sc_enrolled" value="<?php echo set_value('student_q4_sc_enrolled'); ?>" min="0">
				<?php echo form_error('student_q4_sc_enrolled'); ?>
			</td>
		</tr>
		
		<tr>
			<td>Business Communication - Enrolled</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_bc_enrolled" value="<?php echo set_value('student_lfa_bc_enrolled'); ?>" min="0">
				<?php echo form_error('student_lfa_bc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_bc_enrolled" value="<?php echo set_value('student_q1_bc_enrolled'); ?>" min="0">
				<?php echo form_error('student_q1_bc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_bc_enrolled" value="<?php echo set_value('student_q2_bc_enrolled'); ?>" min="0">
				<?php echo form_error('student_q2_bc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_bc_enrolled" value="<?php echo set_value('student_q3_bc_enrolled'); ?>" min="0">
				<?php echo form_error('student_q3_bc_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_bc_enrolled" value="<?php echo set_value('student_q4_bc_enrolled'); ?>" min="0">
				<?php echo form_error('student_q4_bc_enrolled'); ?>
			</td>
		</tr>
		
		<tr>
			<td>Systems Thinking - Enrolled</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_st_enrolled" value="<?php echo set_value('student_lfa_st_enrolled'); ?>" min="0">
				<?php echo form_error('student_lfa_st_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_st_enrolled" value="<?php echo set_value('student_q1_st_enrolled'); ?>" min="0">
				<?php echo form_error('student_q1_st_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_st_enrolled" value="<?php echo set_value('student_q2_st_enrolled'); ?>" min="0">
				<?php echo form_error('student_q2_st_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_st_enrolled" value="<?php echo set_value('student_q3_st_enrolled'); ?>" min="0">
				<?php echo form_error('student_q3_st_enrolled'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_st_enrolled" value="<?php echo set_value('student_q4_st_enrolled'); ?>" min="0">
				<?php echo form_error('student_q4_st_enrolled'); ?>
			</td>
		</tr>
		
		<tr>
			<td>SMP Completion</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_smp_completion" value="<?php echo set_value('student_lfa_smp_completion'); ?>" min="0">
				<?php echo form_error('student_lfa_smp_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_smp_completion" value="<?php echo set_value('student_q1_smp_completion'); ?>" min="0">
				<?php echo form_error('student_q1_smp_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_smp_completion" value="<?php echo set_value('student_q2_smp_completion'); ?>" min="0">
				<?php echo form_error('student_q2_smp_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_smp_completion" value="<?php echo set_value('student_q3_smp_completion'); ?>" min="0">
				<?php echo form_error('student_q3_smp_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_smp_completion" value="<?php echo set_value('student_q4_smp_completion'); ?>" min="0">
				<?php echo form_error('student_q4_smp_completion'); ?>
			</td>
		</tr>
		
		<tr>
			<td>BPO101 - Completed</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_bpo101_completion" value="<?php echo set_value('student_lfa_bpo101_completion'); ?>" min="0">
				<?php echo form_error('student_lfa_bpo101_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_bpo101_completion" value="<?php echo set_value('student_q1_bpo101_completion'); ?>" min="0">
				<?php echo form_error('student_q1_bpo101_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_bpo101_completion" value="<?php echo set_value('student_q2_bpo101_completion'); ?>" min="0">
				<?php echo form_error('student_q2_bpo101_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_bpo101_completion" value="<?php echo set_value('student_q3_bpo101_completion'); ?>" min="0">
				<?php echo form_error('student_q3_bpo101_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_bpo101_completion" value="<?php echo set_value('student_q4_bpo101_completion'); ?>" min="0">
				<?php echo form_error('student_q4_bpo101_completion'); ?>
			</td>
		</tr>
		
		<tr>
			<td>BPO102 - Completed</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_bpo102_completion" value="<?php echo set_value('student_lfa_bpo102_completion'); ?>" min="0">
				<?php echo form_error('student_lfa_bpo102_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_bpo102_completion" value="<?php echo set_value('student_q1_bpo102_completion'); ?>" min="0">
				<?php echo form_error('student_q1_bpo102_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_bpo102_completion" value="<?php echo set_value('student_q2_bpo102_completion'); ?>" min="0">
				<?php echo form_error('student_q2_bpo102_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_bpo102_completion" value="<?php echo set_value('student_q3_bpo102_completion'); ?>" min="0">
				<?php echo form_error('student_q3_bpo102_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_bpo102_completion" value="<?php echo set_value('student_q4_bpo102_completion'); ?>" min="0">
				<?php echo form_error('student_q4_bpo102_completion'); ?>
			</td>
		</tr>
		
		<tr>
			<td>Service Culture - Completed</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_sc_completion" value="<?php echo set_value('student_lfa_sc_completion'); ?>" min="0">
				<?php echo form_error('student_lfa_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_sc_completion" value="<?php echo set_value('student_q1_sc_completion'); ?>" min="0">
				<?php echo form_error('student_q1_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_sc_completion" value="<?php echo set_value('student_q2_sc_completion'); ?>" min="0">
				<?php echo form_error('student_q2_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_sc_completion" value="<?php echo set_value('student_q3_sc_completion'); ?>" min="0">
				<?php echo form_error('student_q3_sc_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_sc_completion" value="<?php echo set_value('student_q4_sc_completion'); ?>" min="0">
				<?php echo form_error('student_q4_sc_completion'); ?>
			</td>
		</tr>
		
		<tr>
			<td>Business Communication - Completed</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_bc_completion" value="<?php echo set_value('student_lfa_bc_completion'); ?>" min="0">
				<?php echo form_error('student_lfa_bc_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_bc_completion" value="<?php echo set_value('student_q1_bc_completion'); ?>" min="0">
				<?php echo form_error('student_q1_bc_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_bc_completion" value="<?php echo set_value('student_q2_bc_completion'); ?>" min="0">
				<?php echo form_error('student_q2_bc_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_bc_completion" value="<?php echo set_value('student_q3_bc_completion'); ?>" min="0">
				<?php echo form_error('student_q3_bc_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_bc_completion" value="<?php echo set_value('student_q4_bc_completion'); ?>" min="0">
				<?php echo form_error('student_q4_bc_completion'); ?>
			</td>
		</tr>
		
		<tr>
			<td>Systems Thinking - Completed</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_st_completion" value="<?php echo set_value('student_lfa_st_completion'); ?>" min="0">
				<?php echo form_error('student_lfa_st_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_st_completion" value="<?php echo set_value('student_q1_st_completion'); ?>" min="0">
				<?php echo form_error('student_q1_st_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_st_completion" value="<?php echo set_value('student_q2_st_completion'); ?>" min="0">
				<?php echo form_error('student_q2_st_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_st_completion" value="<?php echo set_value('student_q3_st_completion'); ?>" min="0">
				<?php echo form_error('student_q3_st_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_st_completion" value="<?php echo set_value('student_q4_st_completion'); ?>" min="0">
				<?php echo form_error('student_q4_st_completion'); ?>
			</td>
		</tr>
		
		<tr>
			<td>Internship - Completed</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_lfa_internship_completion" value="<?php echo set_value('student_lfa_internship_completion'); ?>" min="0">
				<?php echo form_error('student_lfa_internship_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q1_internship_completion" value="<?php echo set_value('student_q1_internship_completion'); ?>" min="0">
				<?php echo form_error('student_q1_internship_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q2_internship_completion" value="<?php echo set_value('student_q2_internship_completion'); ?>" min="0">
				<?php echo form_error('student_q2_internship_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q3_internship_completion" value="<?php echo set_value('student_q3_internship_completion'); ?>" min="0">
				<?php echo form_error('student_q3_internship_completion'); ?>
			</td>
			<td>
				<input class="form-control" placeholder="0" type="number" name="student_q4_internship_completion" value="<?php echo set_value('student_q4_internship_completion'); ?>" min="0">
				<?php echo form_error('student_q4_internship_completion'); ?>
			</td>
		</tr>
		</tbody>
	</table>
</form>
</div>
<br/>
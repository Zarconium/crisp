<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>BEST T3 Tracker successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>

	<h1>BEST T3 Tracker</h1>

	<?php echo form_open('/dbms/form_program_t3_best_tracker/' . $best_teacher->Teacher_ID); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<legend>Personal Information</legend>

		<input type="hidden" class="form-control" name="code" value="<?php if ($best_teacher->Code) echo $best_teacher->Code; ?>">
		<?php echo form_error('code'); ?>
	
		<div class="form-inline">
			<div class="form-group">
				<label>Name</label>
				<input class="form-control" type="text" name="last_name" value="<?php if ($best_teacher->Full_Name) echo $best_teacher->Full_Name; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>School</label>
				<select class="form-control" name="school" disabled="true">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID ?>" <?php if ($best_teacher->School_ID == $school->School_ID) echo 'selected="selected"';?>><?php echo $school->Name . " - " . $school->Branch ?></option>
				<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label>Birthdate</label>
				<input class="form-control" type="date" name="birthdate" value="<?php if ($best_teacher->Birthdate) echo date('Y-m-d', strtotime($best_teacher->Birthdate)); ?>" readonly="true">
			</div>

			<legend>Submitted Documents</legend>

			<div class="form-group">
				<label>Contract</label><br/>
					<input type="radio" name="contract" value="1" <?php if ($best_teacher->Contract == 1) echo 'checked="checked"'; ?>> Yes
					<input type="radio" name="contract" value="0" <?php if ($best_teacher->Contract == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('contract'); ?>
			</div><br/>

			<div class="form-group">
				<label>Interview Form</label><br/>
				<input type="radio" name="interview_form" value="1" <?php if ($best_teacher->Interview_Form == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="interview_form" value="0" <?php if ($best_teacher->Interview_Form == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('interview_form'); ?>
			</div><br/>

			<div class="form-group">
				<label>Site Visit Form</label><br/>
				<input type="radio" name="site_visit_form" value="1" <?php if ($best_teacher->Site_Visit_Form == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="site_visit_form" value="0" <?php if ($best_teacher->Site_Visit_Form == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('site_visit_form'); ?>
			</div><br/>

			<div class="form-group">
				<label>BEST E-Learning Feedback</label><br/>
				<input type="radio" name="best_elearning_feedback" value="1" <?php if ($best_teacher->Best_ELearning_Feedback == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="best_elearning_feedback" value="0" <?php if ($best_teacher->Best_ELearning_Feedback == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('best_elearning_feedback'); ?>
			</div><br/>

			<div class="form-group">
				<label>BEST T3 Feedback</label><br/>
				<input type="radio" name="best_t3_feedback" value="1" <?php if ($best_teacher->Best_T3_Feedback == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="best_t3_feedback" value="0" <?php if ($best_teacher->Best_T3_Feedback == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('best_t3_feedback'); ?>
			</div><br/>

			<div class="form-group">
				<label>BEST CD</label><br/>
				<input type="radio" name="cd" value="1" <?php if ($best_teacher->Best_CD == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="cd" value="0" <?php if ($best_teacher->Best_CD == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('cd'); ?>
			</div><br/>

			<div class="form-group">
				<label>Certificate of Attendance</label><br/>
				<input type="radio" name="certificate_of_attendance" value="1" <?php if ($best_teacher->Certificate_Of_Attendance == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="certificate_of_attendance" value="0" <?php if ($best_teacher->Certificate_Of_Attendance == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('certificate_of_attendance'); ?>
			</div><br/>

			<div class="form-group">
				<label>BEST Certified Trainers</label><br/>
				<input type="radio" name="certified_trainers" value="1" <?php if ($best_teacher->Best_Certified_Trainers == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="certified_trainers" value="0" <?php if ($best_teacher->Best_Certified_Trainers == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('certified_trainers'); ?>
			</div><br/>

			<legend>Grade of Tasks</legend>

			<div class="form-group">
				<label>Task 1</label>
				<input class="form-control" type="text" name="task_1" value="<?php if ($best_teacher->Task_1) echo $best_teacher->Task_1; ?>">
				<?php echo form_error('task_1'); ?>	
			</div>

			<div class="form-group">
				<label>Task 2</label>
				<input class="form-control" type="text" name="task_2" value="<?php if ($best_teacher->Task_2) echo $best_teacher->Task_2; ?>">
				<?php echo form_error('task_2'); ?>	
			</div>

			<div class="form-group">
				<label>Task 3</label>
				<input class="form-control" type="text" name="task_3" value="<?php if ($best_teacher->Task_3) echo $best_teacher->Task_3; ?>">
				<?php echo form_error('task_3'); ?>	
			</div>

			<div class="form-group">
				<label>Task 4</label>
				<input class="form-control" type="text" name="task_4" value="<?php if ($best_teacher->Task_4) echo $best_teacher->Task_4; ?>">
				<?php echo form_error('task_4'); ?>	
			</div>
		</div>

		<div class="form">
			<legend>Miscellaneous</legend>

			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="status">
				<?php foreach ($statuses as $status): ?>
					<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($best_teacher->Status_ID)) if ($status->Status_ID == $best_teacher->Status_ID) echo 'selected="selected"'; ?>><?php echo $status->Name; ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('status'); ?>
			</div>

			<div class="form-group">
				<label>Remarks</label>
				<input class="form-control" type="text" name="remarks" value="<?php if ($best_teacher->Remarks) echo $best_teacher->Remarks; ?>">
				<?php echo form_error('remarks'); ?>
			</div>
		</div>
	</form>
</div>
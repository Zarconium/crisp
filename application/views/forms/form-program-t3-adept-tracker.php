<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>AdEPT T3 Tracker successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>

	<h1>AdEPT T3 Tracker</h1>

	<?php echo form_open('/dbms/form_program_t3_adept_tracker/' . $adept_teacher->Teacher_ID); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<legend>Personal Information</legend>

		<input type="hidden" class="form-control" name="code" value="<?php if ($adept_teacher->Code) echo $adept_teacher->Code; ?>">
		<?php echo form_error('code'); ?>

		<div class="form-inline">
			<div class="form-group">
				<label>Name</label>
				<input class="form-control" type="text" name="last_name" value="<?php if ($adept_teacher->Full_Name) echo $adept_teacher->Full_Name; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>School</label>
				<select class="form-control" name="school" disabled="true">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID ?>" <?php if ($adept_teacher->School_ID == $school->School_ID) echo 'selected="selected"';?>><?php echo $school->Name . " - " . $school->Branch ?></option>
				<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label>Birthdate</label>
				<input class="form-control" type="date" name="birthdate" value="<?php if ($adept_teacher->Birthdate) echo date('Y-m-d', strtotime($adept_teacher->Birthdate)); ?>" readonly="true">
			</div>

			<legend>Submitted Documents</legend>

			<div class="form-group">
				<label>Contract</label><br/>
					<input type="radio" name="contract" value="1" <?php if ($adept_teacher->Contract == 1) echo 'checked="checked"'; ?>> Yes
					<input type="radio" name="contract" value="0" <?php if ($adept_teacher->Contract == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('contract'); ?>
			</div><br/>

			<div class="form-group">
				<label>Interview Form</label><br/>
				<input type="radio" name="interview_form" value="1" <?php if ($adept_teacher->Interview_Form == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="interview_form" value="0" <?php if ($adept_teacher->Interview_Form == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('interview_form'); ?>
			</div><br/>

			<div class="form-group">
				<label>Site Visit Form</label><br/>
				<input type="radio" name="site_visit_form" value="1" <?php if ($adept_teacher->Site_Visit_Form == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="site_visit_form" value="0" <?php if ($adept_teacher->Site_Visit_Form == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('site_visit_form'); ?>
			</div><br/>

			<div class="form-group">
				<label>AdEPT E-Learning Feedback</label><br/>
				<input type="radio" name="adept_elearning_feedback" value="1" <?php if ($adept_teacher->Adept_ELearning_Feedback == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="adept_elearning_feedback" value="0" <?php if ($adept_teacher->Adept_ELearning_Feedback == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('adept_elearning_feedback'); ?>
			</div><br/>

			<div class="form-group">
				<label>AdEPT T3 Feedback</label><br/>
				<input type="radio" name="adept_t3_feedback" value="1" <?php if ($adept_teacher->Adept_T3_Feedback == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="adept_t3_feedback" value="0" <?php if ($adept_teacher->Adept_T3_Feedback == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('adept_t3_feedback'); ?>
			</div><br/>

			<div class="form-group">
				<label>Manual &amp; Kit</label><br/>
				<input type="radio" name="manual_and_kit" value="1" <?php if ($adept_teacher->Manual_and_Kit == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="manual_and_kit" value="0" <?php if ($adept_teacher->Manual_and_Kit == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('manual_and_kit'); ?>
			</div><br/>

			<div class="form-group">
				<label>Certificate of Attendance</label><br/>
				<input type="radio" name="certificate_of_attendance" value="1" <?php if ($adept_teacher->Certificate_Of_Attendance == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="certificate_of_attendance" value="0" <?php if ($adept_teacher->Certificate_Of_Attendance == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('certificate_of_attendance'); ?>
			</div><br/>

			<div class="form-group">
				<label>AdEPT Certified Trainers</label><br/>
				<input type="radio" name="certified_trainers" value="1" <?php if ($adept_teacher->Adept_Certified_Trainers == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="certified_trainers" value="0" <?php if ($adept_teacher->Adept_Certified_Trainers == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('certified_trainers'); ?>
			</div><br/>

			<legend>Grade of Tasks</legend>

			<div class="form-group">
				<label>Lesson Plan</label>
				<input class="form-control" type="text" name="lesson_plan" value="<?php if ($adept_teacher->Lesson_Plan) echo $adept_teacher->Lesson_Plan; ?>">
				<?php echo form_error('lesson_plan'); ?>	
			</div>

			<div class="form-group">
				<label>Demo</label>
				<input class="form-control" type="text" name="demo" value="<?php if ($adept_teacher->Demo) echo $adept_teacher->Demo; ?>">
				<?php echo form_error('demo'); ?>	
			</div>

			<div class="form-group">
				<label>Total Weighted</label>
				<input class="form-control" type="text" name="total_weighted" value="<?php if ($adept_teacher->Total_Weighted) echo $adept_teacher->Total_Weighted; ?>">
				<?php echo form_error('total_weighted'); ?>	
			</div>

			<div class="form-group">
				<label>Training Portfolio</label>
				<input class="form-control" type="text" name="training_portfolio" value="<?php if ($adept_teacher->Training_Portfolio) echo $adept_teacher->Training_Portfolio; ?>">
				<?php echo form_error('training_portfolio'); ?>	
			</div>
		</div>

		<div class="form">
			<legend>Miscellaneous</legend>

			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="status">
				<?php foreach ($statuses as $status): ?>
					<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($adept_teacher->Status_ID)) if ($status->Status_ID == $adept_teacher->Status_ID) echo 'selected="selected"'; ?>><?php echo $status->Name; ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('status'); ?>
			</div>

			<div class="form-group">
				<label>Remarks</label>
				<input class="form-control" type="text" name="remarks" value="<?php if ($adept_teacher->Remarks) echo $adept_teacher->Remarks; ?>">
				<?php echo form_error('remarks'); ?>
			</div>
		</div>
	</form>
</div>
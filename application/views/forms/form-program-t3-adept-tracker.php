<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student successfully added.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>

	<h1>ADEPT T3 Tracker</h1>
	<?php echo form_open('/dbms/form_program_t3_adept_tracker'); ?>
		<!-- BUTTONS DIV -->
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		
	<legend>Personal Information</legend>
<div class="form-inline">
	<form>

	<div class="form-group">
		<label>Last Name</label>
		<input class="form-control" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>">		
		<?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
	</div>
	<div class="form-group">
		<label>First Name</label>
		<input class="form-control" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>">		
		<?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>	
	</div>
	<div class="form-group">
		<label>Middle Initial</label>
		<input class="form-control" type="text" name="middle_initial" value="<?php echo set_value('middle_initial'); ?>">		
		<?php echo form_error('middle_initial', '<div class="text-danger">', '</div>'); ?>	
	</div>
	<div class="form-group">
		<label>School</label>
		<input class="form-control" type="text" name="school" value="<?php echo set_value('school'); ?>">		
		<?php echo form_error('school', '<div class="text-danger">', '</div>'); ?>	
	
	</div>
	<div class="form-group">
		<label>Birthday</label>
		<input class="form-control" type="date" name="birthday" value="<?php echo set_value('birthday'); ?>">		
		<?php echo form_error('birthday', '<div class="text-danger">', '</div>'); ?>
	
	</div>
	<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-control">
			<option value="passed"> Passed
			<option value="failed"> Failed
			<option value="complete"> Complete
			<option value="incomplete"> Incomplete
			<option value="dropped"> Dropped
		</select>
		<?php echo form_error('status', '<div class="text-danger">', '</div>'); ?>
	
	</div>
	<legend>Submitted Documents</legend>
	<div class="form-group"></label>
		<label>Contract</label><br/>
			<input type="radio" name="contract" value="yes"> Yes
			<input type="radio" name="contract" value="no"> No
		<?php echo form_error('contract', '<div class="text-danger">', '</div>'); ?>
	</div><br/>
	<div class="form-group">
		<label>Interview Form</label><br/>
		<input type="radio" name="interview_form" value="yes"> Yes
		<input type="radio" name="interview_form" value="no"> No
		<?php echo form_error('interview_form', '<div class="text-danger">', '</div>'); ?>
	</div><br/>
	<div class="form-group">
		<label>Site Visit Form</label><br/>
		<input type="radio" name="site_visit_form" value="yes"> Yes
		<input type="radio" name="site_visit_form" value="no"> No
		<?php echo form_error('', '<div class="text-danger">', '</div>'); ?>
	
	</div><br/>
	<div class="form-group">
		<label>Adept E-Learning Feedback</label><br/>
		<input type="radio" name="adept_elearning_feedback" value="yes"> Yes
		<input type="radio" name="adept_elearning_feedback" value="no"> No
		<?php echo form_error('adept_elearning_feedback', '<div class="text-danger">', '</div>'); ?>
	</div><br/>
	<div class="form-group">
		<label>Adept T3 Feedback</label><br/>
		<input type="radio" name="adept_t3_feedback" value="yes"> Yes
		<input type="radio" name="adept_t3_feedback" value="no"> No
		<?php echo form_error('adept_t3_feedback', '<div class="text-danger">', '</div>'); ?>
	
	</div><br/>
	<div class="form-group">
		<label>Manual and Kit</label><br/>
		<input type="radio" name="manual_kit" value="yes"> Yes
		<input type="radio" name="manual_kit" value="no"> No
		<?php echo form_error('manual_kit', '<div class="text-danger">', '</div>'); ?>
	
	</div><br/>
	<div class="form-group">
		<label>Certificate of Attendance</label><br/>
		<input type="radio" name="certificate_attendance" value="yes"> Yes
		<input type="radio" name="certificate_attendance" value="no"> No
		<?php echo form_error('certificate_attendance', '<div class="text-danger">', '</div>'); ?>
	
	</div><br/>
	<div class="form-group">
		<label>Adept Certified Trainers</label><br/>
		<input type="radio" name="certificatied_trainers" value="yes"> Yes
		<input type="radio" name="certificatied_trainers" value="no"> No
	
	</div>
	<legend>Grade of Tasks</legend>
	<div class="form-group">
		<label>Lesson Plan	Demo</label><br/>
		<input class="form-control" type="number" name="lesson_plan_demo" value="<?php echo set_value('lesson_plan'); ?>">		
		<?php echo form_error('lesson_plan', '<div class="text-danger">', '</div>'); ?>	
	
	</div>
	<div class="form-group">
		<label>Total Weighted</label><br/>
		<input class="form-control" type="number" name="total_weighted" value="<?php echo set_value('total_weighted'); ?>">		
		<?php echo form_error('total_weighted', '<div class="text-danger">', '</div>'); ?>	
	
	</div>
	<div class="form-group">
		<label>Training Portfolio</label><br/>
		<input class="form-control" type="number" name="training_portfolio" value="<?php echo set_value('training_portfolio'); ?>">		
		<?php echo form_error('training_portfolio', '<div class="text-danger">', '</div>'); ?>	
	
	</div>
	<legend>Miscellaneous</legend>
	<div class="form-group">
		<label>Remarks</label><br/>
		<input class="form-control" type="text" name="remarks" value="<?php echo set_value('remarks'); ?>">		
		<?php echo form_error('remarks', '<div class="text-danger">', '</div>'); ?>
	</div>
</form>
</div>
</div>
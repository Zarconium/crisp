<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Proctor successfully added.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	

	<h1>GCAT Student Tracker</h1>
	
	<?php echo form_open('/dbms/form_program_gcat_tracker'); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<legend>Student Information</legend>
		<form class="form" role="form">
	
			<div class="form-group">		
				<label>Last Name</label>			
				<input class="form-control" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>">
				<?php echo form_error('last_name'); ?>
			</div>
			
			<div class="form-group">
				<label>First Name</label>
				<input class="form-control" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>">
				<?php echo form_error('first_name'); ?>
			</div>
			
			<div class="form-group">
				<label>Middle Initial</label>
				<input class="form-control" type="text" name="middle_initial" value="<?php echo set_value('middle_initial'); ?>">
				<?php echo form_error('middle_initial'); ?>
			</div>
			
			<div class="form-group">
				<label>Session ID</label><br/>
				<input class="form-control" type="text" name="session_id" value="<?php echo set_value('session_id'); ?>">
				<?php echo form_error('session_id'); ?>
			</div>
			
			<div class="form-group">
				<label>Test Date</label><br/>
				<input class="form-control" type="date" name="test_date" value="<?php echo set_value('test_date'); ?>">
				<?php echo form_error('test_date'); ?>
			</div>		

			<div class="form-group">		
				<label>Status</label><br />
				<select class="form-control" name="status" value="<?php echo set_value('status'); ?>">
					<option value="pass">Pass</option>
					<option value="fail">Fail</option>
					<option value="incomplete">Incomplete</option>
					<option value="dropped">Dropped</option>
					<option value="taking">Currently Taking</option>
				</select>
				<?php echo form_error('status'); ?>							
			</div>	
			
			<div class="form-group">
				<label>Remarks</label><br/>
				<input class="form-control" type="text" name="remarks" value="<?php echo set_value('remarks'); ?>">
				<?php echo form_error('remarks'); ?>
			</div>		

				
			<div class="form-group">
				<label>School</label>
				<select class="form-control" name="school">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID; ?>" <?php echo set_select('school', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('school'); ?>
			</div>


		</form>


				
</div>
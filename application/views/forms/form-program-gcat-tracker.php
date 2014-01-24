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
				<label>Proctor</label>
				<select class="form-control" name="proctor">
				<?php foreach ($proctors as $proctor): ?>
					<option value="<?php echo $proctor->Proctor_ID; ?>" <?php echo set_select('proctor', $proctor->Proctor_ID); ?>><?php echo $proctor->Full_Name; ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('proctor'); ?>
			</div>

	
			<div class="form-group">		
				<label>Last Name</label>			
				<input class="form-control" type="text" id="lname">
			</div>
			
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" id="fname">
			</div>
			
			<div class="form-group">
				<label>Middle Initial</label>
				<input type="text" class="form-control" id="mname">
			</div>
			
			<div class="form-group">
				<label>Session ID</label><br/>
				<input type="text" class="form-control" id="session_id">
			</div>
			
			<div class="form-group">
				<label>Test Date</label><br/>
				<input type="date" class="form-control" id="test_date"> 
			</div>		

			<div class="form-group">
				<label>Status</label>
				<select id="status" class="form-control">
					<option value="passed">Passed</option>
					<option value="failed">Failed</option>
					<option value="incomplete">Incomplete</option>
					<option value="completed">Completed</option>
					<option value="dropped">Dropped</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Remarks</label><br/>
				<input type="text" class="form-control" id="remarks"> 
			</div>		

			<div class="submit-button">
				<button class="btn btn-primary" name="submit">Add to List</button>
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

			<div class="form-group">
				<label>Semester</label>
				<input class="form-control" type="text" name="semester" value="<?php echo set_value('semester'); ?>" />
				<?php echo form_error('semester'); ?>
			</div>

			<div class="form-group">
				<label>Year Level</label>
				<input class="form-control" type="number" name="year" min="1" value="<?php echo set_value('year'); ?>" />
				<?php echo form_error('year'); ?>
			</div>

			<div class="form-group">
				<label>Section</label>
				<input class="form-control" type="text" name="section" value="<?php echo set_value('section'); ?>" />
				<?php echo form_error('section'); ?>
			</div>
			


		</form>


				
</div>
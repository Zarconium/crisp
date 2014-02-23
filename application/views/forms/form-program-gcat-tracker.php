<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>GCAT Tracker successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	

	<h1>GCAT Student Tracker</h1>
	
	<?php echo form_open('/dbms/form_program_gcat_tracker/' . $gcat_student->Student_ID); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<legend>General Information</legend>

		<input type="hidden" class="form-control" name="code" value="<?php if ($gcat_student->Code) echo $gcat_student->Code; ?>">
		<?php echo form_error('code'); ?>
	
		<div class="form-inline">
			<div class="form-group">
				<label>ID Number</label>
				<input class="form-control" type="text" name="id_number" value="<?php if ($gcat_student->Student_ID_Number) echo $gcat_student->Student_ID_Number; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>Name</label>
				<input class="form-control" type="text" name="last_name" value="<?php if ($gcat_student->Full_Name) echo $gcat_student->Full_Name; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>School</label>
				<select class="form-control" name="school" disabled="true">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID ?>" <?php if ($gcat_student->School_ID == $school->School_ID) echo 'selected="selected"'; ?>><?php echo $school->Name . " - " . $school->Branch ?></option>
				<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label>Year</label>
				<input type="text" class="form-control" name="year" value="<?php if($gcat_student->Year) echo $gcat_student->Year; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>Course</label>
				<input type="text" class="form-control" name="course" value="<?php if($gcat_student->Course) echo $gcat_student->Course; ?>" readonly="true">
			</div>
		</div>

		<div class="form">
			<legend>GCAT</legend>
			
			<div class="form-group">
				<label>Session ID</label><br/>
				<input class="form-control" type="text" name="session_id" value="<?php if ($gcat_student->Session_ID) echo $gcat_student->Session_ID; ?>">
				<?php echo form_error('session_id'); ?>
			</div>
			
			<div class="form-group">
				<label>Test Date</label><br/>
				<input class="form-control" type="date" name="test_date" value="<?php if ($gcat_student->Test_Date) echo date('Y-m-d', strtotime($gcat_student->Test_Date)); ?>">
				<?php echo form_error('test_date'); ?>
			</div>

			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="status">
				<?php foreach ($statuses as $status): ?>
					<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($gcat_student->Status_ID)) if ($status->Status_ID == $gcat_student->Status_ID) echo 'selected="selected"'; ?>><?php echo $status->Name; ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('status'); ?>
			</div>

			<div class="form-group">
				<label>Remarks</label>
				<input class="form-control" type="text" name="remarks" value="<?php if ($gcat_student->Remarks) echo $gcat_student->Remarks; ?>">
				<?php echo form_error('remarks'); ?>
			</div>
		</div>
	</form>
</div>
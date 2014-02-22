<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>SMP Internship Tracker successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	

	<h1>SMP Internship Tracker</h1>

	<?php echo form_open('/dbms/form_program_smp_tracker/' . $internship->Student_ID); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<legend>General Information</legend>
		
		<div class="form-inline">
			<div class="form-group">
				<label>ID Number</label>
				<input type="text" class="form-control" name="id_number" value="<?php if ($internship->Student_ID_Number) echo $internship->Student_ID_Number; ?>" readonly="true">
			</div>
					
			<div class="form-group">		
				<label>Name</label>			
				<input class="form-control" type="text" name="name" value="<?php if ($internship->Full_Name) echo $internship->Full_Name; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>School</label>
				<select class="form-control" name="school" disabled="true">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID ?>" <?php if ($internship->School_ID == $school->School_ID) echo 'selected="selected"';?>><?php echo $school->Name . " - " . $school->Branch ?></option>
				<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label>Year</label>
				<input type="text" class="form-control" name="year" value="<?php if($internship->Year) echo $internship->Year; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>Course</label>
				<input type="text" class="form-control" name="course" value="<?php if($internship->Course) echo $internship->Course; ?>" readonly="true">
			</div>

			<legend>Internship</legend>

			<div class="form-group">
				<label>Status</label><br />
				<select class="form-control" name="intern_stat" value="<?php if ($internship->Student_ID_Number) echo $internship->Student_ID_Number; ?>">
				<?php foreach ($statuses as $status): ?>
					<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($internship->Status_ID)) if ($status->Status_ID == $internship->Status_ID) echo 'selected="selected"'; ?>><?php echo $status->Name; ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('intern_stat'); ?>
			</div>

			<div class="form-group">
				<label>Remarks</label>
				<input class="form-control" type="text" name="remarks" value="<?php if ($internship->Remarks) echo $internship->Remarks; ?>">
				<?php echo form_error('remarks'); ?>
			</div>

			<div class="form-group">
				<label>Company Information</label>
				<input class="form-control" type="text" name="company_information" value="<?php if ($internship->Company_Information) echo $internship->Company_Information; ?>">
				<?php echo form_error('company_information'); ?>
			</div>

			<div class="form-group">
				<label>Company Address</label>
				<input class="form-control" type="text" name="company_address" value="<?php if ($internship->Company_Address) echo $internship->Company_Address; ?>">
				<?php echo form_error('company_address'); ?>
			</div>

			<div class="form-group">
				<label>Department / Divison</label>
				<input class="form-control" type="text" name="department" value="<?php if ($internship->Task) echo $internship->Task; ?>">
				<?php echo form_error('department'); ?>
			</div>

			<div class="form-group">
				<label>Supervisor / Mentor</label>
				<input class="form-control" type="text" name="supervisor" value="<?php if ($internship->Supervisor_Name) echo $internship->Supervisor_Name; ?>">
				<?php echo form_error('supervisor'); ?>
			</div>

			<div class="form-group">
				<label>Supervisor's Contact Details</label>
				<input class="form-control" type="text" name="supervisor_contact_details" value="<?php if ($internship->Supervisor_Contact) echo $internship->Supervisor_Contact; ?>">
				<?php echo form_error('supervisor_contact_details'); ?>
			</div>

			<div class="form-group">
				<label>Date Started</label>
				<input class="form-control" type="date" name="start_date" value="<?php if ($internship->Start_Date) echo date('Y-m-d', strtotime($internship->Start_Date)); ?>">
				<?php echo form_error('start_date'); ?>
			</div>

			<div class="form-group">
				<label>Date Ended</label>
				<input class="form-control" type="date" name="end_date" value="<?php if ($internship->End_Date) echo date('Y-m-d', strtotime($internship->End_Date)); ?>">
				<?php echo form_error('end_date'); ?>
			</div>

			<div class="form-group">
				<label>Total Internship Hours</label>
				<input class="form-control" type="number" name="total_internship_hours" value="<?php if ($internship->Total_Work_Hours) echo $internship->Total_Work_Hours; ?>">
				<?php echo form_error('total_internship_hours'); ?>
			</div>

			<div class="form-group">
				<label>Evaluation Form</label><br />
				<input type="radio" name="evaluation_form" value="1" <?php if ($internship->Meet_Standards == 1) echo 'selected="selected"'; ?>> Yes
				<input type="radio" name="evaluation_form" value="0" <?php if ($internship->Meet_Standards == 0) echo 'selected="selected"'; ?>> No
				<?php echo form_error('evaluation_form'); ?>
			</div>
		</div>
	</form>
</div>
<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>BEST Tracker successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>

	<h1>BEST Product Tracker Encoder</h1>

	<?php echo form_open('/dbms/form_program_best_tracker/' . $best_student->Student_ID); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<legend>General Information</legend>

		<input type="hidden" class="form-control" name="code" value="<?php if ($best_student->Code) echo $best_student->Code; ?>">
		<?php echo form_error('code'); ?>
		
		<div class="form-inline">
			<div class="form-group">		
				<label>ID Number</label>			
				<input class="form-control" type="text" name="id_number" value="<?php if ($best_student->Student_ID_Number) echo $best_student->Student_ID_Number; ?>" readonly="true">
			</div>
			
			<div class="form-group">
				<label>Name</label>
				<input class="form-control" type="text" name="name" value="<?php if ($best_student->Full_Name) echo $best_student->Full_Name; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>School</label>
				<select class="form-control" name="school" disabled="true">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID ?>" <?php if ($best_student->School_ID == $school->School_ID) echo 'selected="selected"';?>><?php echo $school->Name . " - " . $school->Branch ?></option>
				<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label>Year</label>
				<input type="text" class="form-control" name="year" value="<?php if($best_student->Year) echo $best_student->Year; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>Course</label>
				<input type="text" class="form-control" name="course" value="<?php if($best_student->Course) echo $best_student->Course; ?>" readonly="true">
			</div>
		</div>

		<legend>BEST</legend>
			
		<div class="form">
			<div class="form-group">
				<label>Control Number</label><br/>
				<input class="form-control" type="text" name="control_number" value="<?php if ($best_student->Control_Number) echo $best_student->Control_Number; ?>">
				<?php echo form_error('control_number'); ?>
			</div>		

			<div class="form-group">
				<label>Username</label>
				<input class="form-control" type="text" name="username" value="<?php if ($best_student->Username) echo $best_student->Username; ?>">
				<?php echo form_error('username'); ?>
			</div>

			<div class="form-group">
				<label>Status</label><br />
				<select class="form-control" name="status">
				<?php foreach ($statuses as $status): ?>
					<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($best_student->Status_ID)) if ($status->Status_ID == $best_student->Status_ID) echo 'selected="selected"'; ?>><?php echo $status->Name; ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('status'); ?>
			</div>

			<div class="form-group">
				<label>Remarks</label>
				<input class="form-control" type="text" name="remarks" value="<?php if ($best_student->Remarks) echo $best_student->Remarks; ?>">
				<?php echo form_error('remarks'); ?>
			</div>

			<div class="form-group">
				<label>CD</label><br />
				<input type="radio" name="cd" value="1" <?php if ($best_student->CD == 1) echo 'checked="checked"'; ?>> Yes
				<input type="radio" name="cd" value="0" <?php if ($best_student->CD == 0) echo 'checked="checked"'; ?>> No
				<?php echo form_error('cd'); ?>
			</div>
		</div>
	</form>
</div>
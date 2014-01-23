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

		<legend>Tracker Information</legend>

		<div class="form-inline">
			<div class="form-group">
				<label>Proctor</label>
				<select class="form-control" name="proctor">
				<?php foreach ($proctors as $proctor): ?>
					<option value="<?php echo $proctor->Proctor_ID; ?>" <?php echo set_select('proctor', $proctor->Proctor_ID); ?>><?php echo $proctor->Full_Name; ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('proctor'); ?>
			</div><br/>

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
				<label>Subject</label>
				<select class="form-control" name="subject">
				<?php foreach ($subjects as $subject): ?>
					<option value="<?php echo $subject->Subject_ID; ?>" <?php echo set_select('school', $subject->Subject_ID); ?>><?php echo $subject->Subject_Code; ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('subject'); ?>
			</div>

			<div class="form-group">
				<label>Semester</label>
				<input class="form-control" type="text" name="semester" value="<?php echo set_value('semester'); ?>" />
				<?php echo form_error('semester'); ?>
			</div>

			<div class="form-group">
				<label>Year Level</label>
				<input class="form-control" type="number" name="year" value="<?php echo set_value('year'); ?>" />
				<?php echo form_error('year'); ?>
			</div>

			<div class="form-group">
				<label>Section</label>
				<input class="form-control" type="text" name="section" value="<?php echo set_value('section'); ?>" />
				<?php echo form_error('section'); ?>
			</div>
		</div>

		<legend>Student List</legend>

		<script type="text/javascript">
		function student_add()
		{
			$full_name = $('[name="student_last_name_input"]').val().trim() + ", " + $('[name="student_first_name_input"]').val().trim() + " " + $('[name="student_middle_initial_input"]').val().trim() + ".";
			$student_number = $('[name="student_student_number_input"]').val().trim();
			$session_id = $('[name="student_session_id_input"]').val().trim();
			$test_date = $('[name="student_test_date_input"]').val().trim();
			$status = $('[name="student_status_input"]').val().trim();
			$remarks = $('[name="student_remarks_input"]').val().trim();

			if ($full_name && $student_number && $session_id && $test_date && $status && $remarks)
			{
				$('#student_table').append('<tr><td><input type="checkbox"></td>' +
					'<td><input type="hidden" name="student_full_name[]" value="' + $full_name + '">' + $full_name + '</td>' +
					'<td><input type="hidden" name="student_student_number[]" value="' + $student_number + '">' + $student_number + '</td>' +
					'<td><input type="hidden" name="student_session_id[]" value="' + $session_id + '">' + $session_id + '</td>' +
					'<td><input type="hidden" name="student_test_date[]" value="' + $test_date + '">' + $test_date + '</td>' +
					'<td><input type="hidden" name="student_status[]" value="' + $status + '">' + $status + '</td>' +
					'<td><input type="hidden" name="student_remarks[]" value="' + $remarks + '">' + $remarks + '</td></tr>');
			}
			else
			{
				alert('Invalid input. Please check fields and try again.');
			}
		}

		function student_delete()
		{
			if (confirm('Delete selected students?'))
			{
				$('#student_table input[type="checkbox"]:checked').each(function(i, item) { $(item).closest('tr').remove(); });
			}
		}
		</script>

		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					Add to List
				</div>
				<div class="panel-body">
					<div class="form">
						<div class="form-group">
							<label>Last Name</label>
							<input class="form-control" type="text" name="student_last_name_input">
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input class="form-control" type="text" name="student_first_name_input">
						</div>
						<div class="form-group">
							<label>Middle Initial</label>
							<input class="form-control" type="text" name="student_middle_initial_input">
						</div>
						<div class="form-group">
							<label>Student Number</label>
							<input class="form-control" type="text" name="student_student_number_input">
						</div>
						<div class="form-group">
							<label>Session ID</label>
							<input class="form-control" type="text" name="student_session_id_input">
						</div>
						<div class="form-group">
							<label>Test Date</label>
							<input class="form-control" type="date" name="student_test_date_input">
						</div>
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" name="student_status_input">
							<?php foreach ($statuses as $status): ?>
								<option value="<?php echo $status->Status_ID; ?>" <?php echo set_select('status', $status->Status_ID); ?>><?php echo $status->Name; ?></option>
							<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Remarks</label>
							<input class="form-control" type="text" name="student_remarks_input">
						</div>
						
						<div class="submit-button">
							<button type="button" class="btn btn-primary" name="submit" onclick="student_add();">Add to List</button>
						</div>
					</div>	
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<h3>List of Students</h3>
			<div class="customize-btn-group">
				<button type="button" class="btn btn-info">Batch Upload</button>
				<button type="button" class="btn btn-danger" onclick="student_delete();">Delete</button>
			</div>
			<table class="table" id="student_table">
				<tr>
					<th></th>
					<th>Full Name</th>
					<th>Student Number</th>
					<th>Session ID</th>
					<th>Test Date</th>
					<th>Status</th>
					<th>Remarks</th>
				</tr>
			</table>
		</div>
	</form>
</div>
<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Class list successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	
	<?php if (isset($student_not_found)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student not found. Please check the fields and try again.</div>';} ?>

	<h1>SMP Tracker</h1>

	<?php echo form_open('/dbms/form_program_smp_tracker/' . $smp_tracker->Student_ID); ?>
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
				<input type="text" class="form-control" name="id_number" value="<?php if($smp_tracker->Student_ID_Number) echo $smp_tracker->Student_ID_Number; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" value="<?php if($smp_tracker->Full_Name) echo $smp_tracker->Full_Name; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>School</label>
				<select class="form-control" name="school" disabled="true">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID ?>" <?php if ($smp_tracker->School_ID == $school->School_ID) echo 'selected="selected"';?>><?php echo $school->Name . " - " . $school->Branch ?></option>
				<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label>Year</label>
				<input type="text" class="form-control" name="year" value="<?php if($smp_tracker->Year) echo $smp_tracker->Year; ?>" readonly="true">
			</div>

			<div class="form-group">
				<label>Course</label>
				<input type="text" class="form-control" name="course" value="<?php if($smp_tracker->Course) echo $smp_tracker->Course; ?>" readonly="true">
			</div>

			<legend>Subjects</legend>
				
			<table class="table">
				<tr>
					<th>Subject</th>
					<th>Year Taken</th>
					<th>Semester</th>
					<th>Status</th>
					<th>Grade Received</th>
					<th>No. of Times Taken</th>
				</tr>
				<tr>
					<td>Business Communication</td>
					<td>
						<select class="form-control" name="bizcom_year" value="<?php echo set_value('bizcom_year'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						<?php echo form_error('bizcom_year'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_semester" value="<?php echo set_value('bizcom_semester'); ?>">
						<?php echo form_error('bizcom_semester'); ?>
					</td>
					<td>
						<select class="form-control" name="bizcom_status" value="<?php echo set_value('bizcom_status'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						<?php echo form_error('bizcom_status'); ?>
					</td>
					<td>
						<input class="form-control" type="text" name="bizcom_grade" value="<?php echo set_value('bizcom_grade'); ?>">
						<?php echo form_error('bizcom_grade'); ?>	
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_times_taken" value="<?php echo set_value('bizcom_times_taken'); ?>">
						<?php echo form_error('bizcom_times_taken'); ?>
					</td>
				</tr>
				<tr>
					<td>BPO101</td>
					<td>
						<select class="form-control" name="bizcom_year" value="<?php echo set_value('bpo101_year'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						<?php echo form_error('bpo101_year'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_semester" value="<?php echo set_value('bpo101_semester'); ?>">
						<?php echo form_error('bpo101_semester'); ?>
					</td>
					<td>
						<select class="form-control" name="bizcom_status" value="<?php echo set_value('bpo101_status'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						<?php echo form_error('bpo101_status'); ?>
					</td>
					<td>
						<input class="form-control" type="text" name="bizcom_grade" value="<?php echo set_value('bpo101_grade'); ?>">
						<?php echo form_error('bpo101_grade'); ?>	
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_times_taken" value="<?php echo set_value('bpo101_times_taken'); ?>">
						<?php echo form_error('bpo101_times_taken'); ?>
					</td>
				</tr>
				<tr>
					<td>BPO102</td>
					<td>
						<select class="form-control" name="bizcom_year" value="<?php echo set_value('bpo102_year'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						<?php echo form_error('bpo102_year'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_semester" value="<?php echo set_value('bpo102_semester'); ?>">
						<?php echo form_error('bpo102_semester'); ?>
					</td>
					<td>
						<select class="form-control" name="bizcom_status" value="<?php echo set_value('bpo102_status'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						<?php echo form_error('bpo102_status'); ?>
					</td>
					<td>
						<input class="form-control" type="text" name="bizcom_grade" value="<?php echo set_value('bpo102_grade'); ?>">
						<?php echo form_error('bpo102_grade'); ?>	
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_times_taken" value="<?php echo set_value('bpo102_times_taken'); ?>">
						<?php echo form_error('bpo102_times_taken'); ?>
					</td>
				</tr>
				<tr>
					<td>Service Culture</td>
					<td>
						<select class="form-control" name="bizcom_year" value="<?php echo set_value('sc_year'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						<?php echo form_error('sc_year'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_semester" value="<?php echo set_value('sc_semester'); ?>">
						<?php echo form_error('sc_semester'); ?>
					</td>
					<td>
						<select class="form-control" name="bizcom_status" value="<?php echo set_value('sc_status'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						<?php echo form_error('sc_status'); ?>
					</td>
					<td>
						<input class="form-control" type="text" name="bizcom_grade" value="<?php echo set_value('sc_grade'); ?>">
						<?php echo form_error('sc_grade'); ?>	
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_times_taken" value="<?php echo set_value('sc_times_taken'); ?>">
						<?php echo form_error('sc_times_taken'); ?>
					</td>
				</tr>
				<tr>
					<td>Systems Thinking</td>
					<td>
						<select class="form-control" name="bizcom_year" value="<?php echo set_value('st_year'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						<?php echo form_error('st_year'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_semester" value="<?php echo set_value('st_semester'); ?>">
						<?php echo form_error('st_semester'); ?>
					</td>
					<td>
						<select class="form-control" name="bizcom_status" value="<?php echo set_value('st_status'); ?>">
							<option>Option1</option>
							<option>Option2</option>
							<option>Option3</option>
						</select>
						<?php echo form_error('st_status'); ?>
					</td>
					<td>
						<input class="form-control" type="text" name="bizcom_grade" value="<?php echo set_value('st_grade'); ?>">
						<?php echo form_error('st_grade'); ?>	
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_times_taken" value="<?php echo set_value('st_times_taken'); ?>">
						<?php echo form_error('st_times_taken'); ?>
					</td>
				</tr>
			</table>
					
			<legend>Internship</legend>

			<div class="form-group">
				<label>Status</label>
				<input class="form-control" type="text" name="intern_status" value="<?php echo set_value('intern_status'); ?>">
				<?php echo form_error('intern_status'); ?>
			</div>

			<div class="form-group">
				<label>Grades</label>
				<input class="form-control" type="text" name="intern_grades" value="<?php echo set_value('intern_grades'); ?>">
				<?php echo form_error('intern_grades'); ?>
			</div>

			<div class="form-group">
				<label>Remarks</label>
				<input class="form-control" type="text" name="intern_remarks" value="<?php echo set_value('intern_remarks'); ?>">
				<?php echo form_error('intern_remarks'); ?>
			</div>
						
			<div class="form-group">
				<label>School</label>
				<input class="form-control" type="text" name="intern_school" value="<?php echo set_value('intern_school'); ?>">
				<?php echo form_error('intern_school'); ?>
			</div>

			<div class="form-group">
				<label>Branch</label>
				<input class="form-control" type="text" name="intern_branch" value="<?php echo set_value('intern_branch'); ?>">
				<?php echo form_error('intern_branch'); ?>
			</div>

			<div class="form-group">
				<label>Year</label>
				<input class="form-control" type="text" name="intern_year" value="<?php echo set_value('intern_year'); ?>">
				<?php echo form_error('intern_year'); ?>
			</div>

			<div class="form-group">
				<label>Semester</label>
				<input class="form-control" type="text" name="intern_year" value="<?php echo set_value('intern_year'); ?>">
				<?php echo form_error('intern_year'); ?>
			</div>
			<br/>

			<div class="form-group">
				<label>Company Information</label>
				<input class="form-control" type="text" name="company_information" value="<?php echo set_value('company_information'); ?>">
				<?php echo form_error('company_information'); ?>
			</div>

			<div class="form-group">
				<label>Name of Company</label>
				<input class="form-control" type="text" name="company_name" value="<?php echo set_value('company_name'); ?>">
				<?php echo form_error('company_name'); ?>
			</div>
			<br/>

			<div class="form-group">
				<label>Company Address</label>
				<input class="form-control" type="text" name="company_address" value="<?php echo set_value('company_address'); ?>">
				<?php echo form_error('company_address'); ?>
			</div>

			<div class="form-group">
				<label>Department / Divison</label>
				<input class="form-control" type="text" name="department" value="<?php echo set_value('department'); ?>">
				<?php echo form_error('department'); ?>
			</div>
			<br/>

			<div class="form-group">
				<label>Supervisor / Mentor</label>
				<input class="form-control" type="text" name="supervisor" value="<?php echo set_value('supervisor'); ?>">
				<?php echo form_error('supervisor'); ?>
			</div>

			<div class="form-group">
				<label>Supervisor's Contact Details</label>
				<input class="form-control" type="text" name="supervisor_contact_details" value="<?php echo set_value('supervisor_contact_details'); ?>">
				<?php echo form_error('supervisor_contact_details'); ?>
			</div>

			<div class="form-group">
				<label>Supervisor's Email</label>
				<input class="form-control" type="text" name="supervisor_email" value="<?php echo set_value('supervisor_email'); ?>">
				<?php echo form_error('supervisor_email'); ?>
			</div>
			<br/>

			<div class="form-group">
				<label>Date Started</label>
				<input class="form-control" type="date" name="start_date" value="<?php echo set_value('start_date'); ?>">
				<?php echo form_error('start_date'); ?>
			</div>

			<div class="form-group">
				<label>Date Ended</label>
				<input class="form-control" type="date" name="end_date" value="<?php echo set_value('end_date'); ?>">
				<?php echo form_error('end_date'); ?>
			</div>

			<div class="form-group">
				<label>Total Internship Hours</label>
				<input class="form-control" type="number" name="total_internship_hours" value="<?php echo set_value('total_internship_hours'); ?>">
				<?php echo form_error('total_internship_hours'); ?>
			</div>
			<br/>

			<div class="form-group">
				<label>Evaluation Form</label><br />
				<input type="radio" name="evaluation_form" value="<?php echo set_value('evaluation_form'); ?>"> Yes
				<input type="radio" name="evaluation_form" value="<?php echo set_value('evaluation_form'); ?>"> No
				<?php echo form_error('evaluation_form'); ?>
			</div>
			<br/>

			<div class="form-group">
				<label>Status</label><br />
				<select class="form-control" name="intern_stat" value="<?php echo set_value('intern_stat'); ?>">
					<option>Pass
					<option>Fail
					<option>Incomplete
					<option>Dropped
					<option>Currently Taking
				</select>
				<?php echo form_error('intern_stat'); ?>
			</div>
		</div>
	</form>
</div>

<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>SMP Tracker successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	

	<h1>SMP Tracker</h1>

	<?php echo form_open('/dbms/form_program_smp_tracker/' . $smp_tracker->Student_ID); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<legend>General Information</legend>

		<input type="hidden" class="form-control" name="code" value="<?php if($smp_tracker->Code) echo $smp_tracker->Code; ?>">

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
						<input class="form-control" type="text" name="bizcom_year" value="<?php if (isset($bizcom->School_Year)) echo $bizcom->School_Year; ?>" readonly="true">
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_semester" value="<?php if (isset($bizcom->Semester)) echo $bizcom->Semester; ?>" readonly="true">
					</td>
					<td>
						<select class="form-control" name="bizcom_status">
						<?php foreach ($statuses as $status): ?>
							<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($bizcom->Status_ID)) if ($status->Status_ID == $bizcom->Status_ID) echo 'selected="selected"'; ?>><?php echo $status->Name; ?></option>
						<?php endforeach; ?>
						</select>
						<?php echo form_error('bizcom_status'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_grade" value="<?php if (isset($bizcom->Grade)) echo $bizcom->Grade; ?>">
						<?php echo form_error('bizcom_grade'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="bizcom_times_taken" value="<?php if (isset($bizcom->Times_Taken)) echo $bizcom->Times_Taken; ?>" readonly="true">
					</td>
				</tr>	
				<tr>
					<td>BPO101</td>
					<td>
						<input class="form-control" type="text" name="bpo101_year" value="<?php if (isset($bpo101->School_Year)) echo $bpo101->School_Year; ?>" readonly="true">
					</td>
					<td>
						<input class="form-control" type="number" name="bpo101_semester" value="<?php if (isset($bpo101->Semester)) echo $bpo101->Semester; ?>" readonly="true">
					</td>
					<td>
						<select class="form-control" name="bpo101_status">
						<?php foreach ($statuses as $status): ?>
							<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($bpo101->Status_ID)) if ($status->Status_ID == $bpo101->Status_ID) echo 'selected="selected"' ?>><?php echo $status->Name; ?></option>
						<?php endforeach; ?>
						</select>
						<?php echo form_error('bpo101_status'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="bpo101_grade" value="<?php if (isset($bpo101->Grade)) echo $bpo101->Grade; ?>">
						<?php echo form_error('bpo101_grade'); ?>						
					</td>
					<td>
						<input class="form-control" type="number" name="bpo101_times_taken" value="<?php if (isset($bpo101->Times_Taken)) echo $bpo101->Times_Taken; ?>" readonly="true">
					</td>
				</tr>
				<tr>
					<td>BPO102</td>
					<td>
						<input class="form-control" type="text" name="bpo102_year" value="<?php if (isset($bpo102->School_Year)) echo $bpo102->School_Year; ?>" readonly="true">
					</td>
					<td>
						<input class="form-control" type="number" name="bpo102_semester" value="<?php if (isset($bpo102->Semester)) echo $bpo102->Semester; ?>" readonly="true">
					</td>
					<td>
						<select class="form-control" name="bpo102_status">
						<?php foreach ($statuses as $status): ?>
							<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($bpo102->Status_ID)) if ($status->Status_ID == $bpo102->Status_ID) echo 'selected="selected"' ?>><?php echo $status->Name; ?></option>
						<?php endforeach; ?>
						</select>
						<?php echo form_error('bpo102_status'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="bpo102_grade" value="<?php if (isset($bpo102->Grade)) echo $bpo102->Grade; ?>">
						<?php echo form_error('bpo102_grade'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="bpo102_times_taken" value="<?php if (isset($bpo102->Times_Taken)) echo $bpo102->Times_Taken; ?>" readonly="true">
					</td>
				</tr>
				<tr>
					<td>Service Culture</td>
					<td>
						<input class="form-control" type="text" name="sc101_year" value="<?php if (isset($sc101->School_Year)) echo $sc101->School_Year; ?>" readonly="true">
					</td>
					<td>
						<input class="form-control" type="number" name="sc101_semester" value="<?php if (isset($sc101->Semester)) echo $sc101->Semester; ?>"  readonly="true">
					</td>
					<td>
						<select class="form-control" name="sc101_status">
						<?php foreach ($statuses as $status): ?>
							<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($sc101->Status_ID)) if ($status->Status_ID == $sc101->Status_ID) echo 'selected="selected"' ?>><?php echo $status->Name; ?></option>
						<?php endforeach; ?>
						</select>
						<?php echo form_error('sc101_status'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="sc101_grade" value="<?php if (isset($sc101->Grade)) echo $sc101->Grade; ?>">
						<?php echo form_error('sc101_grade'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="sc101_times_taken" value="<?php if (isset($sc101->Times_Taken)) echo $sc101->Times_Taken; ?>" readonly="true">
					</td>
				</tr>
				<tr>
					<td>Systems Thinking</td>
					<td>
						<input class="form-control" type="text" name="systh101_year" value="<?php if (isset($systh101->School_Year)) echo $systh101->School_Year; ?>" readonly="true">
					</td>
					<td>
						<input class="form-control" type="number" name="systh101_semester" value="<?php if (isset($systh101->Semester)) echo $systh101->Semester; ?>" readonly="true">
					</td>
					<td>
						<select class="form-control" name="systh101_status">
						<?php foreach ($statuses as $status): ?>
							<option value="<?php echo $status->Status_ID; ?>" <?php if(isset($systh101->Status_ID)) if ($status->Status_ID == $systh101->Status_ID) echo 'selected="selected"' ?>><?php echo $status->Name; ?></option>
						<?php endforeach; ?>
						</select>
						<?php echo form_error('systh101_status'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="systh101_grade" value="<?php if (isset($systh101->Grade)) echo $systh101->Grade; ?>">
						<?php echo form_error('systh101_grade'); ?>
					</td>
					<td>
						<input class="form-control" type="number" name="systh101_times_taken" value="<?php if (isset($systh101->Times_Taken)) echo $systh101->Times_Taken; ?>" readonly="true">
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>

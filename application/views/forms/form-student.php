<div class="info-form">
	<h1>Student Form</h1>
	
	<legend>Personal Information</legend>

	<?php echo form_open('/dbms/form_student'); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="button" class="btn btn-success" onclick="history.go(0);">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>ID Number</label>
				<input type="text" class="form-control" name="id_number" value="<?php echo set_value('id_number'); ?>">
				<?php echo form_error('id_number', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Name Suffix</label>
				<input class="form-control" type="text" name="name_suffix" value="<?php echo set_value('name_suffix'); ?>">
				<?php echo form_error('name_suffix', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" class="form-control" name="last_name" value="<?php echo set_value('last_name'); ?>">
				<?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>">
				<?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>Middle Initial</label>
				<input type="text" class="form-control" name="middle_initial"  value="<?php echo set_value('middle_initial'); ?>">
				<?php echo form_error('middle_initial', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Are you a new applicant?</label><br/>
				<input type="radio" name="applicant" value="yes"> Yes
				<input type="radio" name="applicant" value="no"> No
				<?php echo form_error('applicant', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>If no, do you want to update your information (Do we even need this here)</label><br/>
				<input type="radio" name="update" value="yes"> Yes
				<input type="radio" name="update" value="no" > No
				<?php echo form_error('update', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Civil Status</label><br/>
				<input type="radio" name="civil" value="married"> Married
				<input type="radio" name="civil" value="single"> Single
				<input type="radio" name="civil" value="separated"> Separated
				<?php echo form_error('civil', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Birth Day</label>
				<input type="date" class="form-control"  name="birthday" value="<?php echo set_value('birthday'); ?>">
				<?php echo form_error('birthday', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Nationality</label>
				<select class="form-control" name="nationality">
					<option value="Filipino">Filipino</option>
					<option value="American">American</option>
				</select>
				<?php echo form_error('nationality', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<legend>Current Address</legend>

		<div class="form-inline">
			<div class="form-group">
				<label>Street Number</label>
				<input type="text" class="form-control" name="current_street_number" value="<?php echo set_value('current_street_number'); ?>">
				<?php echo form_error('current_street_number', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group">
				<label>Street Name</label>
				<input type="text" class="form-control" name="current_street_name" value="<?php echo set_value('current_street_name'); ?>">
				<?php echo form_error('current_street_name', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group">
				<label>City</label>
				<input type="text" class="form-control" name="current_city" value="<?php echo set_value('current_city'); ?>">
				<?php echo form_error('current_city', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Province</label>
				<select class="form-control" name="current_province">
					<option value="Manila">Manila</option>
				</select>
				<?php echo form_error('current_province', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group">
				<label>Region</label>
				<select class="form-control" name="current_region">
					<option value="NCR">NCR</option>
				</select>
				<?php echo form_error('current_region', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<legend>Alternate Address</legend>	

		<div class="form-inline">
			<div class="form-group">
				<label>Street Number</label>
				<input type="text" class="form-control" name="alternate_street_number" value="<?php echo set_value('alternate_street_number'); ?>">
				<?php echo form_error('alternate_street_number', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group"><label>Street Name</label>
				<input type="text" class="form-control" name="alternate_street_name"  value="<?php echo set_value('alternate_street_name'); ?>">
				<?php echo form_error('alternate_street_name', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group"><label>City</label>
				<input type="text" class="form-control" name="alternate_city"  value="<?php echo set_value('alternate_city'); ?>">
				<?php echo form_error('alternate_city', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Province</label>
				<select class="form-control" name="alternate_province">
					<option value="Manila">Manila</option>
				</select>
				<?php echo form_error('alternate_province', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group">
				<label>Region</label>
				<select class="form-control" name="alternate_region">
					<option value="NCR">NCR</option>
				</select>
				<?php echo form_error('alternate_region', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<legend>Contact Details</legend>	

		<div class="form-inline">
			<div class="form-group"><label>Mobile</label>
				<input type="text" class="form-control" name="mobile" value="<?php echo set_value('mobile'); ?>">
				<?php echo form_error('mobile', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group"><label>Landline</label>
				<input type="text" class="form-control" name="landline" value="<?php echo set_value('landline'); ?>">
				<?php echo form_error('landline', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group"><label>Email</label>
				<input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>">
				<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group"><label>Facebook</label>
				<input type="text" class="form-control" name="facebook" value="<?php echo set_value('facebook'); ?>">
				<?php echo form_error('facebook', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<legend>Academic Background</legend>	
		
		<div class="form-inline">	
			<div class="form-group">
				<label>AB / BS</label>
				<select class="form-control" name="degree_type">
					<option value="BS">BS</option>
					<option value="AB">AB</option>
				</select>
				<?php echo form_error('degree_type', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>Degree</label>
				<input class="form-control" type="text"  name="degree" value="<?php echo set_value('degree'); ?>">
				<?php echo form_error('degree', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>Year</label>
				<input class="form-control" type="text" name="year" value="<?php echo set_value('year'); ?>">
				<?php echo form_error('year', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>School</label>
				<input type="text" class="form-control" name="school"  value="<?php echo set_value('school'); ?>">
				<?php echo form_error('school', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group">
				<label>Branch</label>
				<input type="text" class="form-control" name="branch" value="<?php echo set_value('branch'); ?>">
				<?php echo form_error('branch', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group">
				<label>Expected Year of Graduation</label>
				<input type="text" class="form-control"  name="expected_year_of_graduation" value="<?php echo set_value('expected_year_of_graduation'); ?>">
				<?php echo form_error('expected_year_of_graduation', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Are you a DOST Scholar?</label><br />
				<input type="radio" name="DOSTscholar" value="yes"> Yes
				<input type="radio" name="DOSTscholar" value="No"> No
				<?php echo form_error('DOSTscholar', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>If not, are you a recipient of any scholarship? Specify if yes.</label><br />
				<input type="radio" name="scholar" value="yes"> Yes
				<input type="radio" name="scholar" value="No"> No
				<?php echo form_error('scholar', '<div class="text-danger">', '</div>'); ?>
			</div>
			<br/>
			<div class="form-group">
				<label>Scholarship</label>
				<input type="text" class="form-control" name="scholarship" value="<?php echo set_value('scholarship'); ?>">
				<?php echo form_error('scholarship', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>
			
		<div class="form-inline">
			<div class="form-group">
				<label>What BPAP-CHED intervention program has been taken previously?</label><br/>
				<input type="checkbox" name="program[]" value="best"> AdEPT<br/>
				<input type="checkbox" name="program[]" value="adept"> BEST<br/>
				<input type="checkbox" name="program[]" value="smp"> SMP<br/>
				<input type="checkbox" name="program[]" value="gcat"> GCAT<br/>
				<?php echo form_error('program[]', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Are you willing to work for the IT-BPO sector</label><br/>
				<input type="radio" name="work" value="yes"> Yes
				<input type="radio" name="work" value="No"> No
				<?php echo form_error('work', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>
	</form>
</div>
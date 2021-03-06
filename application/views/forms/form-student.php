<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student successfully added.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>

	<h1>Student Form</h1>
	
	<legend>Personal Information</legend>

	<?php echo form_open('/dbms/form_student_application'); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

		<input type="hidden" name="code" value="<?php echo set_value('code'); ?>">
		<?php echo form_error('code'); ?>
		<div class="form-inline">
			<div class="form-group">
				<label>ID Number</label>
				<input type="text" class="form-control" name="id_number" value="<?php echo set_value('id_number'); ?>">
				<?php echo form_error('id_number'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" class="form-control" name="last_name" value="<?php echo set_value('last_name'); ?>">
				<?php echo form_error('last_name'); ?>
			</div>
			
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>">
				<?php echo form_error('first_name'); ?>
			</div>
			
			<div class="form-group">
				<label>Middle Initial</label>
				<input type="text" class="form-control" name="middle_initial" placeholder="Please put a '-' if there is no MI" value="<?php echo set_value('middle_initial'); ?>">
				<?php echo form_error('middle_initial'); ?>
			</div>
			
			<div class="form-group">
				<label>Name Suffix</label>
				<input class="form-control" type="text" name="name_suffix" value="<?php echo set_value('name_suffix'); ?>">
				<?php echo form_error('name_suffix'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Gender</label><br/>
				<input type="radio" name="gender" value="M" <?php echo set_radio('gender', 'M'); ?>> Male
				<input type="radio" name="gender" value="F" <?php echo set_radio('gender', 'F'); ?>> Female
				<?php echo form_error('gender'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Civil Status</label><br/>
				<input type="radio" name="civil" value="married" <?php echo set_radio('civil', 'married'); ?>> Married
				<input type="radio" name="civil" value="single" <?php echo set_radio('civil', 'single'); ?>> Single
				<input type="radio" name="civil" value="separated" <?php echo set_radio('civil', 'separated'); ?>> Separated
				<input type="radio" name="civil" value="widowed" <?php echo set_radio('civil', 'widowed'); ?>> Widowed
				<?php echo form_error('civil'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Birthdate</label>
				<input type="date" class="form-control" name="birthday" value="<?php echo set_value('birthday'); ?>">
				<?php echo form_error('birthday'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Birthplace</label>
				<input type="text" class="form-control" name="birthplace" value="<?php echo set_value('birthplace'); ?>">
				<?php echo form_error('birthplace'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Nationality</label>
				<input type="text" class="form-control" name="nationality" value="<?php echo set_value('nationality'); ?>">
				<?php echo form_error('nationality'); ?>
			</div>
		</div>

		<legend>Current Address</legend>

		<div class="form-inline">
			<div class="form-group">
				<label>Street Number</label>
				<input type="text" class="form-control" name="current_street_number" value="<?php echo set_value('current_street_number'); ?>">
				<?php echo form_error('current_street_number'); ?>
			</div>

			<div class="form-group">
				<label>Street Name</label>
				<input type="text" class="form-control" name="current_street_name" value="<?php echo set_value('current_street_name'); ?>">
				<?php echo form_error('current_street_name'); ?>
			</div>

			<div class="form-group">
				<label>City</label>
				<input type="text" class="form-control" name="current_city" value="<?php echo set_value('current_city'); ?>">
				<?php echo form_error('current_city'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Province</label>
				<input type="text" class="form-control" name="current_province" value="<?php echo set_value('current_province'); ?>">
				<?php echo form_error('current_province'); ?>
			</div>

			<div class="form-group">
				<label>Region</label>
				<input type="text" class="form-control" name="current_region" value="<?php echo set_value('current_region'); ?>">
				<?php echo form_error('current_region'); ?>
			</div>
		</div>

		<legend>Alternate Address</legend>	

		<div class="form-inline">
			<div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control" name="alternate_address" value="<?php echo set_value('alternate_address'); ?>">
				<?php echo form_error('alternate_address'); ?>
			</div>

		<legend>Contact Details</legend>	

		<div class="form-inline">
			<div class="form-group"><label>Mobile</label>
				<input type="text" class="form-control" name="mobile" value="<?php echo set_value('mobile'); ?>">
				<?php echo form_error('mobile'); ?>
			</div>

			<div class="form-group"><label>Landline</label>
				<input type="text" class="form-control" name="landline" value="<?php echo set_value('landline'); ?>">
				<?php echo form_error('landline'); ?>
			</div>

			<div class="form-group"><label>Email</label>
				<input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>">
				<?php echo form_error('email'); ?>
			</div>

			<div class="form-group"><label>Facebook</label>
				<input type="text" class="form-control" name="facebook" value="<?php echo set_value('facebook'); ?>">
				<?php echo form_error('facebook'); ?>
			</div>
		</div>

		<legend>Academic Background</legend>	
		
		<div class="form-inline">	
			<div class="form-group">
				<label>AB / BS</label>
				<select class="form-control" name="degree_type">
					<option value="BS" <?php echo set_select('degree_type', 'BS'); ?>>BS</option>
					<option value="AB" <?php echo set_select('degree_type', 'AB'); ?>>AB</option>
				</select>
				<?php echo form_error('degree_type'); ?>
			</div>
			
			<div class="form-group">
				<label>Degree</label>
				<input class="form-control" type="text" name="degree" value="<?php echo set_value('degree'); ?>">
				<?php echo form_error('degree'); ?>
			</div>
			
			<div class="form-group">
				<label>Year Level</label>
				<input class="form-control" type="text" name="year" value="<?php echo set_value('year'); ?>">
				<?php echo form_error('year'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>School</label>
				<select class="form-control" name="school">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID ?>" <?php echo set_select('school', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('school'); ?>
			</div>

			<div class="form-group">
				<label>Expected Year of Graduation</label>
				<input type="text" class="form-control" name="expected_year_of_graduation" value="<?php echo set_value('expected_year_of_graduation'); ?>">
				<?php echo form_error('expected_year_of_graduation'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Are you a DOST Scholar?</label><br />
				<input type="radio" name="DOSTscholar" value="1" <?php echo set_radio('DOSTscholar', '1'); ?>> Yes
				<input type="radio" name="DOSTscholar" value="0" <?php echo set_radio('DOSTscholar', '0'); ?>> No
				<?php echo form_error('DOSTscholar'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>If not, are you a recipient of any scholarship? Specify if yes.</label><br />
				<input type="radio" name="scholar" value="1" <?php echo set_radio('scholar', '1'); ?>> Yes
				<input type="radio" name="scholar" value="0" <?php echo set_radio('scholar', '0'); ?>> No
				<?php echo form_error('scholar'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Are you willing to work for the IT-BPO sector?</label><br/>
				<input type="radio" name="work" value="1" <?php echo set_radio('work', '1'); ?>> Yes
				<input type="radio" name="work" value="0" <?php echo set_radio('work', '0'); ?>> No
				<?php echo form_error('work'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Do you own a computer?</label><br/>
				<input type="radio" name="computer" value="1" <?php echo set_radio('computer', '1'); ?>> Yes
				<input type="radio" name="computer" value="0" <?php echo set_radio('computer', '0'); ?>> No
				<?php echo form_error('computer'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Do you have Internet access?</label><br/>
				<input type="radio" name="internet" value="1" <?php echo set_radio('internet', '1'); ?>> Yes
				<input type="radio" name="internet" value="0" <?php echo set_radio('internet', '0'); ?>> No
				<?php echo form_error('internet'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group">
				<label>Submitted the contract?</label><br/>
				<input type="radio" name="contract" value="1" <?php echo set_radio('contract', '1'); ?>> Yes
				<input type="radio" name="contract" value="0" <?php echo set_radio('contract', '0'); ?>> No
				<?php echo form_error('contract'); ?>
			</div>
		</div>

		<legend>Application</legend>

		<div class="form-inline">
			<div class="form-group">
				<label>Applying for which programs?</label><br/>
				<input type="checkbox" name="program[]" value="smp_ched" <?php echo set_checkbox('program[]', 'smp_ched'); ?>> SMP-CHED<br/>
				<input type="checkbox" name="program[]" value="gcat_ched" <?php echo set_checkbox('program[]', 'gcat_ched'); ?>> GCAT-CHED<br/>
				<input type="checkbox" name="program[]" value="best_ched" <?php echo set_checkbox('program[]', 'best_ched'); ?>> BEST-CHED<br/>
				<input type="checkbox" name="program[]" value="adept_ched" <?php echo set_checkbox('program[]', 'adept_ched'); ?>> AdEPT-CHED<br/>
				<input type="checkbox" name="program[]" value="best_sei" <?php echo set_checkbox('program[]', 'best_sei'); ?>> BEST-SEI<br/>
				<input type="checkbox" name="program[]" value="adept_sei" <?php echo set_checkbox('program[]', 'adept_sei'); ?>> ADEPT-SEI<br/>
				<?php echo form_error('program[]'); ?>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
$('[name="save_draft"]').click
(
	function()
	{
		$('[name="code"]').val($('[name="school"]').val() + $('[name="id_number"]').val());
	}
);

$('[name="submit"]').click
(
	function()
	{
		$('[name="code"]').val($('[name="school"]').val() + $('[name="id_number"]').val());
	}
);
</script>
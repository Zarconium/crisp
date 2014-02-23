<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Master Trainer successfully added.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>

	<h1>Master Trainer Form</h1>

	<legend>Personal Information</legend>

	<?php echo form_open('/dbms/form_mastertrainer_application'); ?>

		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>
			
		<div class="form-inline">
			
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" class="form-control" name="last_name"value="<?php echo set_value('last_name'); ?>">
				<?php echo form_error('last_name'); ?>
			</div>

			<div class="form-group"><label>First Name</label>
				<input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>">
				<?php echo form_error('first_name'); ?>
			</div>

			<div class="form-group"><label>Middle Initial</label>
				<input type="text" class="form-control" name="middle_initial" placeholder="Please put a '-' if there is no MI" value="<?php echo set_value('middle_initial'); ?>">
				<?php echo form_error('middle_initial'); ?>
			</div>
			
			<div class="form-group">
				<label>Name Suffix</label>
				<input type="text" class="form-control" name="name_suffix" value="<?php echo set_value('name_suffix'); ?>">
				<?php echo form_error('name_suffix'); ?>
			</div>
		</div>
		
		<div class="form-inline">
			<div class="form-group"><label>Gender</label><br/>
				<input type="radio" name="gender" value="M" <?php echo set_radio('gender', 'M'); ?>> Male
				<input type="radio" name="gender" value="F" <?php echo set_radio('gender', 'F'); ?>> Female
				<?php echo form_error('gender'); ?>
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

		<legend>Contact Details</legend>
			
		<div class="form-inline">
			<div class="form-group">
				<label>Landline</label>
				<input type="number" class="form-control" name="landline" min="0" max="9999999" value="<?php echo set_value('landline'); ?>">
				<?php echo form_error('landline'); ?>
			</div>

			<div class="form-group">
				<label>Mobile Number</label>
				<input type="text" class="form-control" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>">
				<?php echo form_error('mobile_number'); ?>
			</div>
		</div>

		<div class="form-inline">
			<div class="form-group"><label>Email</label>
				<input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>">
				<?php echo form_error('email'); ?>
			</div>

			<div class="form-group"><label>Facebook</label>
				<input type="email" class="form-control" name="facebook" value="<?php echo set_value('facebook'); ?>">
				<?php echo form_error('facebook'); ?>
			</div>
		</div>
		
		<legend>Work Information</legend>

		<div class="form-inline">
			<div class="form-group"><label>Company Name</label>
				<input type="text" class="form-control" name="company_name" value="<?php echo set_value('company_name'); ?>">
				<?php echo form_error('company_name'); ?>
			</div>
			
			<div class="form-group"><label>Company Address</label>
				<input type="text" class="form-control" name="company_address" value="<?php echo set_value('company_address'); ?>">
				<?php echo form_error('company_address'); ?>
			</div>

			<div class="form-group"><label>Position</label>
				<input type="text" class="form-control" name="position" value="<?php echo set_value('position'); ?>">
				<?php echo form_error('position'); ?>
			</div>
		</div>
	</form>
</div>
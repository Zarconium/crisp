<div class="info-form">

	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	<?php if (isset($form_success)) { echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Proctor successfully updated.</div>';} ?>
	<?php if (isset($form_error)) { echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>There were errors in your input. Please check the fields and try again.</div>';} ?>	

	<h1>Proctor Profile</h1>

	<legend>Personal Information</legend>

	<?php echo form_open('/dbms/form_proctor_profile'); ?>

		<!-- BUTTONS DIV -->
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>
			
		<div class="form-inline">
			
			<div class="form-group">
				<label>Name Suffix</label>
				<input type="text" class="form-control" name="name_suffix" value="<?php if(isset($proctor->Name_Suffix)) echo $proctor->Name_Suffix; ?>">
				<?php echo form_error('name_suffix'); ?>
			</div>
			
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" class="form-control" name="last_name"value="<?php if(isset($proctor->Last_Name)) echo $proctor->Last_Name; ?>">
				<?php echo form_error('last_name'); ?>
			</div>

			<div class="form-group"><label>First Name</label>
			<input type="text" class="form-control" name="first_name" value="<?php if(isset($proctor->First_Name)) echo $proctor->First_Name; ?>">
				<?php echo form_error('first_name'); ?>
			</div>

			<div class="form-group"><label>Middle Initial</label>
			<input type="text" class="form-control" name="middle_initial" value="<?php if(isset($proctor->Middle_Initial)) echo $proctor->Middle_Initial; ?>">
				<?php echo form_error('middle_initial'); ?>
			</div>


		</div>
		
		<div class="form-inline">
			
			<div class="form-group"><label>Gender</label><br/>
				<input type="radio" name="gender" value="male" <?php if (!strcasecmp($proctor->Gender, 'm')) { echo 'checked="checked"'; }?>> Male
				<input type="radio" name="gender" value="female" <?php if (!strcasecmp($proctor->Gender, 'f')) { echo 'checked="checked"'; }?>> Female
				<?php echo form_error('gender'); ?>
			</div>

		<div class="form-inline">
			
			<div class="form-group">
				<label>Civil Status</label><br/>
				<input type="radio" name="civil" value="married" <?php if (!strcasecmp($proctor->Civil_Status, 'married')) { echo 'checked="checked"'; }?>> Married
				<input type="radio" name="civil" value="single" <?php if (!strcasecmp($proctor->Civil_Status, 'single')) { echo 'checked="checked"'; }?>> Single
				<input type="radio" name="civil" value="separated" <?php if (!strcasecmp($proctor->Civil_Status, 'separated')) { echo 'checked="checked"'; }?>> Separated
				<input type="radio" name="civil" value="widowed" <?php if (!strcasecmp($proctor->Civil_Status, 'widowed')) { echo 'checked="checked"'; }?>> Widowed
				<?php echo form_error('civil'); ?>
			</div>
			
		</div>

		</div>
		
		<legend>Contact Details</legend>
		<div class="form-inline">
			
			<div class="form-group">
			<label>Landline</label>
			<input type="number" class="form-control" name="landline" value="<?php if(isset($proctor->Landline)) echo $proctor->Landline; ?>">
				<?php echo form_error('landline'); ?>
			</div>

			<div class="form-group">
			<label>Mobile Number</label>
			<input type="number" class="form-control" name="mobile_number" value="<?php if(isset($proctor->Mobile_Number)) echo $proctor->Mobile_Number; ?>">
				<?php echo form_error('mobile_number'); ?>
			</div>

			
		</div>

		<div class="form-inline">
			
			<div class="form-group"><label>Email</label>
			<input type="email" class="form-control" name="email" value="<?php if(isset($proctor->Email)) echo $proctor->Email; ?>">
				<?php echo form_error('email'); ?>
			</div>

			<div class="form-group"><label>Facebook</label>
			<input type="email" class="form-control" name="facebook" value="<?php if(isset($proctor->Facebook)) echo $proctor->Facebook; ?>">
				<?php echo form_error('facebook'); ?>
			</div>
			
		</div>
		
		<legend>Work Information</legend>
		<div class="form-inline">
			
			<div class="form-group"><label>Company Name</label>
			<input type="text" class="form-control" name="company_name" value="<?php if(isset($proctor->Company_Name)) echo $proctor->Company_Name; ?>">
				<?php echo form_error('company_name'); ?>
			</div>
			
			<div class="form-group"><label>Company Address</label>
			<input type="text" class="form-control" name="company_address" value="<?php if(isset($proctor->Company_address)) echo $proctor->Company_Address; ?>">
				<?php echo form_error('company_address'); ?>
			</div>

			<div class="form-group"><label>Position</label>
			<input type="text" class="form-control" name="position" value="<?php if(isset($proctor->Position)) echo $proctor->Position; ?>">
				<?php echo form_error('position'); ?>
			</div>
		
		</div>
</form>
</div>
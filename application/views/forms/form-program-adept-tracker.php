<div class="info-form">

	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	
	<h1>ADEPT Product Tracker Encoder</h1>
	
	<div class="save">
		<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
		<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
		<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
		<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
	</div>

	<legend>General Information</legend>
	<form class="form-inline" role="form"> <!-- This is the start of the blocked fields -->
									

		<div class="form-group">		
			<label>Last Name</label>			
			<input class="form-control" type="text" id="lname">
		</div>
		
		<div class="form-group">
			<label>First Name</label>
			<input type="text" class="form-control" id="fname">
		</div>
		
		<div class="form-group">
			<label>Middle Initial</label>
			<input type="text" class="form-control" id="mname">
		</div>
		
		<div class="form-group">
			<label>Student Number</label><br/>
			<input type="text" class="form-control" id="snumber">
		</div>
		
		<div class="form-group">
			<label>Control Number</label><br/>
			<input type="text" class="form-control" id="cnumber"> 
		</div>		

		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" id="username">
		</div>

		<div class="form-group">
			<label>School</label>
			<select class="form-control" name="school">
			<?php foreach ($schools as $school): ?>
				<option value="<?php echo $school->School_ID; ?>" <?php echo set_select('school', $school->School_ID); ?>><?php echo $school->Name . " - " . $school->Branch; ?></option>
			<?php endforeach; ?>
			</select>
			<?php echo form_error('school'); ?>
		</div>

	</form>
</div>	

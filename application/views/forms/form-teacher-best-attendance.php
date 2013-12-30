<div class="info-form">
	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
	
	<h3>BEST T3 Attendance</h3>
	
	<legend>Teacher Information</legend>
	
	<?php echo form_open('/dbms/form_teacher_best_attendance'); ?>
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>

	<div class="form-inline">
		
		<div class="form-group">
			<label>Name</label>
		<input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>">
				<?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
	</div>

		<div class="form-group"><label>School</label>
		<input type="text" class="form-control" name="school" value="<?php echo set_value('school'); ?>"></div>
				<?php echo form_error('school', '<div class="text-danger">', '</div>'); ?>

		<div class="form-group"><label>Contact Detail </label>
		<input type="text" class="form-control" name="contact_detail" value ="<?php echo set_value('contact_detail'); ?>"></div>
				<?php echo form_error('contact_detail', '<div class="text-danger">', '</div>'); ?>

		<div class="form-group"><label>Email </label>
		<input type="email" class="form-control" name = "email" value =" <?php echo set_value('email'); ?>"></div>
				<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>

	</div>
	
	<legend>Attendance Information</legend>
	

	<div class="row">
	
	<div class="col-md-6">
	<div class="form">
		
		<div class="form-group"><label>Orientation Date </label>
		<input type="date" class="form-control" name ="orientation_date" value ="<?php echo set_value('orientation_date'); ?>"></div>
				<?php echo form_error('orientation_date', '<div class="text-danger">', '</div>'); ?>
		
		<div class="form-group"><label>Site Visit</label>
		<input type="date" class="form-control" name="site_visit" value ="<?php echo set_value('site_visit'); ?>"></div>
				<?php echo form_error('site_visit', '<div class="text-danger">', '</div>'); ?>
		
		<div class="form-group"><label>GCAT</label>
		<input type="date" class="form-control" name="gcat" value ="<?php echo set_value('gcat'); ?>"></div>
				<?php echo form_error('gcat', '<div class="text-danger">', '</div>'); ?>
	
	</div>
	</div>
	
	<div class="col-md-6">
	<div class="form">

		
		<div class="form-group"><label>Day 1</label>
		<input type="date" class="form-control" name="day1"  value ="<?php echo set_value('day1'); ?>"></div>
				<?php echo form_error('day1', '<div class="text-danger">', '</div>'); ?>
		
		<div class="form-group"><label>Day 2</label>
		<input type="date" class="form-control" name="day2"  value ="<?php echo set_value('day2'); ?>"></div>
				<?php echo form_error('day2', '<div class="text-danger">', '</div>'); ?>
		
		<div class="form-group"><label>Day 3 (If with the Faculty)</label>
		<input type="date" class="form-control" name="day3"  value ="<?php echo set_value('day3'); ?>"></div>
				<?php echo form_error('day3', '<div class="text-danger">', '</div>'); ?>
		
	</div>	
	</div>
	</div>
	

	<div class="col-md-12">
	<div class="form-inline">
		<div class="form-group"><label>Total Days Attended </label>
		<input type="text" class="form-control" name="total_days_attended" value ="<?php echo set_value('total_days_attended'); ?>"></div>
				<?php echo form_error('total_days_attended', '<div class="text-danger">', '</div>'); ?>
	</div>
	</div>
</form>
</div>

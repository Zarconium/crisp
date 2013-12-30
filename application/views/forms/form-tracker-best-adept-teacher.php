
<div class="info-form">

	<h3>BEST Product Tracker Teacher</h3>
	<div class="col-md-3">
		<div class="panel panel-info">
		<div class="panel-heading">Add or Edit Student</div>
		<div class="panel-body">
		<form class="form-inline" role="form">
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>
			<div class="form-group">		
				<label>Last Name</label>			
				<input class="form-control" type="text" id="lname" name="last_name" value="<?php echo set_value('last_name'); ?>">
				<?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" id="fname" name="first_name" value="<?php echo set_value('first_name'); ?>">
				<?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>Middle Initial</label>
				<input type="text" class="form-control" id="mname" name="middle_initial" value="<?php echo set_value('middle_initial'); ?>">
				<?php echo form_error('middle_initial', '<div class="text-danger">', '</div>'); ?>
			</div>
			
		</form>
		
		<form class="form" role="form">
			
			<div class="form-group">
				<label>Contract</label><br/>
				<input type="radio" name="contract" value="yes"> Yes
				<input type="radio" name="contract" value="no"> No
				<?php echo form_error('contract', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>Status</label><br/>
				<input type="radio" name="status" value="p"> P
				<input type="radio" name="status" value="inc"> INC
				<input type="radio" name="status" value="dr"> DR
				<input type="radio" name="status" value="f"> F
				<?php echo form_error('status', '<div class="text-danger">', '</div>'); ?>
			</div>		

			<div class="form-group">
				<label>Remarks</label>
				<input type="text" class="form-control" id="remarks" name="remarks" value="<?php echo set_value('remarks'); ?>">
				<?php echo form_error('remarks', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group">
				<label>CD</label><br/>
				<input type="radio" name="cd" value="yes"> Yes
				<input type="radio" name="cd" value="no"> No
				<?php echo form_error('cd', '<div class="text-danger">', '</div>'); ?>
			</div>
		</form>
	
		<div class="submit-button">
			<button class="btn btn-primary" name="submit">Submit</button>
		</div>
		</div>
		</div>
				
	</div>
	
	<div class="col-md-9">
	
	<legend>List of Students</legend>
	
	<button class="btn btn-danger">Delete</button>
	<button class="btn btn-success">Refresh</button>
	<button class="btn btn-info">Print List</button>	
	
	<table class="table table-area">
		<tr>
			<th></th>
			<th>Action</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Middle Initial</th>
			<th>Student Number</th>
			<th>Contract?</th>
			<th>Status</th>
			<th>Remarks</th>
			<th>CD?</th>
		</tr>
		<tr>
			<td><input type="checkbox"></td>
			<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
			<td>Simon</td>
			<td>Dayanara</td>
			<td>F</td>
			<td>103523</td>
			<td>Y</td>
			<td>pending</td>
			<td>None</td>
			<td>Y</td>
		</tr>
	</table>

	<button class="btn btn-danger">Delete</button>
	<button class="btn btn-success">Refresh</button>
	<button class="btn btn-info">Print List</button>
	
	</div>
</div>	

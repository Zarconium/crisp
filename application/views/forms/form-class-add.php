<div class="info-form">

	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>

    <h1>Student Class List</h1>

		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>
		
	<legend>Class Information</legend>  
	
	<form class="form-inline">
	
		<div class="form-group"><label for="Teacher">Teacher's Full Name</label><span class="help-block">First Name, Last Name, Middle Initial</span>
		<input class="form-control" type="text" name="teacher_name" value="<?php echo set_value('teacher_name'); ?>" maxlength="250" />
		<?php echo form_error('teacher_name', '<div class="text-danger">', '</div>'); ?>
		</div>
		<br/>
		
		<div class="form-group"><label for="Name">School:</label>
		<input class="form-control" type="text" name="name" value="<?php echo set_value('name'); ?>" maxlength="250" />
		<?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>		
		</div>

		<div class="form-group"><label for="Branch">Campus:</label>
		<input class="form-control" type="text" name="branch" value="<?php echo set_value('branch'); ?>" maxlength="250" />
		<?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>	
		</div>

		<div class="form-group"><label for="Subject">Subject:</label>
		<SELECT name="subject" class="form-control" value="<?php echo set_value('subject'); ?>">
						<OPTION value="BEST">BEST</OPTION>
						<OPTION value="AdEPT">AdEPT</OPTION>
						<OPTION value="BPO101">BPO101</OPTION>
						<OPTION value="BPO102">BPO102</OPTION>
						<OPTION value="Service_Culture">Service Culture</OPTION>
						<OPTION value="Systems_Thinking">Systems Thinking</OPTION>
						<OPTION value="GCAT">GCAT</OPTION>
					</SELECT>
		<?php echo form_error('subject', '<div class="text-danger">', '</div>'); ?>		
		</div>
		<br/>

		<div class="form-group"><label for="Semester">Semester:</label>
		<input class="form-control" type="text" name="semester" value="<?php echo set_value('semester'); ?>" maxlength="10" />
		<?php echo form_error('semester', '<div class="text-danger">', '</div>'); ?>
		</div>

		<div class="form-group"><label for="Year">Year:</label>
		<input class="form-control" type="text" name="year" value="<?php echo set_value('year'); ?>" maxlength="4" />
		<?php echo form_error('year', '<div class="text-danger">', '</div>'); ?>
		</div>

		<div class="form-group"><label for="Section">Section:</label>
		<input class="form-control" type="text" name="section" value="<?php echo set_value('section'); ?>" maxlength="4" />
		<?php echo form_error('section', '<div class="text-danger">', '</div>'); ?>
		</div>
	</form>
	
	<legend>Student List</legend>
 
		<div class="col-md-3">
		<div class="panel panel-info">
		<div class="panel-heading">Add or Edit Student</div>
		<div class="panel-body">
		<form class="form" role="form">
			<div class="form-group">		
				<label>Last Name</label>			
				<input class="form-control" type="text" name="last_name" "<?php echo set_value('last_name'); ?>">
				<?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" name="first_name" "<?php echo set_value('first_name'); ?>">
				<?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>Middle Initial</label>
				<input type="text" class="form-control" name="middle_initial" "<?php echo set_value('middle_initial'); ?>">
				<?php echo form_error('middle_initial', '<div class="text-danger">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Student Number</label>
				<input type="text" class="form-control" name="student_id_number" "<?php echo set_value('student_id_number'); ?>">
				<?php echo form_error('student_id_number', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="submit-button">
				<button class="btn btn-primary" name="submit">Add to List</button>
			</div>
		
		</form>
	
		</div>
		</div>
				
		</div>
 
	<div class="col-md-9">
	<legend>List of Students</legend>
	<div class="customize-btn-group">
		<button class="btn btn-info">Batch Upload</button>
		<button class="btn btn-danger">Delete</button>O
	</div>
    <TABLE id="dataTable"  class="table">
        <TR>
        <TD></TD>
        <TD>Action</TD>
        <TD>Full Name</B></TD>
        <TD>Student Number</B></TD>

        </TR>
        <TR>
			<td><input type="checkbox"></td>
			<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
            <TD>Simon, Dayanara F.</TD>
            <TD>103523</TD>
            
        </TR>
    </TABLE>
	</div>


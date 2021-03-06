<SCRIPT language="javascript">
function addRow(tableID) {

	var table = document.getElementById(tableID);

	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);

	var colCount = table.rows[0].cells.length;

	for(var i=0; i<colCount; i++) {

		var newcell = row.insertCell(i);

		newcell.innerHTML = table.rows[1].cells[i].innerHTML;
		//alert(newcell.childNodes);
		switch(newcell.childNodes[0].type) {
			case "text":
			newcell.childNodes[0].value = "";
			break;
		}
	}
}

function deleteRow(tableID) {
	try {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;

		for(var i=0; i<rowCount; i++) {
			var row = table.rows[i];
			var chkbox = row.cells[0].childNodes[0];
			if(null != chkbox && true == chkbox.checked) {
				if(rowCount <= 1) {
					alert("Cannot delete all the rows.");
					break;
				}
				table.deleteRow(i);
				rowCount--;
				i--;
			}
		}
	}catch(e) {
		alert(e);
	}
}
</SCRIPT>

<div class="info-form">
<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>

    <h3>Student Class List</h3>

	<?php echo form_open('/dbms/form_studentlist'); ?> 

	<!-- BUTTONS DIV -->
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>
	
	<legend> Teacher Name </legend>
	<div class="form-inline">
		<div class="form-group">
			<label>Last Name</label>
		<input class="form-control" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" />
		<?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
		</div>

		<div class="form-group">
			<label>First Name</label>
		<input class="form-control" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" />
		<?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
		</div>

		<div class="form-group">
			<label>Middle Initial</label>
		<input class="form-control" type="text" name="middle_initial" value="<?php echo set_value('middle_initial'); ?>"  />
		<?php echo form_error('middle_initial', '<div class="text-danger">', '</div>'); ?>
		</div>
		</br>

		<legend>Class Information</legend>
		
		<div class="form-inline">

		<div class="form-group">
		<label>School</label>
				<select class="form-control" name="school">
				<?php foreach ($schools as $school): ?>
					<option value="<?php echo $school->School_ID ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
				<?php endforeach; ?>
				</select>
				<?php echo form_error('school', '<div class="text-danger">', '</div>'); ?>
			</div>

		<div class="form-group">
		<label>Semester:</label>
		<input class="form-control" type="text" name="semester" value="<?php echo set_value('semester'); ?>"  />
		<?php echo form_error('semester', '<div class="text-danger">', '</div>'); ?>
		</div>

		<div class="form-group"><label for="Year">School Year:</label>
		<input class="form-control" type="text" name="year" value="<?php echo set_value('school_year'); ?>" />
		<?php echo form_error('school_year', '<div class="text-danger">', '</div>'); ?>
		</div>

		<div class="form-group">
		<label for="Section">Section Name:</label>
		<input class="form-control" type="text" name="name" value="<?php echo set_value('name'); ?>" maxlength="250" />
		<?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
		</div>

		</div>

		<div class="">
		<div class="form-group">
		<label>Subject:</label>
			<input type="radio" name="subject" value="BEST"> BEST
			<input type="radio" name="subject" value="AdEPT"> AdEPT
			<input type="radio" name="subject" value="BPO101"> BPO101
			<input type="radio" name="subject" value="BPO102"> BPO102
			<input type="radio" name="subject" value="SC101"> Service Culture
			<input type="radio" name="subject" value="SYSTH101"> Systems Thinking
			<?php echo form_error('subject', '<div class="text-danger">', '</div>'); ?>
		</div>
	</div>		
	</div>
	
	<legend>Student List</legend>
 
		<div class="col-md-3">
		<div class="panel panel-info">
		<div class="panel-heading">Add or Edit Student</div>
		<div class="panel-body">
		<form class="form-inline" role="form">
			<div class="form-group">		
				<label>Last Name</label>			
				<input class="form-control" type="text" name="lastname" value="<?php echo set_value('lastname'); ?>"  />
		<?php echo form_error('lastname', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" name="firstname" value="<?php echo set_value('firstname'); ?>"  />
		<?php echo form_error('firstname', '<div class="text-danger">', '</div>'); ?>
			</div>
			
			<div class="form-group">
				<label>Middle Initial</label>
				<input type="text" class="form-control" name="middleinitial" value="<?php echo set_value('middleinitial'); ?>"  />
		<?php echo form_error('middleinitial', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="form-group">
				<label>Student Number</label>
				<input type="text" class="form-control" name="student_id_number" value="<?php echo set_value('student_id_number'); ?>"  />
		<?php echo form_error('student_id_number', '<div class="text-danger">', '</div>'); ?>
			</div>
			
		</form>
		</form>
	
		<div class="submit-button">
			<button class="btn btn-primary" name="submit">Add to List</button>
		</div>
		</div>
		</div>
				
		</div>
 
	<div class="col-md-9">
	<legend>List of Students</legend>
	<div class="customize-btn-group">
		<button class="btn btn-danger">Delete</button>
		<button class="btn btn-success">Refresh</button>
		<button class="btn btn-info">Print List</button>
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
	</form>
</div>



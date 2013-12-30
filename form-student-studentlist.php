<?php include('header.php'); ?>
<?php include('menu-save-draft.php'); ?>

<div class="info-form">

    <h1>Student Class List</h1>

	<legend>Class Information</legend>  
	
	<form class="form-inline">
	
		<div class="form-group"><label for="Teacher">Teacher's Full Name</label><span class="help-block">First Name, Last Name, Middle Initial</span>
		<input class="form-control" type="text" name="teacher_name" value="" maxlength="250" />
		</div>
		<br/>
		
		<div class="form-group"><label for="Name">School:</label>
		<input class="form-control" type="text" name="Name" value="" maxlength="250" />
		</div>

		<div class="form-group"><label for="Branch">Campus:</label>
		<input class="form-control" type="text" name="Branch" value="" maxlength="250" />
		</div>

		<div class="form-group"><label for="Subject">Subject:</label>
		<SELECT name="Subject" class="form-control">
						<OPTION value="BEST">BEST</OPTION>
						<OPTION value="AdEPT">AdEPT</OPTION>
						<OPTION value="BPO101">BPO101</OPTION>
						<OPTION value="BPO102">BPO102</OPTION>
						<OPTION value="Service_Culture">Service Culture</OPTION>
						<OPTION value="Systems_Thinking">Systems Thinking</OPTION>
						<OPTION value="GCAT">GCAT</OPTION>
					</SELECT>
		</div>
		<br/>

		<div class="form-group"><label for="Semester">Semester:</label>
		<input class="form-control" type="text" name="Semester" value="" maxlength="10" />
		</div>

		<div class="form-group"><label for="Year">Year:</label>
		<input class="form-control" type="text" name="year" value="" maxlength="4" />
		</div>

		<div class="form-group"><label for="Section">Section:</label>
		<input class="form-control" type="text" name="section" value="" maxlength="4" />
		</div>
	</form>
	
	<legend>Student List</legend>
 
		<div class="col-md-3">
		<div class="panel panel-info">
		<div class="panel-heading">Add or Edit Student</div>
		<div class="panel-body">
		<form class="form-inline" role="form">
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
				<label>Student Number</label>
				<input type="text" class="form-control" id="idno">
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

<?php include('footer.php'); ?>

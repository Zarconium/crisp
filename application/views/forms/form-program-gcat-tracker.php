<div class="info-form">

	<?php if (isset($draft_saved)) { echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Draft saved.</div>';} ?>
    
		<div class="save">
			<button type="button" class="btn btn-default" onclick="$('html, body').animate({ scrollTop:0 }, 300);">Back to Top</button>
			<button type="submit" class="btn btn-success" name="save_draft" value="save_draft">Save Draft</button>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
			<a href="<?php echo base_url('dbms'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>
    <h1>GCAT Student Tracker</h1>
    <legend>Tracker Information</legend>
	
    <form class="form-inline">

    <div class="form-group"><label for="Proctor">Proctor's Name</label><span class="help-block">Last Name, First Name, Middle Initial (ex: "Simon, Dayanara F.")</span>
     <input class="form-control" type="text" name="proctor_name" value="" maxlength="250" />
	</div><br/>

    <div class="form-group"><label for="Name">School</label>
     <input class="form-control" type="text" name="Name" value="" maxlength="250" />
	</div>

    <div class="form-group"><label for="Branch">Campus</label>
     <input class="form-control" type="text" name="Branch" value="" maxlength="250" />
	</div>

    <div class="form-group"><label for="Subject">Subject</label>
    <SELECT class="form-control" name="Subject">
                    <OPTION value="BEST">BEST</OPTION>
                    <OPTION value="AdEPT">AdEPT</OPTION>
                    <OPTION value="BPO101">BPO101</OPTION>
                    <OPTION value="BPO102">BPO102</OPTION>
                    <OPTION value="Service_Culture">Service Culture</OPTION>
                    <OPTION value="Systems_Thinking">Systems Thinking</OPTION>
                    <OPTION value="GCAT">GCAT</OPTION>
                </SELECT>
	</div>

    <div class="form-group"><label for="Semester">Semester</label>
     <input class="form-control" type="text" name="Semester" value="" maxlength="10" />
	</div>

    <div class="form-group"><label for="Year">Year</label>
     <input class="form-control" type="text" name="year" value="" maxlength="4" />
	</div>

    <div class="form-group"><label for="Section">Section</label>
     <input class="form-control" type="text" name="section" value="" maxlength="4" />
	</div>
    </form>

	<legend>Student List</legend>
	
	<div class="col-md-3">
		<div class="panel panel-info">
			<div class="panel-heading">
				Add to List
			</div>
			<div class="panel-body">
				<form class="form">
					<div class="form-group">
						<label>Last Name</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>First Name</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Middle Initial</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Student Number</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Session ID</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Test Date</label>
						<input class="form-control" type="date">
					</div>
				
					<div class="form-group">
						<label>Status</label>
						<input class="form-control" type="text">
					</div>
					
					<div class="form-group">
						<label>Remarks</label>
						<input class="form-control" type="text">
					</div>
				
					<div class="submit-button">
						<button class="btn btn-primary" name="submit">Add to List</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
	
		
  		
	
	<div class="col-md-9">
		<h3>List of Students</h3>	
		<div class="customize-btn-group">
			<button class="btn btn-info">Batch Upload</button>
			<button type="button" class="btn btn-danger">Delete</button>
			<button type="button" class="btn btn-success">Refresh</button>
		</div>
		<table class="table">
        <TR>
        <TH></TH>
        <TH>Action</TH>
        <TH>Full Name</TH>
        <TH>Student Number</TH>
        <TH>Session ID</TH>
        <TH>Test Date</TH>
        <TH>Status</TH>
        <TH>Remarks</TH>
        </TR>
        <TR>
			<td><input type="checkbox" ></td>
			<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
			<td>Simon, Dayanara F.</td>
			<td>103523</td>
			<td>101010</td>
			<td>11-21-2013</td>
			<td>Passed</td>
			<td>Pretty girl</td>
		</table>
           
        </TR>
	</div>
</div>
	
	


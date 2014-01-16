<div class="header">
	<h1>Reports</h1>
</div>

<table class="table">
	<tr>
		<th>Type of Sheet / Report</th>
	</tr>
	<tr>
		<td>
			<div class="panel-group" id="accordion">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#t3subject">&#x25BC; T3 Program Report Per Subject</a>
						</h4>
					</div>
					<div id="t3subject" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form" role="form">
								<div class="form-group">
									<label>Teacher</label>
									<select class="form-control">
										<option name="tsubject-teacher" value="option1">Option 1</option>
									</select>
								</div>
								<div class="form-group">
									<label>School</label><select class="form-control">
									<option name="tsubject-school" value="option1">Option 1</option>
								</select>
								</div>
								<div class="form-group">
									<label>Class</label><select class="form-control">
									<option name="tsubject-class" value="option1">Option 1</option>
								</select>
								</div>
								<div class="form-group">
									<label>T3 Tracker</label><select class="form-control">
									<option name="tsubject-tracker" value="option1">Option 1</option>
								</select>
								</div>
								<div class="button-groups">
									<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
									<button type="button" class="btn btn-info">Print as Excel</button>
									<button class="btn btn-info">Print as PDF</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="panel-group" id="accordion1">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion1" href="#t3gcat">&#x25BC; T3 Program Report GCAT</a>
						</h4>
					</div>
					<div id="t3gcat" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form" role="form">
								<div class="form-group">
									<label>Teacher</label><select class="form-control">
									<option name="t3gcat-teacher" value="option1">Option 1</option>
								</select>
								</div>
								<div class="form-group">
									<label>School</label><select class="form-control">
									<option name="t3gcat-school" value="option1">Option 1</option>
								</select>
								</div>
								<div class="form-group">
									<label>GCAT Tracker</label><select class="form-control">
									<option name="t3gcat-class" value="option1">Option 1</option>
								</select>
								</div>
								<div class="button-groups">
									<button type="submit" class="btn btn-primary">View Report</button>
									<button class="btn btn-info">Print as Excel</button>
									<button class="btn btn-info">Print as PDF</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="panel-group" id="accordion2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#suc">&#x25BC; SUC Report</a>
						</h4>
					</div>
					<div id="suc" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form" role="form">
								<div class="form-group">
									<label>School</label>
									<select class="form-control">
										<option name="school" value="option1">Option 1</option>
									</select>
								</div>
								<div class="button-groups">
									<button type="submit" class="btn btn-primary">View Report</button>
									<button class="btn btn-info">Print as Excel</button>
									<button class="btn btn-info">Print as PDF</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="panel-group" id="accordion3">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion3" href="#sucsmp">&#x25BC; SUC Report with complete SMP list</a>
						</h4>
					</div>
					<div id="sucsmp" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form" role="form">
								<div class="form-group">
									<label>School</label>
									<select class="form-control">
										<option name="sucsmpschool" value="option1">Option 1</option>
									</select>
								</div>
								<div class="form-group">
									<label>Teacher</label>
									<select class="form-control">
										<option name="suchsmpteacher" value="option1">Option 1</option>
									</select>
								</div>
								<div class="button-groups">
									<button type="submit" class="btn btn-primary">View Report</button>
									<button class="btn btn-info">Print as Excel</button>
									<button class="btn btn-info">Print as PDF</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>	
		</td>
	</tr>
	<tr>
		<td>
			<div class="panel-group" id="accordion4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion4" href="#sprgcat">&#x25BC; Student Program Report GCAT</a>
						</h4>
					</div>
					<div id="sprgcat" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form" role="form">
								<div class="form-group">
									<label>School</label>
									<select class="form-control">
										<option name="sucsmpschool" value="option1">Option 1</option>
									</select>
								</div>
								<div class="form-group">
									<label>Student</label>
									<select class="form-control">
										<option name="suchsmpteacher" value="option1">Option 1</option>
									</select>
								</div>
								<div class="button-groups">
									<button type="submit" class="btn btn-primary">View Report</button>
									<button class="btn btn-info">Print as Excel</button>
									<button class="btn btn-info">Print as PDF</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</td>
	</tr>
</table>
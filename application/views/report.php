<div class="header">
	<h1>Reports</h1>
</div>


<ul class="nav nav-tabs">
  <li class="active"><a href="#program" data-toggle="tab">Program</a></li>
  <li><a href="#SUC" data-toggle="tab">SUC</a></li>
  <li><a href="#MandE" data-toggle="tab">Monitoring and Evaluation</a></li>
</ul>		

<div class="tab-content">
	<div class="tab-pane active" id="program">

	<!-- Student Program Report GCAT -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_gcat">&#x25BC;</a> Student Program Report GCAT
					</h4>
				</div>
				<div id="program_student_gcat" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_student_gcat_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_student_gcat_end_date">
							</div>
							
							<div class="button-groups">
							
								<a href="<?php echo base_url('reports/studentProgramReportGCAT'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	<!-- Student Program Report BEST -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_best">&#x25BC;</a> Student Program Report BEST
					</h4>
				</div>
				<div id="program_student_best" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_student_best_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_student_best_end_date">
							</div>
							
							<div class="button-groups">
							
								<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		
	<!-- Student Program Report ADEPT -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_adept">&#x25BC;</a> Student Program Report ADEPT
					</h4>
				</div>
				<div id="program_student_adept" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_student_adept_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_student_adept_end_date">
							</div>
							
							<div class="button-groups">
							
								<a href="<?php echo base_url('reports/studentAdeptProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	<!-- T3 Program Report -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_t3">&#x25BC;</a> T3 Program Report
					</h4>
				</div>
				<div id="program_t3" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_t3_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_st3_end_date">
							</div>
							
							<div class="button-groups">
							
								<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		
	<!-- Student Program Report per Subject -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_subject">&#x25BC;</a> Student Program Report Per Subject
					</h4>
				</div>
				<div id="program_student_subject" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_student_subject_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_student_subject_end_date">
							</div>
							
							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="program_student_subject_subject">
									<option value="option1">Option 1</option>
								</select>
							</div>
							
							<div class="button-groups">
							
								<a href="<?php echo base_url('reports/studentProgramReportPerSub'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	<!-- T3 Program Report per Subject -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_t3_subject">&#x25BC;</a> T3 Program Report Per Subject
					</h4>
				</div>
				<div id="program_t3_subject" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_t3_subject_start_date">
							</div>
							
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_t3_subject_end_date">
							</div>
							
							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="program_student_t3__subject">
									<option value="option1">Option 1</option>
								</select>
							</div>
							
							<div class="button-groups">
							
								<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>

	
	<div class="tab-pane" id="SUC">
	
		<!-- Students by Program -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_student">&#x25BC;</a> Students by Program
					</h4>
				</div>
				<div id="suc_student" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">
							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="suc_student_subject">
									<option value="option1">Option 1</option>
								</select>
							</div>
							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_student_school">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Semester</label>
								<select class="form-control" name="suc_student_semester">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Teacher</label>
								<select class="form-control" name="suc_student_teacher">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="button-groups">
							
								<a href="<?php echo base_url('reports/getAllStudentsByPogram'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- SMP Class List -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_smp_class_list">&#x25BC;</a> SMP Class List
					</h4>
				</div>
				<div id="suc_smp_class_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">

							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_smp_class_list_school">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Class Name</label>
								<select class="form-control" name="suc_smp_class_list_class">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Teacher</label>
								<select class="form-control" name="suc_smp_class_list_teacher">
									<option value="option1">Option 1</option>
								</select>
							</div>
							
							
							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="suc_smp_class_list_subject">
									<option value="option1">Option 1</option>
								</select>
							</div>
							
							<div class="button-groups">
								<a href="<?php echo base_url('reports/getAllStudentClassSUCReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
					
	
	<!-- GCAT Class List -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_gcat_student_list">&#x25BC;</a> GCAT Student List
					</h4>
				</div>
				<div id="suc_gcat_student_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">

							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_gcat_student_list_school">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Class Name</label>
								<select class="form-control" name="suc_gcat_student_list_class">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Teacher</label>
								<select class="form-control" name="suc_gcat_student_list_teacher">
									<option value="option1">Option 1</option>
								</select>
							</div>
							
							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="suc_gcat_student_list_subject">
									<option value="option1">Option 1</option>
								</select>
							</div>
							
							<div class="button-groups">
								<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
					
	<!-- ADEPT Class List -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_adept_student_list">&#x25BC;</a> ADEPT Student List
					</h4>
				</div>
				<div id="suc_adept_student_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_adept_student_list_school">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" class="form-control" name="suc_adept_student_list_date_start">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" class="form-control" name="suc_adept_student_list_date_end">
							</div>
							
							<div class="button-groups">
								<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>

							
	<!-- BEST Class List -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_best_student_list">&#x25BC;</a> BEST Student List
					</h4>
				</div>
				<div id="suc_best_student_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_best_student_list_school">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" class="form-control" name="suc_best_student_list_date_start">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" class="form-control" name="suc_best_student_list_date_end">
							</div>
							
							<div class="button-groups">
								<a href="<?php echo base_url('reports/getAllBestStudentSUCReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
					
					
		<!-- T3 BEST -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_t3_best_class_list">&#x25BC;</a> T3 BEST
					</h4>
				</div>
				<div id="suc_t3_best_class_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_t3_best_class_list_school">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" class="form-control" name="suc_t3_best_class_list_date_start">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" class="form-control" name="suc_t3_best_class_list_date_end">
							</div>
							
							<div class="button-groups">
								<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>

	<!-- T3 ADEPT -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_t3_adept_class_list">&#x25BC;</a> T3 ADEPT
					</h4>
				</div>
				<div id="suc_t3_adept_class_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_t3_adept_class_list_school">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" class="form-control" name="suc_t3_adept_class_list_date_start">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" class="form-control" name="suc_t3_adept_class_list_date_end">
							</div>
							
							<div class="button-groups">
								<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>


	<!-- T3 GCAT Class List-->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_t3_gcat_class_list">&#x25BC;</a> T3 GCAT
					</h4>
				</div>
				<div id="suc_t3_gcat_class_list" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_t3_gcat_class_list_school">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Date Start</label>
								<input type="date" class="form-control" name="suc_t3_gcat_class_list_date_start">
							</div>
							<div class="form-group">
								<label>Date End</label>
								<input type="date" class="form-control" name="suc_t3_gcat_class_list_date_end">
							</div>
							
							<div class="button-groups">
								<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
		
		
		

	<!-- T3 SMP -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_smp">&#x25BC;</a> T3 SMP
					</h4>
				</div>
				<div id="suc_smp" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_smp_school">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Subject</label>
								<select class="form-control" name="suc_smp_subject">
									<option value="option1">Option 1</option>
								</select>
							</div>
							<div class="form-group">
								<label>Semester</label>
								<select class="form-control" name="suc_smp_semester">
									<option value="option1">Option 1</option>
								</select>
							</div>
							
							<div class="button-groups">
								<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
	<div class="tab-pane" id="MandE">
	
		<!-- Quarterly Reports -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#mande_quarter">&#x25BC;</a> Quarterly Report
					</h4>
				</div>
				<div id="mande_quarter" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">							
							<div class="form-group">
								<label>Year</label>
								<input class="form-control" type="number" name="mande_quarter_year" min="2011">
							</div>
							
							<div class="button-groups">
								<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Monthly Report -->
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#mande_month">&#x25BC;</a> Monthly Report
					</h4>
				</div>
				<div id="mande_month" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form" role="form">							
							<div class="form-group">
								<label>Year</label>
								<input class="form-control" type="number" name="mande_month_year" min="2011">
							</div>
							
							<div class="button-groups">
								<a href="<?php echo base_url('reports/studentBestProgramReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

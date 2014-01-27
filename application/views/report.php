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

		<div class="panel-group" id="accordion">
			<!-- Student Program Report GCAT -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_gcat">&#x25BC; Student Program Report GCAT</a>
					</h4>
				</div>
				<div id="program_student_gcat" class="panel-collapse collapse">
					<div class="panel-body">
						<!-- CHANGE THIS --><form class="form" role="form" action="<?php echo base_url('reports/studentProgramReportGCAT'); ?>" method="post" target="_blank">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="program_student_gcat_start_date">
							</div>

							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="program_student_gcat_end_date">
							</div>

							<div class="button-groups">
								<!-- CHANGE THIS ALSO --><button type="submit" class="btn btn-primary" name="submit" value="submit">View Report</button>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Student Program Report BEST -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_best">&#x25BC; Student Program Report BEST</a>
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

			<!-- Student Program Report ADEPT -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_adept">&#x25BC; Student Program Report ADEPT</a>
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

			<!-- Student Program Report per Subject -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_student_subject">&#x25BC; Student Program Report Per Subject</a>
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

			<!-- T3 Program Report 
			NOT YET DONE
			-->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_t3">&#x25BC; T3 Program Report GCAT</a>
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
								<a href="<?php echo base_url('reports/'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
								<button type="button" class="btn btn-info">Print as Excel</button>
								<button type="button" class="btn btn-info">Print as PDF</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- T3 Program Report per Subject
			NOT YET DONE
			-->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#program_t3_subject">&#x25BC; T3 Program Report Per Subject</a>
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
								<a href="<?php echo base_url('reports/'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
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
									<?php foreach ($subjects as $subject): ?>
										<option value="<?php echo $subject->Subject_Code; ?>"><?php echo $subject->Subject_Code; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
							<div class="form-group">
								<label>School</label>
								<select class="form-control" name="suc_student_school">
								<?php foreach ($schools as $school): ?>
									<option value="<?php echo $school->School_ID ?>"><?php echo $school->Name . " - " . $school->Branch ?></option>
								<?php endforeach; ?>
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
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_smp_class_list">&#x25BC;</a> Class List SMP 
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
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_gcat_student_list">&#x25BC;</a> Student List GCAT
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
								<a href="<?php echo base_url('reports/getAllGCATStudentSUCReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
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
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_adept_student_list">&#x25BC;</a> Student List ADEPT
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
								<a href="<?php echo base_url('reports/getAllAdeptStudentSUCReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
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
						<a data-toggle="collapse" data-parent="#accordion" href="#suc_best_student_list">&#x25BC;</a> Student List BEST
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
								<a href="<?php echo base_url('reports/getAllT3BestSUCReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
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
								<a href="<?php echo base_url('reports/getAllT3AdeptSUCReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
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
								<a href="<?php echo base_url('reports/getAllT3GCATSUCReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
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
								<a href="<?php echo base_url('reports/getAllT3SMPSUCReport'); ?>" target="_blank"><button type="button" class="btn btn-primary">View Report</button></a>
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
		<div class="panel-group" id="accordion3">
		<!-- Quarterly Reports -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion3" href="#mande_quarter">&#x25BC; Quarterly Report</a>
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

			<!-- Monthly Report -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion3" href="#mande_month">&#x25BC; Monthly Report</a>
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

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reports_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('logged_in'))
		{

		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		if ($this->session->userdata('logged_in')['type'] == 'encoder')
		{
			$data['schools'] = $this->school->getEncoderSchool();
		}
		else
		{
			$data['schools'] = $this->school->getAllSchools();
		}

		$data['subjects'] = $this->subject->getAllSubjects();
		$data['teachers'] = $this->teacher->getAllTeachersFormatted();
		$data['proctors'] = $this->proctor->getAllProctorsFormatted();
		$data['best_classes'] = $this->classes->getAllBestClasses();
		$data['adept_classes'] = $this->classes->getAllAdeptClasses();
		$data['gcat_classes'] = $this->classes->getAllGCATClasses();
		$data['smp_subjects'] = $this->subject->getSMPSubjects();
		$data['smp_classes'] = $this->classes->getAllSMPClasses();
		$data['subjects_except_gcat'] = $this->subject->getSubjectsExceptGcat();
		$data['mne_years'] = $this->users_targets->getYears();

	
		$this->load->view('header');
		$this->load->view('report', $data);
		$this->load->view('footer');
	}

	function studentAdeptProgramReport()
	{
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$start_date = $this->input->post('program_student_adept_start_date');
		$end_date = $this->input->post('program_student_adept_end_date');


/*		$start_date = "1990-01-01"; $end_date= "2020-01-01";
*/		
		$data['pin_count_list'] = $this->report_program->getStudentAdeptProgramReportPins($start_date, $end_date);
		$data['pin_total'] = $this->report_program->getStudentAdeptProgramReportPinsTotal($start_date, $end_date);
		$data['current_takers_count_list'] = $this->report_program->getStudentAdeptProgramReportCurrentTakers($start_date, $end_date);
		$data['current_takers_total'] = $this->report_program->getStudentAdeptProgramReportCurrentTakersTotal($start_date, $end_date);
		$data['completed_count_list'] = $this->report_program->getStudentAdeptProgramReportCompleted($start_date, $end_date);
		$data['completed_total'] = $this->report_program->getStudentAdeptProgramReportCompletedTotal($start_date, $end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_adept', $data);
		$this->load->view('footer-print');
	}
	

	function studentBestProgramReport()
	{
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$start_date = $this->input->post('program_student_best_start_date');
		$end_date = $this->input->post('program_student_best_end_date');

		$data['pin_count_list'] = $this->report_program->getStudentBestProgramReportPins($start_date, $end_date);
		$data['pin_total'] = $this->report_program->getStudentBestProgramReportPinsTotal($start_date, $end_date);
		$data['current_takers_count_list'] = $this->report_program->getStudentBestProgramReportCurrentTakers($start_date, $end_date);
		$data['current_takers_total'] = $this->report_program->getStudentBestProgramReportCurrentTakersTotal($start_date, $end_date);
		$data['completed_count_list'] = $this->report_program->getStudentBestProgramReportCompleted($start_date, $end_date);
		$data['completed_total'] = $this->report_program->getStudentBestProgramReportCompletedTotal($start_date, $end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_best', $data);
		$this->load->view('footer-print');

	}

	function studentProgramReportGCAT()
	{
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$start_date = $this->input->post('program_student_gcat_start_date');
		$end_date = $this->input->post('program_student_gcat_end_date');


		$data['count_list'] = $this->report_program->getStudentProgramReportGCAT($start_date, $end_date);
		$data['total'] = $this->report_program->getStudentProgramReportGCATTotal($start_date, $end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_gcat', $data);
		$this->load->view('footer-print');
	}

	
	function studentProgramReportPerSub()
	{

		
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}
		
		
		$start_date = $this->input->post('program_student_subject_start_date');
		$end_date = $this->input->post('program_student_subject_end_date');
		$subject_id = $this->input->post('program_student_subject_subject');
		
		
		/*
			$subject_id=1;
			$start_date = "1990-01-01"; $end_date= "2020-01-01";
		*/
		$data['currently_taking_list'] = $this->report_program->getStudentProgramReportPerSubCurrentTakers($start_date, $end_date, $subject_id);
		$data['total_ct'] = $this->report_program->getStudentProgramReportPerSubCurrentTakersTotal($start_date, $end_date, $subject_id);
		$data['finished_list'] = $this->report_program->getStudentProgramReportPerSubFinished($start_date, $end_date, $subject_id);
		$data['total_ft'] = $this->report_program->getStudentProgramReportPerSubFinishedTotal($start_date, $end_date, $subject_id);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['subject'] = $this->subject->getSubjectByID($subject_id);
		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_per_sub', $data);
		$this->load->view('footer-print');
	}

	function t3ProgramReportGCAT()
	{
		
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}
		
		
		$start_date = $this->input->post('program_t3_start_date');
		$end_date = $this->input->post('program_t3_end_date');

		/*$start_date = "1990-01-01"; $end_date= "2020-01-01";*/

		$data['t3_count_list'] = $this->report_program->gett3ProgramReportGCAT($start_date, $end_date);
		$data['t3_total'] = $this->report_program->getT3ProgramReportGCATTotal($start_date, $end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$this->load->view('header-print');
		$this->load->view('reports/program_report_t3_gcat', $data);
		$this->load->view('footer-print');


	}
	
	function T3ProgramReportPerSub()
	{
		/*$start_date = "1990-01-01"; $end_date= "2020-01-01"; $subject_id="1";*/
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}
		
		
		$start_date = $this->input->post('program_t3_subject_start_date');
		$end_date = $this->input->post('program_t3_subject_end_date');
		$subject_id = $this->input->post('program_student_t3_subject');
		
		$data['t3_count_list'] = $this->report_program->getT3ProgramReportPerSub($start_date, $end_date, $subject_id);
		$data['t3_total'] = $this->report_program->getT3ProgramReportPerSubTotal($start_date, $end_date, $subject_id);
		$data['class_count'] = $this->report_program->getT3ProgramReportPerSubClasses($subject_id);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['subject'] = $this->subject->getSubjectByID($subject_id);

		$this->load->view('header-print');
		$this->load->view('reports/program_report_t3_per_sub', $data);
		$this->load->view('footer-print');
	}

	function sucReport()
	{
		
		/*$schoolcode="BatStateU-Lipa";
		$start_date = "1990-01-01"; 
		$end_date= "2020-01-01";*/
		

		
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}
		
		$schoolcode = $this->input->post('program_suc_report_school_code');
		$start_date = $this->input->post('program_suc_report_start_date');
		$end_date = $this->input->post('program_suc_report_end_date');
		

		$data['teacher_count_list'] = $this->report_program->getSucReportTeachers($schoolcode, $start_date, $end_date);
		$data['student_completed_count_list'] = $this->report_program->getSucReportStudentsCompleted($schoolcode, $start_date, $end_date);
		$data['student_currently_taking_count_list'] = $this->report_program->getSucReportStudentsCurrentlyTaking($schoolcode, $start_date, $end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($schoolcode);
		$this->load->view('header-print');
		$this->load->view('reports/program_report_suc_report', $data);
		$this->load->view('footer-print');

	}

	//PROGRAM - SEI

	function studentAdeptProgramReportSei()
	{
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$start_date = $this->input->post('program_student_adept_start_date_sei');
		$end_date = $this->input->post('program_student_adept_end_date_sei');


/*		$start_date = "1990-01-01"; $end_date= "2020-01-01";
*/		
		$data['pin_count_list'] = $this->report_program_sei->getStudentAdeptProgramReportPins($start_date, $end_date);
		$data['pin_total'] = $this->report_program_sei->getStudentAdeptProgramReportPinsTotal($start_date, $end_date);
		$data['current_takers_count_list'] = $this->report_program_sei->getStudentAdeptProgramReportCurrentTakers($start_date, $end_date);
		$data['current_takers_total'] = $this->report_program_sei->getStudentAdeptProgramReportCurrentTakersTotal($start_date, $end_date);
		$data['completed_count_list'] = $this->report_program_sei->getStudentAdeptProgramReportCompleted($start_date, $end_date);
		$data['completed_total'] = $this->report_program_sei->getStudentAdeptProgramReportCompletedTotal($start_date, $end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_adept', $data);
		$this->load->view('footer-print');
	}
	

	function studentBestProgramReportSei()
	{
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$start_date = $this->input->post('program_student_best_start_date_sei');
		$end_date = $this->input->post('program_student_best_end_date_sei');

		$data['pin_count_list'] = $this->report_program_sei->getStudentBestProgramReportPins($start_date, $end_date);
		$data['pin_total'] = $this->report_program_sei->getStudentBestProgramReportPinsTotal($start_date, $end_date);
		$data['current_takers_count_list'] = $this->report_program_sei->getStudentBestProgramReportCurrentTakers($start_date, $end_date);
		$data['current_takers_total'] = $this->report_program_sei->getStudentBestProgramReportCurrentTakersTotal($start_date, $end_date);
		$data['completed_count_list'] = $this->report_program_sei->getStudentBestProgramReportCompleted($start_date, $end_date);
		$data['completed_total'] = $this->report_program_sei->getStudentBestProgramReportCompletedTotal($start_date, $end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_best', $data);
		$this->load->view('footer-print');

	}

	function studentProgramReportGCATSei()
	{
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$start_date = $this->input->post('program_student_gcat_start_date_sei');
		$end_date = $this->input->post('program_student_gcat_end_date_sei');
		//$this->load->model('report_program_sei');

		$data['count_list'] = $this->report_program_sei->getStudentProgramReportGCAT($start_date, $end_date);
		$data['total'] = $this->report_program_sei->getStudentProgramReportGCATTotal($start_date, $end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_gcat', $data);
		$this->load->view('footer-print');
	}

	
	function studentProgramReportPerSubSei()
	{

		
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}
		
		
		$start_date = $this->input->post('program_student_subject_start_date_sei');
		$end_date = $this->input->post('program_student_subject_end_date_sei');
		$subject_id = $this->input->post('program_student_subject_subject_sei');
		
		
		/*
			$subject_id=1;
			$start_date = "1990-01-01"; $end_date= "2020-01-01";
		*/
		$data['currently_taking_list'] = $this->report_program_sei->getStudentProgramReportPerSubCurrentTakers($start_date, $end_date, $subject_id);
		$data['total_ct'] = $this->report_program_sei->getStudentProgramReportPerSubCurrentTakersTotal($start_date, $end_date, $subject_id);
		$data['finished_list'] = $this->report_program_sei->getStudentProgramReportPerSubFinished($start_date, $end_date, $subject_id);
		$data['total_ft'] = $this->report_program_sei->getStudentProgramReportPerSubFinishedTotal($start_date, $end_date, $subject_id);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['subject'] = $this->subject->getSubjectByID($subject_id);
		$this->load->view('header-print');
		$this->load->view('reports/program_report_student_per_sub', $data);
		$this->load->view('footer-print');
	}

	function t3ProgramReportGCATSei()
	{
		
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}
		
		
		$start_date = $this->input->post('program_t3_start_date_sei');
		$end_date = $this->input->post('program_t3_end_date_sei');

		/*$start_date = "1990-01-01"; $end_date= "2020-01-01";*/

		$data['t3_count_list'] = $this->report_program_sei->gett3ProgramReportGCAT($start_date, $end_date);
		$data['t3_total'] = $this->report_program_sei->getT3ProgramReportGCATTotal($start_date, $end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$this->load->view('header-print');
		$this->load->view('reports/program_report_t3_gcat', $data);
		$this->load->view('footer-print');


	}
	
	function T3ProgramReportPerSubSei()
	{
		/*$start_date = "1990-01-01"; $end_date= "2020-01-01"; $subject_id="1";*/
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}
		
		
		$start_date = $this->input->post('program_t3_subject_start_date_sei');
		$end_date = $this->input->post('program_t3_subject_end_date_sei');
		$subject_id = $this->input->post('program_student_t3_subject_sei');
		
		$data['t3_count_list'] = $this->report_program_sei->getT3ProgramReportPerSub($start_date, $end_date, $subject_id);
		$data['t3_total'] = $this->report_program_sei->getT3ProgramReportPerSubTotal($start_date, $end_date, $subject_id);
		$data['class_count'] = $this->report_program_sei->getT3ProgramReportPerSubClasses($subject_id);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['subject'] = $this->subject->getSubjectByID($subject_id);

		$this->load->view('header-print');
		$this->load->view('reports/program_report_t3_per_sub', $data);
		$this->load->view('footer-print');
	}

	function sucReportSei()
	{
		
		/*$schoolcode="BatStateU-Lipa";
		$start_date = "1990-01-01"; 
		$end_date= "2020-01-01";*/
		

		
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}
		
		$schoolcode = $this->input->post('program_suc_report_school_code_sei');
		$start_date = $this->input->post('program_suc_report_start_date_sei');
		$end_date = $this->input->post('program_suc_report_end_date_sei');
		

		$data['teacher_count_list'] = $this->report_program_sei->getSucReportTeachers($schoolcode, $start_date, $end_date);
		$data['student_completed_count_list'] = $this->report_program_sei->getSucReportStudentsCompleted($schoolcode, $start_date, $end_date);
		$data['student_currently_taking_count_list'] = $this->report_program_sei->getSucReportStudentsCurrentlyTaking($schoolcode, $start_date, $end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($schoolcode);
		$this->load->view('header-print');
		$this->load->view('reports/program_report_suc_report', $data);
		$this->load->view('footer-print');

	}





	//SUC Controller
	function smpClassesSUCReport()
	{
		#here
		/*$teacher_code="CODE432";
		$subject_code="SC101";
		$semester="4";
		$school_code="BatStateU-Lipa";
		$start_date = "1990-01-01"; 
		$end_date= "2020-01-01";*/
		
		
		
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$teacher_code = $this->input->post('suc_teacher_class');
		$subject_code = $this->input->post('suc_subject_class');
		$semester = $this->input->post('suc_semester_class');
		$school_code = $this->input->post('suc_school_class');
		$start_date = $this->input->post('suc_start_date_smp_class');
		$end_date = $this->input->post('suc_end_date_smp_class');
		

		$data['class_list'] = $this->report_suc->getStudentClass($subject_code,$school_code,$semester,$teacher_code, $start_date, $end_date);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['subject'] = $this->subject->getSubjectByCode($subject_code);
		$data['semester'] = $semester;
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($school_code);
		$this->load->view('header-print');
		$this->load->view('reports/suc_report_smp_classes', $data);
		$this->load->view('footer-print');

	}

	function BestStudentClassesSUCReport()
	{

		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$teacher_code = $this->input->post('suc_best_teacher_class');
		$semester = $this->input->post('suc_best_semester_class');
		$school_code = $this->input->post('suc_best_school_class');
		$start_date = $this->input->post('suc_start_date_best_class');
		$end_date = $this->input->post('suc_end_date_best_class');

		/*$school_code="BatStateU-Malvar";
		$semester=3;
		$teacher_code="CODE123";*/

		
		$data['best_class_list'] = $this->report_suc->getBestStudentClasses ($school_code,$semester, $teacher_code, $start_date, $end_date);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['semester'] = $semester;
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($school_code);
		$this->load->view('header-print');
		$this->load->view('reports/suc_report_best_student_classes', $data);
		$this->load->view('footer-print');
	}

	function AdeptStudentClassesSUCReport()
	{

		
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$teacher_code = $this->input->post('suc_adept_teacher_class');
		$semester = $this->input->post('suc_adept_semester_class');
		$school_code = $this->input->post('suc_adept_school_class');
		$start_date = $this->input->post('suc_start_date_adept_class');
		$end_date = $this->input->post('suc_end_date_adept_class');
		/*$school_code="BatStateU-Malvar";
		$semester=3;
		$teacher_code="CODE123";*/

		$data['adept_class_list'] = $this->report_suc->getAdeptStudentClasses ($school_code,$semester, $teacher_code, $start_date, $end_date);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['semester'] = $semester;
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($school_code);
		$this->load->view('header-print');
		$this->load->view('reports/suc_report_adept_student_classes', $data);
		$this->load->view('footer-print');
	}


	
	function GCATStudentClassesSUCReport()
	{

		
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$school_code = $this->input->post('suc_gcat_school_class');
		$semester = $this->input->post('suc_gcat_semester_class');
		$proctor_id = $this->input->post('suc_gcat_proctor_class');
		$start_date = $this->input->post('suc_start_date_gcat_class');
		$end_date = $this->input->post('suc_end_date_gcat_class');

	/*	$school_code="BatStateU-Lipa";
		$semester=1;
		$proctor_id=1;
*/
		$data['gcat_class_list'] = $this->report_suc->getGCATStudentClasses($school_code, $semester, $proctor_id, $start_date, $end_date);
		$data['proctor'] = $this->proctor->getProctorById($proctor_id);
		$data['semester'] = $semester;
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($school_code);
	
		$this->load->view('header-print');
		$this->load->view('reports/suc_report_gcat_student_classes', $data);
		$this->load->view('footer-print');
	}

	function BestStudentsSUCReport()
	{

		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$teacher_code = $this->input->post('suc_best_teacher_students');
		$semester = $this->input->post('suc_best_semester_students');
		$school_code = $this->input->post('suc_best_school_students');
		$class_name = $this->input->post('suc_best_class_students');
		$start_date = $this->input->post('suc_start_date_best_students');
		$end_date = $this->input->post('suc_end_date_best_students');

		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['semester'] = $semester;
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($school_code);
		$data['class']=$class_name;
		
		
		

/*
		$teacher_code="CODE432";
		$school_code="BatStateU-Lipa";
		$class_name="BPO101-D";
		$semester=4;*/
		

		$data['best_student_list'] = $this->report_suc->getBestStudents($school_code,$semester,$teacher_code,$class_name, $start_date, $end_date);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['semester'] = $semester;
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($school_code);
		$data['class']=$class_name;
		$this->load->view('header-print');
		$this->load->view('reports/suc_report_best_students', $data);
		$this->load->view('footer-print');
	}

	
	function AdeptStudentsSUCReport()
	{

		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$teacher_code = $this->input->post('suc_adept_teacher_students');
		$semester = $this->input->post('suc_adept_semester_students');
		$school_code = $this->input->post('suc_adept_school_students');
		$class_name = $this->input->post('suc_adept_class_students');
		$start_date = $this->input->post('suc_start_date_adept_students');
		$end_date = $this->input->post('suc_end_date_adept_students');

		/*$class_name="BPO101-D";
		$school_code="BatStateU-Lipa";
		$semester=4;
		$teacher_code="CODE432";*/

		$data['adept_student_list'] = $this->report_suc->getAdeptStudents($school_code,$semester,$teacher_code,$class_name, $start_date, $end_date);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['semester'] = $semester;
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($school_code);
		$data['class']=$class_name;
		$this->load->view('header-print');
		$this->load->view('reports/suc_report_adept_students', $data);
		$this->load->view('footer-print');
	}


	function GCATStudentSUCReport()
	{

		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$proctor_id = $this->input->post('suc_gcat_proctor_students');
		$semester = $this->input->post('suc_gcat_semester_students');
		$school_code = $this->input->post('suc_gcat_school_students');
		$class_name = $this->input->post('suc_gcat_class_students');
		$start_date = $this->input->post('suc_start_date_gcat_students');
		$end_date = $this->input->post('suc_end_date_gcat_students');
		
		/*$proctor_id=1;
		$school_code="BatStateU-Lipa";
		$semester=1;
		$class_name="GCAT";*/

		$data['gcat_student_list'] = $this->report_suc->getGCATStudent($school_code,$semester, $proctor_id ,$class_name, $start_date, $end_date);
		$data['proctor'] = $this->proctor->getProctorById($proctor_id);		
		$data['semester'] = $semester;
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($school_code);
		$data['class']=$class_name;
		$this->load->view('header-print');
		$this->load->view('reports/suc_report_gcat_students', $data);
		$this->load->view('footer-print');

	}




#STRRT HERE
	function SMPStudentSUCReport()
	{

		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$teacher_code = $this->input->post('suc_smp_teacher_students');
		$subject_id = $this->input->post('suc_smp_subject_students');
		$school_code = $this->input->post('suc_smp_school_students');
		$semester = $this->input->post('suc_smp_semester_students');
		$class_name = $this->input->post('suc_smp_class_students');
		$start_date = $this->input->post('suc_start_date_smp_students');
		$end_date = $this->input->post('suc_end_date_smp_students');

		/*$teacher_code="CODE432";
		$semester=4;
		$school_code="BatStateU-Lipa";
		$subject_id=1;
		$class_name="BPO101-C";*/

		$data['smp_student_list'] = $this->report_suc->getallSMPStudent($subject_id,$school_code,$semester,$teacher_code,$class_name, $start_date, $end_date);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['subject'] = $this->subject->getSubjectByID($subject_id);
		$data['semester'] = $semester;
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($school_code);
		$data['class']=$class_name;
		$this->load->view('header-print');
		$this->load->view('reports/suc_report_smp_student', $data);
		$this->load->view('footer-print');
	}



	function T3BestSUCReport()
	{

		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$start_date = $this->input->post('suc_t3_best_class_list_date_start');
		$end_date = $this->input->post('suc_t3_best_class_list_date_end');
		$school_code = $this->input->post('suc_t3_best_class_list_school');

		/*$start_date = "1990-01-01"; 
		$end_date= "2020-01-01";
		$school_code="BatStateU-Lipa";*/

		$data['T3_best_list'] = $this->report_suc->getT3Best($school_code,$start_date,$end_date);
		$data['school'] = $this->school->getSchoolByCode($school_code);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($school_code);

		$this->load->view('header-print');
		$this->load->view('reports/suc_report_T3_Best', $data);
		$this->load->view('footer-print');
	}

	function T3AdeptSUCReport()
	{

		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$start_date = $this->input->post('suc_t3_adept_class_list_date_start');
		$end_date = $this->input->post('suc_t3_adept_class_list_date_end');
		$school_code = $this->input->post('suc_t3_adept_class_list_school');

		/*$start_date = "1990-01-01"; $end_date= "2020-01-01";
		$school_code="BatStateU-Lipa";
*/
		$data['T3_adept_list'] = $this->report_suc->getT3Adept ($school_code,$start_date,$end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['school'] = $this->school->getSchoolByCode($school_code);
		$this->load->view('header-print');
		$this->load->view('reports/suc_report_T3_Adept', $data);
		$this->load->view('footer-print');
	}

	function SMPTotalSUCReport()
	{
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$school_code = $this->input->post('suc_t3_smp_school');
		$semester = $this->input->post('suc_t3_smp_semester');
		$subject_id = $this->input->post('suc_t3_smp_subject');
		$start_date = $this->input->post('suc_t3_smp_date_start');
		$end_date = $this->input->post('suc_t3_smp_date_end');

		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;

		/*$school_code="BatStateU-Malvar";
		$semester=3;
		$subject = 1;*/

		$data['smp_total_list'] = $this->report_suc->getSMPTotal($school_code,$subject_id,$semester,$start_date,$end_date);
		$data['subject'] = $this->subject->getSubjectByID($subject_id);
		$data['semester'] = $semester;
		$data['school'] = $this->school->getSchoolByCode($school_code);


		$this->load->view('header-print');
		$this->load->view('reports/suc_report_smp_total', $data);
		$this->load->view('footer-print');

	}

	//MNE Controller

	function mneQuarterlyReport()
	{
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$qtr1_start = $this->input->post('mande_quarter_year') . "-01-01";
		$qtr1_end = $this->input->post('mande_quarter_year') . "-03-31 23:59:59";
		$qtr2_start=$this->input->post('mande_quarter_year') .  "-04-01";
		$qtr2_end = $this->input->post('mande_quarter_year') . "-06-30 23:59:59";
		$qtr3_start=$this->input->post('mande_quarter_year') . "-07-01";
		$qtr3_end = $this->input->post('mande_quarter_year') . "-09-30 23:59:59";
		$qtr4_start= $this->input->post('mande_quarter_year') . "-10-01";
		$qtr4_end = $this->input->post('mande_quarter_year') . "-12-31 23:59:59";
		$annual_start= $this->input->post('mande_quarter_year') . "-01-01";
		$annual_end= $this->input->post('mande_quarter_year') . "-12-31 23:59:59";

		/*$qtr1_start="1990-01-01"; $qtr1_end = "2020-01-01"; $qtr2_start="1990-01-01"; $qtr2_end = "2020-01-01"; $qtr3_start="1990-01-01"; $qtr3_end = "2020-01-01"; $qtr4_start="1990-01-01"; $qtr4_end = "2020-01-01"; $annual_start="1990-01-01"; $annual_end="2020-01-01";*/
		$data['annual_start']=$annual_start;
		$data['annual_end']=$annual_end;
		$data['teacher_gcat_completed_row'] = $this->report_mne->getallTeacherGcat($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['teacher_best_completed_row'] = $this->report_mne->getallTeacherBest($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['teacher_adept_completed_row'] = $this->report_mne->getallTeacherAdept($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherSmpAnySubject'] = $this->report_mne->getallTeacherSmpAnySubject($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);	
		$data['getallTeacherBpo101'] = $this->report_mne->getallTeacherBpo101($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherBpo102'] = $this->report_mne->getallTeacherBpo102($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherServiceCulture'] = $this->report_mne->getallTeacherServiceCulture($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherBusinessCommunication'] = $this->report_mne->getallTeacherBusinessCommunication($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherSystemsThinking'] = $this->report_mne->getallTeacherSystemsThinking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallTeacherCompleteSmpSubjAndTrainedTeachers'] = $this->report_mne->getallTeacherCompleteSmpSubjAndTrainedTeachers($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);		
		$data['annual_start']=$annual_start;
		$data['annual_end'] = $annual_end;
		$data['gcat_completed_row'] = $this->report_mne->getallStudentsGcatCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['best_completed_row'] = $this->report_mne->getallStudentsBestCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['adept_completed_row'] = $this->report_mne->getallStudentsAdeptCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);

		$data['smp_currently_taking_row'] = $this->report_mne->getallStudentsSmpCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['bpo101_currently_taking_row'] = $this->report_mne->getallStudentsBpo101CurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['bpo102_currently_taking_row'] = $this->report_mne-> getallStudentsBpo102CurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['systh101_currently_taking_row'] = $this->report_mne-> getallStudentsSystemsThinkingCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['bizcom_currently_taking_row'] = $this->report_mne->getallStudentsBusinessCommunicationCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['sc101_currently_taking_row'] = $this->report_mne->getallStudentsServiceCultureCurrentlyTaking($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);

		$data['getallStudentsSmpCompleted'] = $this->report_mne-> getallStudentsSmpCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsBpo101Completed'] = $this->report_mne-> getallStudentsBpo101Completed($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsBpo102Completed'] = $this->report_mne-> getallStudentsBpo102Completed($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsServiceCultureCompleted'] = $this->report_mne-> getallStudentsServiceCultureCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsBusinessCommunicationCompleted'] = $this->report_mne-> getallStudentsBusinessCommunicationCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsSystemsThinkingCompleted'] = $this->report_mne-> getallStudentsSystemsThinkingCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);
		$data['getallStudentsInternshipCompleted'] = $this->report_mne-> getallStudentsInternshipCompleted($qtr1_start, $qtr1_end, $qtr2_start, $qtr2_end, $qtr3_start, $qtr3_end, $qtr4_start, $qtr4_end, $annual_start, $annual_end);


		/*$this->load->model('target_monthly_model');*/
		$data['lfa_targets'] = $this->users_targets->getLFATargets($this->input->post('mande_quarter_year'));

		/*foreach ($monthly_target as $target) :
			$number = $target->LFA; 
		endforeach;		
		$data['number'] = $number;*/
		
		$this->load->view('header-print');
		$this->load->view('reports/mne_report_quarterly', $data);
		$this->load->view('footer-print');
	}
	function mneMonthlyReport()
	{

		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$jan_start=$this->input->post('mande_month_year') . "-01-01";
		$jan_end= $this->input->post('mande_month_year') . "-01-31 23:59:59";
		$feb_start=$this->input->post('mande_month_year') . "-02-01";
		$feb_end= $this->input->post('mande_month_year') . "-02-29 23:59:59"; 
		$mar_start=$this->input->post('mande_month_year') . "-03-01";
		$mar_end= $this->input->post('mande_month_year') . "-03-31 23:59:59";
		$apr_start=$this->input->post('mande_month_year') . "-04-01";
		$apr_end= $this->input->post('mande_month_year') . "-04-30 23:59:59"; 
		$may_start=$this->input->post('mande_month_year') . "-05-01"; 
		$may_end= $this->input->post('mande_month_year') . "-05-31 23:59:59";
		$jun_start=$this->input->post('mande_month_year') . "-06-01"; 
		$jun_end= $this->input->post('mande_month_year') . "-06-30 23:59:59"; 
		$jul_start=$this->input->post('mande_month_year') . "-07-01"; 
		$jul_end= $this->input->post('mande_month_year') . "-07-31 23:59:59"; 
		$aug_start=$this->input->post('mande_month_year') . "-08-01"; 
		$aug_end= $this->input->post('mande_month_year') . "-08-31 23:59:59"; 
		$sep_start=$this->input->post('mande_month_year') . "-09-01"; 
		$sep_end= $this->input->post('mande_month_year') . "-09-30 23:59:59"; 
		$oct_start=$this->input->post('mande_month_year') . "-10-01"; 
		$oct_end= $this->input->post('mande_month_year') . "-10-31 23:59:59";
		$nov_start=$this->input->post('mande_month_year') . "-11-01"; 
		$nov_end= $this->input->post('mande_month_year') . "-11-30 23:59:59"; 
		$dec_start=$this->input->post('mande_month_year') . "-12-01"; 
		$dec_end= $this->input->post('mande_month_year') . "-12-31 23:59:59"; 
		$annual_start=$this->input->post('mande_month_year') . "-01-01"; 
		$annual_end= $this->input->post('mande_month_year') . "-12-31 23:59:59";

		/*$jan_start="1990-01-01"; $jan_end= "2020-01-01"; $feb_start="1990-01-01"; $feb_end= "2020-01-01"; $mar_start="1990-01-01"; $mar_end= "2020-01-01"; $apr_start="1990-01-01"; $apr_end= "2020-01-01"; $may_start="1990-01-01"; $may_end= "2020-01-01"; $jun_start="1990-01-01"; $jun_end= "2020-01-01"; $jul_start="1990-01-01"; $jul_end= "2020-01-01"; $aug_start="1990-01-01"; $aug_end= "2020-01-01"; $sep_start="1990-01-01"; $sep_end= "2020-01-01"; $oct_start="1990-01-01"; $oct_end= "2020-01-01"; $nov_start="1990-01-01"; $nov_end= "2020-01-01"; $dec_start="1990-01-01"; $dec_end= "2020-01-01"; $annual_start="1990-01-01"; $annual_end= "2020-01-01";*/


		$data['getMonthlyTeachersCompletedGcat'] = $this->report_mne->getallTeacherGcatMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInBest'] = $this->report_mne->getallTeacherBestMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInAdept'] = $this->report_mne->getallTeacherAdeptMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInAnySmp'] = $this->report_mne->getallTeacherSmpAnySubjectMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);	
		$data['getMonthlyTeachersTrainedInBpo101'] = $this->report_mne->getallTeacherBpo101Monthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInBpo102'] = $this->report_mne->getallTeacherBpo102Monthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInServiceCulture'] = $this->report_mne->getallTeacherServiceCultureMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInBusinessCommunication'] = $this->report_mne->getallTeacherBusinessCommunicationMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyTeachersTrainedInSystemsThinking'] = $this->report_mne->getallTeacherSystemsThinkingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlySucsCompleteSmpSubjectsAndTrainedTeachers'] = $this->report_mne->getallTeacherCompleteSmpSubjAndTrainedTeachersMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);		
		$data['getMonthlyStudentsAdministeredGcat'] = $this->report_mne->getallStudentsGcatCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsCompletedBest'] = $this->report_mne->getallStudentsBestCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsCompletedAdept'] = $this->report_mne->getallStudentsAdeptCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInAnySmpSubject'] = $this->report_mne->getallStudentsSmpCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInBpo101'] = $this->report_mne->getallStudentsBpo101CurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInBpo102'] = $this->report_mne-> getallStudentsBpo102CurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInServiceCulture'] = $this->report_mne-> getallStudentsSystemsThinkingCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInBusinessCommunication'] = $this->report_mne->getallStudentsBusinessCommunicationCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsEnrolledInSystemsThinking'] = $this->report_mne->getallStudentsServiceCultureCurrentlyTakingMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedAnySmpSubject'] = $this->report_mne-> getallStudentsSmpCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedBpo101'] = $this->report_mne-> getallStudentsBpo101CompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedBpo102'] = $this->report_mne-> getallStudentsBpo102CompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedServiceCulture'] = $this->report_mne-> getallStudentsServiceCultureCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedBusinessCommunication'] = $this->report_mne-> getallStudentsBusinessCommunicationCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyCompletedSystemsThinking'] = $this->report_mne-> getallStudentsSystemsThinkingCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);
		$data['getMonthlyStudentsUndergoneInternship'] = $this->report_mne-> getallStudentsInternshipCompletedMonthly($jan_start, $jan_end, $feb_start, $feb_end, $mar_start, $mar_end, $apr_start, $apr_end, $may_start, $may_end, $jun_start, $jun_end, $jul_start, $jul_end, $aug_start, $aug_end, $sep_start, $sep_end, $oct_start, $oct_end, $nov_start, $nov_end, $dec_start, $dec_end, $annual_start, $annual_end);


		$data['lfa_targets'] = $this->users_targets->getLFATargets($this->input->post('mande_monthly_year'));
		$data['annual_start']=$annual_start;
		$data['annual_end'] = $annual_end;
		
		/*$this->load->model('target_monthly_model');*/
		/*$monthly_target = $this->target_monthly_model->getTargetMonthly();
		foreach ($monthly_target as $target) :
			$number = $target->LFA; 
		endforeach;		
		$data['number'] = $number;*/
		
		$this->load->view('header-print');
		$this->load->view('reports/mne_report_monthly', $data);
		$this->load->view('footer-print');	


	}
	
	function reportTargetConfigurationQuarterlyAdd()
	{
		$data['mne_years'] = $this->users_targets->getYears();

		if ($this->input->post())
		{
			$this->form_validation->set_rules('target_year', 'Year', 'trim|xss_clean|required|is_unique[users_targets.Year]|exact_length[4]|is_natural');
			
			$this->form_validation->set_rules('teacher_lfa_gcat', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q1_gcat', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q2_gcat', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q3_gcat', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q4_gcat', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_lfa_best', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q1_best', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q2_best', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q3_best', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q4_best', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_lfa_adept', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q1_adept', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q2_adept', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q3_adept', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q4_adept', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_lfa_smp', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q1_smp', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q2_smp', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q3_smp', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q4_smp', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_lfa_bpo101', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q1_bpo101', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q2_bpo101', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q3_bpo101', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q4_bpo101', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_lfa_bpo102', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q1_bpo102', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q2_bpo102', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q3_bpo102', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q4_bpo102', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_lfa_sc', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q1_sc', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q2_sc', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q3_sc', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q4_sc', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_lfa_bc', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q1_bc', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q2_bc', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q3_bc', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q4_bc', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_lfa_st', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q1_st', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q2_st', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q3_st', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q4_st', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_lfa_suc_smp', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q1_suc_smp', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q2_suc_smp', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q3_suc_smp', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('teacher_q4_suc_smp', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_gcat', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_gcat', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_gcat', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_gcat', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_gcat', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_best', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_best', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_best', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_best', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_best', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_adept', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_adept', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_adept', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_adept', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_adept', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_smp_running', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_smp_running', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_smp_running', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_smp_running', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_smp_running', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_bpo101_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_bpo101_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_bpo101_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_bpo101_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_bpo101_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_bpo102_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_bpo102_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_bpo102_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_bpo102_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_bpo102_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_sc_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_sc_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_sc_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_sc_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_sc_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_bc_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_bc_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_bc_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_bc_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_bc_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_st_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_st_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_st_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_st_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_st_enrolled', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_smp_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_smp_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_smp_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_smp_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_smp_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_bpo101_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_bpo101_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_bpo101_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_bpo101_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_bpo101_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_bpo102_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_bpo102_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_bpo102_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_bpo102_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_bpo102_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_sc_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_sc_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_sc_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_sc_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_sc_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_bc_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_bc_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_bc_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_bc_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_bc_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_st_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_st_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_st_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_st_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_st_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_lfa_internship_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q1_internship_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q2_internship_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q3_internship_completion', 'Target', 'trim|xss_clean|required|is_natural');
			$this->form_validation->set_rules('student_q4_internship_completion', 'Target', 'trim|xss_clean|required|is_natural');

			$this->form_validation->set_message('is_unique', 'Targets for year already exist.');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ($this->input->post('submit'))
			{
				if (!$this->form_validation->run())
				{
					$data['form_error'] = TRUE;

					$this->load->view('header');
					$this->load->view('forms/form-reports-configuration', $data);
					$this->load->view('footer');
				}
				else
				{
					$this->db->trans_begin();

					$teacher_lfa_gcat = array
					(
						'Target_For' => 'teacher_lfa_gcat',
						'LFA' => $this->input->post('teacher_lfa_gcat'),
						'QTR_1' => $this->input->post('teacher_q1_gcat'),
						'QTR_2' => $this->input->post('teacher_q2_gcat'),
						'QTR_3' => $this->input->post('teacher_q3_gcat'),
						'QTR_4' => $this->input->post('teacher_q4_gcat'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($teacher_lfa_gcat);

					$teacher_lfa_best = array
					(
						'Target_For' => 'teacher_lfa_best',
						'LFA' => $this->input->post('teacher_lfa_best'),
						'QTR_1' => $this->input->post('teacher_q1_best'),
						'QTR_2' => $this->input->post('teacher_q2_best'),
						'QTR_3' => $this->input->post('teacher_q3_best'),
						'QTR_4' => $this->input->post('teacher_q4_best'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($teacher_lfa_best);

					$teacher_lfa_adept = array
					(
						'Target_For' => 'teacher_lfa_adept',
						'LFA' => $this->input->post('teacher_lfa_adept'),
						'QTR_1' => $this->input->post('teacher_q1_adept'),
						'QTR_2' => $this->input->post('teacher_q2_adept'),
						'QTR_3' => $this->input->post('teacher_q3_adept'),
						'QTR_4' => $this->input->post('teacher_q4_adept'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($teacher_lfa_adept);

					$teacher_lfa_smp = array
					(
						'Target_For' => 'teacher_lfa_smp',
						'LFA' => $this->input->post('teacher_lfa_smp'),
						'QTR_1' => $this->input->post('teacher_q1_smp'),
						'QTR_2' => $this->input->post('teacher_q2_smp'),
						'QTR_3' => $this->input->post('teacher_q3_smp'),
						'QTR_4' => $this->input->post('teacher_q4_smp'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($teacher_lfa_smp);

					$teacher_lfa_bpo101 = array
					(
						'Target_For' => 'teacher_lfa_bpo101',
						'LFA' => $this->input->post('teacher_lfa_bpo101'),
						'QTR_1' => $this->input->post('teacher_q1_bpo101'),
						'QTR_2' => $this->input->post('teacher_q2_bpo101'),
						'QTR_3' => $this->input->post('teacher_q3_bpo101'),
						'QTR_4' => $this->input->post('teacher_q4_bpo101'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($teacher_lfa_bpo101);

					$teacher_lfa_bpo102 = array
					(
						'Target_For' => 'teacher_lfa_bpo102',
						'LFA' => $this->input->post('teacher_lfa_bpo102'),
						'QTR_1' => $this->input->post('teacher_q1_bpo102'),
						'QTR_2' => $this->input->post('teacher_q2_bpo102'),
						'QTR_3' => $this->input->post('teacher_q3_bpo102'),
						'QTR_4' => $this->input->post('teacher_q4_bpo102'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($teacher_lfa_bpo102);

					$teacher_lfa_sc = array
					(
						'Target_For' => 'teacher_lfa_sc',
						'LFA' => $this->input->post('teacher_lfa_sc'),
						'QTR_1' => $this->input->post('teacher_q1_sc'),
						'QTR_2' => $this->input->post('teacher_q2_sc'),
						'QTR_3' => $this->input->post('teacher_q3_sc'),
						'QTR_4' => $this->input->post('teacher_q4_sc'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($teacher_lfa_sc);

					$teacher_lfa_bc = array
					(
						'Target_For' => 'teacher_lfa_bc',
						'LFA' => $this->input->post('teacher_lfa_bc'),
						'QTR_1' => $this->input->post('teacher_q1_bc'),
						'QTR_2' => $this->input->post('teacher_q2_bc'),
						'QTR_3' => $this->input->post('teacher_q3_bc'),
						'QTR_4' => $this->input->post('teacher_q4_bc'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($teacher_lfa_bc);

					$teacher_lfa_st = array
					(
						'Target_For' => 'teacher_lfa_st',
						'LFA' => $this->input->post('teacher_lfa_st'),
						'QTR_1' => $this->input->post('teacher_q1_st'),
						'QTR_2' => $this->input->post('teacher_q2_st'),
						'QTR_3' => $this->input->post('teacher_q3_st'),
						'QTR_4' => $this->input->post('teacher_q4_st'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($teacher_lfa_st);

					$teacher_lfa_suc_smp = array
					(
						'Target_For' => 'teacher_lfa_suc_smp',
						'LFA' => $this->input->post('teacher_lfa_suc_smp'),
						'QTR_1' => $this->input->post('teacher_q1_suc_smp'),
						'QTR_2' => $this->input->post('teacher_q2_suc_smp'),
						'QTR_3' => $this->input->post('teacher_q3_suc_smp'),
						'QTR_4' => $this->input->post('teacher_q4_suc_smp'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($teacher_lfa_suc_smp);

					$student_lfa_gcat = array
					(
						'Target_For' => 'student_lfa_gcat',
						'LFA' => $this->input->post('student_lfa_gcat'),
						'QTR_1' => $this->input->post('student_q1_gcat'),
						'QTR_2' => $this->input->post('student_q2_gcat'),
						'QTR_3' => $this->input->post('student_q3_gcat'),
						'QTR_4' => $this->input->post('student_q4_gcat'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_gcat);

					$student_lfa_best = array
					(
						'Target_For' => 'student_lfa_best',
						'LFA' => $this->input->post('student_lfa_best'),
						'QTR_1' => $this->input->post('student_q1_best'),
						'QTR_2' => $this->input->post('student_q2_best'),
						'QTR_3' => $this->input->post('student_q3_best'),
						'QTR_4' => $this->input->post('student_q4_best'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_best);

					$student_lfa_adept = array
					(
						'Target_For' => 'student_lfa_adept',
						'LFA' => $this->input->post('student_lfa_adept'),
						'QTR_1' => $this->input->post('student_q1_adept'),
						'QTR_2' => $this->input->post('student_q2_adept'),
						'QTR_3' => $this->input->post('student_q3_adept'),
						'QTR_4' => $this->input->post('student_q4_adept'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_adept);

					$student_lfa_smp_running = array
					(
						'Target_For' => 'student_lfa_smp_running',
						'LFA' => $this->input->post('student_lfa_smp_running'),
						'QTR_1' => $this->input->post('student_q1_smp_running'),
						'QTR_2' => $this->input->post('student_q2_smp_running'),
						'QTR_3' => $this->input->post('student_q3_smp_running'),
						'QTR_4' => $this->input->post('student_q4_smp_running'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_smp_running);

					$student_lfa_bpo101_enrolled = array
					(
						'Target_For' => 'student_lfa_bpo101_enrolled',
						'LFA' => $this->input->post('student_lfa_bpo101_enrolled'),
						'QTR_1' => $this->input->post('student_q1_bpo101_enrolled'),
						'QTR_2' => $this->input->post('student_q2_bpo101_enrolled'),
						'QTR_3' => $this->input->post('student_q3_bpo101_enrolled'),
						'QTR_4' => $this->input->post('student_q4_bpo101_enrolled'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_bpo101_enrolled);

					$student_lfa_bpo102_enrolled = array
					(
						'Target_For' => 'student_lfa_bpo102_enrolled',
						'LFA' => $this->input->post('student_lfa_bpo102_enrolled'),
						'QTR_1' => $this->input->post('student_q1_bpo102_enrolled'),
						'QTR_2' => $this->input->post('student_q2_bpo102_enrolled'),
						'QTR_3' => $this->input->post('student_q3_bpo102_enrolled'),
						'QTR_4' => $this->input->post('student_q4_bpo102_enrolled'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_bpo102_enrolled);

					$student_lfa_sc_enrolled = array
					(
						'Target_For' => 'student_lfa_sc_enrolled',
						'LFA' => $this->input->post('student_lfa_sc_enrolled'),
						'QTR_1' => $this->input->post('student_q1_sc_enrolled'),
						'QTR_2' => $this->input->post('student_q2_sc_enrolled'),
						'QTR_3' => $this->input->post('student_q3_sc_enrolled'),
						'QTR_4' => $this->input->post('student_q4_sc_enrolled'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_sc_enrolled);

					$student_lfa_bc_enrolled = array
					(
						'Target_For' => 'student_lfa_bc_enrolled',
						'LFA' => $this->input->post('student_lfa_bc_enrolled'),
						'QTR_1' => $this->input->post('student_q1_bc_enrolled'),
						'QTR_2' => $this->input->post('student_q2_bc_enrolled'),
						'QTR_3' => $this->input->post('student_q3_bc_enrolled'),
						'QTR_4' => $this->input->post('student_q4_bc_enrolled'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_bc_enrolled);

					$student_lfa_st_enrolled = array
					(
						'Target_For' => 'student_lfa_st_enrolled',
						'LFA' => $this->input->post('student_lfa_st_enrolled'),
						'QTR_1' => $this->input->post('student_q1_st_enrolled'),
						'QTR_2' => $this->input->post('student_q2_st_enrolled'),
						'QTR_3' => $this->input->post('student_q3_st_enrolled'),
						'QTR_4' => $this->input->post('student_q4_st_enrolled'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_st_enrolled);

					$student_lfa_smp_completion = array
					(
						'Target_For' => 'student_lfa_smp_completion',
						'LFA' => $this->input->post('student_lfa_smp_completion'),
						'QTR_1' => $this->input->post('student_q1_smp_completion'),
						'QTR_2' => $this->input->post('student_q2_smp_completion'),
						'QTR_3' => $this->input->post('student_q3_smp_completion'),
						'QTR_4' => $this->input->post('student_q4_smp_completion'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_smp_completion);

					$student_lfa_bpo101_completion = array
					(
						'Target_For' => 'student_lfa_bpo101_completion',
						'LFA' => $this->input->post('student_lfa_bpo101_completion'),
						'QTR_1' => $this->input->post('student_q1_bpo101_completion'),
						'QTR_2' => $this->input->post('student_q2_bpo101_completion'),
						'QTR_3' => $this->input->post('student_q3_bpo101_completion'),
						'QTR_4' => $this->input->post('student_q4_bpo101_completion'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_bpo101_completion);

					$student_lfa_bpo102_completion = array
					(
						'Target_For' => 'student_lfa_bpo102_completion',
						'LFA' => $this->input->post('student_lfa_bpo102_completion'),
						'QTR_1' => $this->input->post('student_q1_bpo102_completion'),
						'QTR_2' => $this->input->post('student_q2_bpo102_completion'),
						'QTR_3' => $this->input->post('student_q3_bpo102_completion'),
						'QTR_4' => $this->input->post('student_q4_bpo102_completion'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_bpo102_completion);

					$student_lfa_sc_completion = array
					(
						'Target_For' => 'student_lfa_sc_completion',
						'LFA' => $this->input->post('student_lfa_sc_completion'),
						'QTR_1' => $this->input->post('student_q1_sc_completion'),
						'QTR_2' => $this->input->post('student_q2_sc_completion'),
						'QTR_3' => $this->input->post('student_q3_sc_completion'),
						'QTR_4' => $this->input->post('student_q4_sc_completion'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_sc_completion);

					$student_lfa_bc_completion = array
					(
						'Target_For' => 'student_lfa_bc_completion',
						'LFA' => $this->input->post('student_lfa_bc_completion'),
						'QTR_1' => $this->input->post('student_q1_bc_completion'),
						'QTR_2' => $this->input->post('student_q2_bc_completion'),
						'QTR_3' => $this->input->post('student_q3_bc_completion'),
						'QTR_4' => $this->input->post('student_q4_bc_completion'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_bc_completion);

					$student_lfa_st_completion = array
					(
						'Target_For' => 'student_lfa_st_completion',
						'LFA' => $this->input->post('student_lfa_st_completion'),
						'QTR_1' => $this->input->post('student_q1_st_completion'),
						'QTR_2' => $this->input->post('student_q2_st_completion'),
						'QTR_3' => $this->input->post('student_q3_st_completion'),
						'QTR_4' => $this->input->post('student_q4_st_completion'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_st_completion);

					$student_lfa_internship_completion = array
					(
						'Target_For' => 'student_lfa_internship_completion',
						'LFA' => $this->input->post('student_lfa_internship_completion'),
						'QTR_1' => $this->input->post('student_q1_internship_completion'),
						'QTR_2' => $this->input->post('student_q2_internship_completion'),
						'QTR_3' => $this->input->post('student_q3_internship_completion'),
						'QTR_4' => $this->input->post('student_q4_internship_completion'),
						'Year' => $this->input->post('target_year')
					);
					$this->users_targets->addTarget($student_lfa_internship_completion);

					$this->db->trans_commit();

					if ($this->db->_error_message())
					{
						$this->db->trans_rollback();
						$data['form_error'] = TRUE;

						$this->load->view('header');
						$this->load->view('forms/form-reports-configuration', $data);
						$this->load->view('footer');
					}
					else
					{
						$this->db->trans_commit();
						$data['form_success'] = TRUE;
						$this->log->addLog('Added Target');

						$this->load->view('header');
						$this->load->view('forms/form-reports-configuration', $data);
						$this->load->view('footer');
					}
				}
			}
			elseif ($this->input->post('save_draft'))
			{
				$this->form_validation->run();

				$data['draft_saved'] = TRUE;

				$this->load->view('header');
				$this->load->view('forms/form-reports-configuration', $data);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('forms/form-reports-configuration', $data);
			$this->load->view('footer');
		}
	}
}
?>
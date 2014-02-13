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
	
		$data['schools'] = $this->school->getAllSchools();
		$data['subjects'] = $this->subject->getAllSubjects();
		$data['teachers'] = $this->teacher->getAllTeachersFormatted();
		$data['proctors'] = $this->proctor->getAllProctorsFormatted();
		$data['best_classes'] = $this->classes->getAllBestClasses();
		$data['adept_classes'] = $this->classes->getAllAdeptClasses();
		$data['gcat_classes'] = $this->classes->getAllGCATClasses();
		$data['smp_subjects'] = $this->subject->getSMPSubjects();
		$data['smp_classes'] = $this->classes->getAllSMPClasses();
	
		$this->load->view('header');
		$this->load->view('report', $data);
		$this->load->view('footer');
	}

	function report_ni_phil()
	{
	
		//$startDate = $this->input->post('myBirthday');
		//$data['data'] = $this->name->get($startDate, $endDate);
		
		$data['student_list'] = $this->report_suc->getAllStudentNamesAndSchools();
		$this->load->view('reports/report_ni_phil', $data);
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


	//SUC Controller
	function smpClassesSUCReport()
	{
		
		/*$teacher_code="CODE432";
		$subject_code="SC101";
		$semester="4";
		$school_code="BatStateU-Lipa";*/
		
		
		
		if (!$this->input->post())
		{
			redirect(base_url('reports'));
		}

		$teacher_code = $this->input->post('suc_teacher_class');
		$subject_code = $this->input->post('suc_subject_class');
		$semester = $this->input->post('suc_semester_class');
		$school_code = $this->input->post('suc_school_class');
		
		

		$data['class_list'] = $this->report_suc->getStudentClass($subject_code,$school_code,$semester,$teacher_code);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['subject'] = $this->subject->getSubjectByCode($subject_code);
		$data['semester'] = $semester;
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

		/*$school_code="BatStateU-Malvar";
		$semester=3;
		$teacher_code="CODE123";*/

		
		$data['best_class_list'] = $this->report_suc->getBestStudentClasses ($school_code,$semester, $teacher_code);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['semester'] = $semester;
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
		/*$school_code="BatStateU-Malvar";
		$semester=3;
		$teacher_code="CODE123";*/

		$data['adept_class_list'] = $this->report_suc->getAdeptStudentClasses ($school_code,$semester, $teacher_code);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['semester'] = $semester;
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

	/*	$school_code="BatStateU-Lipa";
		$semester=1;
		$proctor_id=1;
*/
		$data['gcat_class_list'] = $this->report_suc->getGCATStudentClasses($school_code, $semester, $proctor_id);
		$data['proctor'] = $this->proctor->getProctorById($proctor_id);
		$data['semester'] = $semester;
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

		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['semester'] = $semester;
		$data['school'] = $this->school->getSchoolByCode($school_code);
		$data['class']=$class_name;
		
		
		

/*
		$teacher_code="CODE432";
		$school_code="BatStateU-Lipa";
		$class_name="BPO101-D";
		$semester=4;*/
		

		$data['best_student_list'] = $this->report_suc->getBestStudents($school_code,$semester,$teacher_code,$class_name);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['semester'] = $semester;
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

		/*$class_name="BPO101-D";
		$school_code="BatStateU-Lipa";
		$semester=4;
		$teacher_code="CODE432";*/

		$data['adept_student_list'] = $this->report_suc->getAdeptStudents($school_code,$semester,$teacher_code,$class_name);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['semester'] = $semester;
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
		
		/*$proctor_id=1;
		$school_code="BatStateU-Lipa";
		$semester=1;
		$class_name="GCAT";*/

		$data['gcat_student_list'] = $this->report_suc->getGCATStudent($school_code,$semester, $proctor_id ,$class_name);
		$data['proctor'] = $this->proctor->getProctorById($proctor_id);		
		$data['semester'] = $semester;
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

		/*$teacher_code="CODE432";
		$semester=4;
		$school_code="BatStateU-Lipa";
		$subject_id=1;
		$class_name="BPO101-C";*/

		$data['smp_student_list'] = $this->report_suc->getallSMPStudent($subject_id,$school_code,$semester,$teacher_code,$class_name);
		$data['teacher'] = $this->teacher->getTeacherByCode($teacher_code);
		$data['subject'] = $this->subject->getSubjectByID($subject_id);
		$data['semester'] = $semester;
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

		/*$school_code="BatStateU-Malvar";
		$semester=3;
		$subject = 1;*/

		$data['smp_total_list'] = $this->report_suc->getSMPTotal($school_code,$subject_id,$semester);
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
		$qtr1_end = $this->input->post('mande_quarter_year') . "-03-31";
		$qtr2_start=$this->input->post('mande_quarter_year') .  "-04-01";
		$qtr2_end = $this->input->post('mande_quarter_year') . "-06-30";
		$qtr3_start=$this->input->post('mande_quarter_year') . "-07-01";
		$qtr3_end = $this->input->post('mande_quarter_year') . "-09-30";
		$qtr4_start= $this->input->post('mande_quarter_year') . "-10-01";
		$qtr4_end = $this->input->post('mande_quarter_year') . "-12-31";
		$annual_start= $this->input->post('mande_quarter_year') . "-01-01";
		$annual_end= $this->input->post('mande_quarter_year') . "-12-31";

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
		$jan_end= $this->input->post('mande_month_year') . "-01-31";
		$feb_start=$this->input->post('mande_month_year') . "-02-01";
		$feb_end= $this->input->post('mande_month_year') . "-02-01"; 
		$mar_start=$this->input->post('mande_month_year') . "-03-01";
		$mar_end= $this->input->post('mande_month_year') . "-03-31";
		$apr_start=$this->input->post('mande_month_year') . "-04-01";
		$apr_end= $this->input->post('mande_month_year') . "-04-30"; 
		$may_start=$this->input->post('mande_month_year') . "-05-01"; 
		$may_end= $this->input->post('mande_month_year') . "-05-31";
		$jun_start=$this->input->post('mande_month_year') . "-06-01"; 
		$jun_end= $this->input->post('mande_month_year') . "-06-30"; 
		$jul_start=$this->input->post('mande_month_year') . "-07-01"; 
		$jul_end= $this->input->post('mande_month_year') . "-07-31"; 
		$aug_start=$this->input->post('mande_month_year') . "-08-01"; 
		$aug_end= $this->input->post('mande_month_year') . "-08-31"; 
		$sep_start=$this->input->post('mande_month_year') . "-09-01"; 
		$sep_end= $this->input->post('mande_month_year') . "-09-30"; 
		$oct_start=$this->input->post('mande_month_year') . "-10-01"; 
		$oct_end= $this->input->post('mande_month_year') . "-10-31";
		$nov_start=$this->input->post('mande_month_year') . "-11-01"; 
		$nov_end= $this->input->post('mande_month_year') . "-11-30"; 
		$dec_start=$this->input->post('mande_month_year') . "-12-01"; 
		$dec_end= $this->input->post('mande_month_year') . "-12-31"; 
		$annual_start=$this->input->post('mande_month_year') . "-01-01"; 
		$annual_end= $this->input->post('mande_month_year') . "-12-31";

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

		$data['annual_start']=$annual_start;
		$data['annual_end'] = $annual_end;
		$this->load->view('header-print');
		$this->load->view('reports/mne_report_monthly', $data);
		$this->load->view('footer-print');	
	}
	
	}

?>
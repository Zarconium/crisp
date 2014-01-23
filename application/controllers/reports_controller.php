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
		$this->load->view('header');
		$this->load->view('report');
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
	
		$start_date = $this->input->post('program_student_adept_start_date');
		$end_date = $this->input->post('program_student_adept_end_date');
		
		$data['pin_count_list'] = $this->report_program->getStudentAdeptProgramReportPins($start_date, $end_date);
		$data['pin_total'] = $this->report_program->getStudentAdeptProgramReportPinsTotal($start_date, $end_date);
		$data['current_takers_count_list'] = $this->report_program->getStudentAdeptProgramReportCurrentTakers($start_date, $end_date);
		$data['current_takers_total'] = $this->report_program->getStudentAdeptProgramReportCurrentTakersTotal($start_date, $end_date);
		$data['completed_count_list'] = $this->report_program->getStudentAdeptProgramReportCompleted($start_date, $end_date);
		$data['completed_total'] = $this->report_program->getStudentAdeptProgramReportCompletedTotal($start_date, $end_date);
		$this->load->view('header-print');
		$this->load->view('reports/student_adept_program_report', $data);
		$this->load->view('footer-print');
	}

	function studentBestProgramReport()
	{
	
		$start_date = $this->input->post('program_student_best_start_date');
		$end_date = $this->input->post('program_student_best_end_date');

		$data['pin_count_list'] = $this->report_program->getStudentBestProgramReportPins($start_date, $end_date);
		$data['pin_total'] = $this->report_program->getStudentBestProgramReportPinsTotal($start_date, $end_date);
		$data['current_takers_count_list'] = $this->report_program->getStudentBestProgramReportCurrentTakers($start_date, $end_date);
		$data['current_takers_total'] = $this->report_program->getStudentBestProgramReportCurrentTakersTotal($start_date, $end_date);
		$data['completed_count_list'] = $this->report_program->getStudentBestProgramReportCompleted($start_date, $end_date);
		$data['completed_total'] = $this->report_program->getStudentBestProgramReportCompletedTotal($start_date, $end_date);
		$this->load->view('header-print');
		$this->load->view('reports/student_best_program_report', $data);
		$this->load->view('footer-print');

	}

	function studentProgramReportGCAT()
	{
		$start_date = $this->input->post('program_student_gcat_start_date');
		$end_date = $this->input->post('program_student_gcat_end_date');

		$data['count_list'] = $this->report_program->getStudentProgramReportGCAT($start_date, $end_date);
		$data['total'] = $this->report_program->getStudentProgramReportGCATTotal($start_date, $end_date);
		$this->load->view('header-print');
		$this->load->view('reports/student_program_report_gcat', $data);
		$this->load->view('footer-print');



	}

	function studentProgramReportPerSub()
	{
	
		$start_date = $this->input->post('program_student_subject_start_date');
		$end_date = $this->input->post('program_student_subject_end_date');
		$subject_code = $this->input->post('program_student_subject_subject');
		
		$data['pin_count_list'] = $this->report_program->getStudentAdeptProgramReportPins($start_date, $end_date);
		$data['pin_total'] = $this->report_program->getStudentAdeptProgramReportPinsTotal($start_date, $end_date);
		$data['current_takers_count_list'] = $this->report_program->getStudentAdeptProgramReportCurrentTakers($start_date, $end_date);
		$data['current_takers_total'] = $this->report_program->getStudentAdeptProgramReportCurrentTakersTotal($start_date, $end_date);
		$data['completed_count_list'] = $this->report_program->getStudentAdeptProgramReportCompleted($start_date, $end_date);
		$data['completed_total'] = $this->report_program->getStudentAdeptProgramReportCompletedTotal($start_date, $end_date);
		
		$this->load->view('header-print', $data);
		$this->load->view('reports/student_adept_program_report', $data);
		$this->load->view('footer-print', $data);
		
		
		$data['currently_taking_list'] = $this->report_program->getStudentProgramReportPerSubCurrentTakers($start_date, $end_date, $subject_code);
		$data['total_ct'] = $this->report_program->getStudentProgramReportPerSubCurrentTakersTotal($start_date, $end_date, $subject_code);
		$data['finished_list'] = $this->report_program->getStudentProgramReportPerSubFinished($start_date, $end_date, $subject_code);
		$data['total_ft'] = $this->report_program->getStudentProgramReportPerSubFinishedTotal($start_date, $end_date, $subject_code);

		$this->load->view('header-print');
		$this->load->view('reports/student_program_report_per_sub', $data);
		$this->load->view('footer-print');

	}

	//what is this
	function t3ProgramReportGCAT()
	{
		$start_date = $this->input->post('');
		$end_date = $this->input->post('');

		$data['t3_count_list'] = $this->report_program->gett3ProgramReportGCAT($start_date, $end_date);
		$data['t3_total'] = $this->report_program->getT3ProgramReportGCATTotal($start_date, $end_date);
		
		$this->load->view('header-print');
		$this->load->view('reports/t3_program_report_gcat', $data);
		$this->load->view('footer-print');


	}
	
	function getAllStudentsByPogram()
	{
		$subject = $this->input->post('suc_student_subject');
		$school_code = $this->input->post('suc_student_school');
		$semester = $this->input->post('suc_student_semester');
		$teacher_code = $this->input->post('suc_student_teacher');
		
		$data['student_class_list'] = $this->report_suc->getStudentClass($subject,$school_code,$semester,$teacher_code);
	
		$this->load->view('reports/smp_student_class_suc_report', $data);
	}

	function getAllSMPStudentSUCReport()
	{
	
		$subject = $this->input->post('suc_smp_class_list_subject');
		$school_code = $this->input->post('suc_smp_class_list_school');
		$semester = $this->input->post('suc_smp_class_list_semester');
		$teacher_code = $this->input->post('suc_smp_class_list_teacher');

		
		$data['smp_student_list'] = $this->report_suc->getSMPStudent($subject,$school_code,$semester,$teacher_code,$class_name);
		$this->load->view('header-print', $data);
		$this->load->view('reports/smp_student_suc_report', $data);
		$this->load->view('footer-print', $data);
	}

	function getAllGCATStudentSUCReport()
	{
		$subject = $this->input->post('suc_gcat_student_list_subject');
		$school_code = $this->input->post('suc_gcat_student_list_school');
		$semester = $this->input->post('suc_gcat_student_list_semester');
		$teacher_code = $this->input->post('suc_gcat_student_list_teacher');
		
		$data['gcat_student_list'] = $this->report_suc->getGCATStudent($subject,$school_code,$semester,$teacher_code,$class_name);
	
		$this->load->view('header-print', $data);
		$this->load->view('reports/suc_report_gcat_students', $data);
		$this->load->view('footer-print', $data);
	}

	function getAllBestStudentSUCReport()
	{
	
		$school_code = $this->input->post('suc_best_student_list_school');
		$date_start = $this->input->post('suc_best_student_list_date_start');
		$date_end = $this->input->post('suc_best_student_list_date_end');
		
		$data['best_student_list'] = $this->report_suc->getBestStudent($school_code,$date_start,$date_end);
		$this->load->view('header-print', $data);
		$this->load->view('reports/suc_report_best_students', $data);
		$this->load->view('footer-print', $data);
	}

	function getAllAdeptStudentSUCReport()
	{
		$school_code = $this->input->post('suc_adept_student_list_school');
		$date_start = $this->input->post('suc_adept_student_list_date_start');
		$date_end = $this->input->post('suc_adept_student_list_date_end');
		
		$data['adept_student_list'] = $this->report_suc->getAdeptStudent($school_code,$date_start,$date_end);
		
		$this->load->view('header-print', $data);
		$this->load->view('reports/suc_report_adept_students', $data);
		$this->load->view('footer-print', $data);
	}

	function getAllT3BestSUCReport()
	{	
		$school_code = $this->input->post('suc_t3_best_class_list_school');
		$date_start = $this->input->post('suc_t3_best_class_list_date_start');
		$date_end = $this->input->post('suc_t3_best_class_list_date_end');
		
		$data['T3_best_list'] = $this->report_suc->getT3Best($school_code,$date_start,$date_end);
	
		$this->load->view('header-print', $data);
		$this->load->view('reports/suc_report_T3_Best', $data);
		$this->load->view('footer-print', $data);
	}

	function getAllT3AdeptSUCReport()
	{
		$school_code = $this->input->post('suc_t3_adept_class_list_school');
		$date_start = $this->input->post('suc_t3_adept_class_list_date_start');
		$date_end = $this->input->post('suc_t3_adept_class_list_date_end');
		
		$data['T3_adept_list'] = $this->report_suc->getT3Adept ($school_code,$date_start,$date_end);
	
		$this->load->view('header-print', $data);
		$this->load->view('reports/suc_report_T3_Adept', $data);
		$this->load->view('footer-print', $data);
	}

	function getAllT3GCATSUCReport()
	{
		$school_code = $this->input->post('suc_t3_gcat_class_list_school');
		$date_start = $this->input->post('suc_t3_gcat_class_list_date_start');
		$date_end = $this->input->post('suc_t3_gcat_class_list_date_end');
		
		$data['T3_GCAT_list'] = $this->report_suc->getT3Gcat($school_code,$date_start,$date_end);
	
		$this->load->view('header-print', $data);
		$this->load->view('reports/suc_report_T3_GCAT', $data);
		$this->load->view('footer-print', $data);
	}

	function getAllT3SMPSUCReport()
	{
		$school_code = $this->input->post('suc_smp_school');
		$subject = $this->input->post('suc_smp_subject');
		$semester = $this->input->post('suc_smp_semester');
		
		$data['SMP_total_list'] = $this->report_suc->getSMPTotal($school_code,$subject,$semester);
	
		$this->load->view('header-print', $data);
		$this->load->view('reports/suc_report_smp_total', $data);
		$this->load->view('footer-print', $data);
	}


}
?>
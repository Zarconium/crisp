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

	function studentProgramReportGCAT()
	{
		$data['count_list'] = $this->report_program->getStudentProgramReportGCAT();

		$this->load->view('reports/student_program_report_gcat', $data);
	}

	function studentAdeptProgramReport()
	{
		$data['pin_count_list'] = $this->report_program->getStudentAdeptProgramReportPins();
		$data['pin_total'] = $this->report_program->getStudentAdeptProgramReportPinsTotal();
		$data['current_takers_count_list'] = $this->report_program->getStudentAdeptProgramReportCurrentTakers();
		$data['current_takers_total'] = $this->report_program->getStudentAdeptProgramReportCurrentTakersTotal();
		$data['completed_count_list'] = $this->report_program->getStudentAdeptProgramReportCompleted();
		$data['completed_total'] = $this->report_program->getStudentAdeptProgramReportCompletedTotal();
		$this->load->view('header-print', $data);
		$this->load->view('reports/student_adept_program_report', $data);
		$this->load->view('footer-print', $data);
	}

	function studentBestProgramReport()
	{
		$data['pin_count_list'] = $this->report_program->getStudentBestProgramReportPins();
		$data['pin_total'] = $this->report_program->getStudentBestProgramReportPinsTotal();
		$data['current_takers_count_list'] = $this->report_program->getStudentBestProgramReportCurrentTakers();
		$data['current_takers_total'] = $this->report_program->getStudentBestProgramReportCurrentTakersTotal();
		$data['completed_count_list'] = $this->report_program->getStudentBestProgramReportCompleted();
		$data['completed_total'] = $this->report_program->getStudentBestProgramReportCompletedTotal();
		$this->load->view('header-print', $data);
		$this->load->view('reports/student_best_program_report', $data);
		$this->load->view('footer-print', $data);

	}
	
	//still being fixed 
	function getAllStudentClassSUCReport()
	{
		$data['student_class_list'] = $this->report_suc->getStudentClass($subject,$school_code,$semester,$teacher_code);
	
		$this->load->view('reports/smp_student_class_suc_report', $data);
	}

	function getAllSMPStudentSUCReport()
	{
	
		//$startDate = $this->input->post('myBirthday');
		//$data['data'] = $this->name->get($startDate, $endDate);
		$subject = $this->input->post('suc_student_subject');
		$school_code = $this->input->post('suc_student_subject');
		$semester = $this->input->post('suc_student_subject');
		$teacher_code = $this->input->post('suc_student_subject');
		$class_name = $this->input->post('suc_student_subject');
		
		$data['smp_student_list'] = $this->report_suc->getSMPStudent($subject,$school_code,$semester,$teacher_code,$class_name);
		$this->load->view('header-print', $data);
		$this->load->view('reports/smp_student_suc_report', $data);
		$this->load->view('footer-print', $data);
	}

	function getAllGCATStudentSUCReport()
	{
		$data['gcat_student_list'] = $this->report_suc->getGCATStudent($subject,$school_code,$semester,$teacher_code,$class_name);
	
		$this->load->view('reports/suc_report_gcat_students', $data);
	}

	function getAllBestStudentSUCReport()
	{
	
		$school_code = $this->input->post('suc_best_student_list_school');
		$date_start = $this->input->post('suc_best_student_list_date_start');
		$date_end = $this->input->post('suc_best_student_list_date_end');
		
		$data['best_student_list'] = $this->report_suc->getBestStudent($school_code,$date_start,$date_end);
		$this->load->view('reports/suc_report_best_students', $data);
	}

	function getAllAdeptStudentSUCReport()
	{
		$data['adept_student_list'] = $this->report_suc->getAdeptStudent($school_code,$date_start,$date_end);
		$this->load->view('reports/suc_report_adept_students', $data);
	}

	function getAllT3BestSUCReport()
	{
		$data['T3_best_list'] = $this->report_suc->getT3Best($school_code,$date_start,$date_end);
	
		$this->load->view('reports/suc_report_T3_Best', $data);
	}

	function getAllT3AdeptSUCReport()
	{
		$data['T3_adept_list'] = $this->report_suc->getT3Adept ($school_code,$date_start,$date_end);
	
		$this->load->view('reports/suc_report_T3_Adept', $data);
	}

	function getAllT3GCATSUCReport()
	{
		$data['T3_GCAT_list'] = $this->report_suc->getT3Gcat($school_code,$date_start,$date_end);
	
		$this->load->view('reports/suc_report_T3_GCAT', $data);
	}

	function getAllT3SMPSUCReport()
	{
		$data['SMP_total_list'] = $this->report_suc->getSMPTotal($school_code,$subject,$semester);
	
		$this->load->view('reports/suc_report_smp_total', $data);
	}


}
?>
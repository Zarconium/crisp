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
		$this->load->view('reports/student_adept_program_report', $data);
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


}
?>
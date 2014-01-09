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
}
?>
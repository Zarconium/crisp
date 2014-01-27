<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Resources_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('logged_in'))
		{
			if($this->session->userdata('logged_in')['type'] == 'guest')
			{
				redirect('home');
			}
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$this->load->view('header');
		$this->load->view('resources');
		$this->load->view('footer');
	}
	
	function downloadStudentProfileSinglePDF()
	{		
	$this->load->helper('download');
	$data = file_get_contents("./downloads/pdf/student_profile_single.pdf");
	force_download('student_profile_single.pdf', $data);
	}
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('test');

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
		$this->test->test();

		$this->load->view('header');
		$this->load->view('test');
		$this->load->view('footer');
	}
}
?>
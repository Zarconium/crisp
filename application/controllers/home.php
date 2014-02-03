<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

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
		$this->load->library('pagination');

		$config['base_url'] = base_url() . '/home';
		$config['total_rows'] = $this->log->getTotalLogs();
		$config['per_page'] = 10;  
 
        $this->pagination->initialize($config);
		
		$data['logs'] = $this->log->getAllLogs();
        $data['links'] = $this->pagination->create_links();

		$this->load->view('header');
		$this->load->view('home_view', $data);
		$this->load->view('footer');
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}
}
?>
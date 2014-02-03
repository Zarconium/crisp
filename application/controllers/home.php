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
		$this->load->library('table');
		
		$config['base_url'] = base_url() . '/home/index';
		$config['total_rows'] = $this->db->get('log')->num_rows();
		$config['per_page'] = 10;  
		$config['num_tag_open'] = '<div>';
 
        $this->pagination->initialize($config);
		
		$this->db->select('User_ID, log.Changes, log.Created_At');

		$data['logs'] = $this->db->get('log', $config['per_page'], $this->uri->segment(3));
		//$data['logs'] = $this->log->getAllLogs();
		$data['links'] = $this->pagination->create_links();
		
		
		$this->table->set_heading('Username', 'Description', 'Date');
		$tmpl = array (
                    'table_open'          => '<table class="table table-striped table-area">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		
		$this->table->set_template($tmpl);
		
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
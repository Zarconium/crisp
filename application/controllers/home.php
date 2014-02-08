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
		$useraccount = $this->session->userdata('logged_in')['type'];
		
		if ($useraccount != 'admin'){
			$this->load->view('header');
			$this->load->view('home_screen');
			$this->load->view('footer');
			return;
		}
		
		$this->load->library('pagination');
		$this->load->library('table');
		
		$config['base_url'] = base_url() . '/home/index';
		$config['total_rows'] = $this->db->get('log')->num_rows();
		$config['per_page'] = 10;  
		$config['full_tag_open'] = '<div class="center"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_tag_open'] = '<li>';	
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';	
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';	
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';	
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';	
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';	
		$config['num_tag_close'] = '</li>';
		$config['num_links'] = 2;
 
        $this->pagination->initialize($config);
		
		$this->db->select('users.Username, log.Changes, log.Created_At');
		$this->db->join('users', 'log.User_ID = users.User_ID', 'left');
		$this->db->order_by('log.Created_At', 'desc');

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
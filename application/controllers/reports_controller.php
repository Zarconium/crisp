<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reports_Controller extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $data['id'] = $session_data['id'];
      $data['username'] = $session_data['username'];
      $data['type'] = $session_data['type'];
      $this->load->view('report', $data);
    }
    else
    {
      //If no session, redirect to login page
      redirect('login', 'refresh');
    }
  }
}

?>
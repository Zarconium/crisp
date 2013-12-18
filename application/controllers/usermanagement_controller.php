<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserManagement_Controller extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user','',TRUE);
  }

  function index()
  {
    if($this->session->userdata('logged_in'))
    {
      if($this->session->userdata('logged_in')['type'] != 'admin')
      {
        redirect('home');
      }

      $session_data = $this->session->userdata('logged_in');
      $data['id'] = $session_data['id'];
      $data['username'] = $session_data['username'];
      $data['type'] = $session_data['type'];
      $data['users'] = $this->user->getAllUsers();
      
      $this->load->view('usermanagement', $data);
    }
    else
    {
      //If no session, redirect to login page
      redirect('login', 'refresh');
    }
  }

  function add_user()
  {
    if($this->input->post('new_button_submit'))
    {
      redirect('usermanagement');
    }
    elseif ($this->input->post('new_button_cancel'))
    {
      redirect('usermanagement');
    }
  }

  function edit_user($id)
  {
    redirect('usermanagement');
  }

  function delete_user($id)
  {
    //$this->user->deleteUserById($id);
    redirect('usermanagement');
  }
}

?>
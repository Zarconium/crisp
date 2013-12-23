<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserManagement_Controller extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user','',TRUE);

    if($this->session->userdata('logged_in'))
    {
      if($this->session->userdata('logged_in')['type'] != 'admin')
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
    $this->load->view('usermanagement', $this->session_data());
    $this->load->view('footer');
  }

  function add_user()
  {
    if($this->input->post('new_button_submit'))
    {
      $this->form_validation->set_rules('new_username', 'Username', 'trim|required|xss_clean|is_unique[users.username]');
      $this->form_validation->set_rules('new_first_name', 'First Name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('new_last_name', 'Last Name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('new_password', 'Password', 'trim|required|xss_clean|md5');
      $this->form_validation->set_rules('new_type', 'Account Type', 'trim|required|xss_clean');
      $this->form_validation->set_rules('new_school', 'Assigned School', 'trim|required|xss_clean');

      if($this->form_validation->run() == FALSE)
      {
        $session_data = $this->session_data();
        $session_data['errant_form'] = 'add_user';

        $this->load->view('header');
        $this->load->view('usermanagement', $session_data);
        $this->load->view('footer');
      }
      else
      {
        $data = array
        (
          'username' => $this->input->post('new_username'),
          'first_name' => $this->input->post('new_first_name'),
          'last_name' => $this->input->post('new_last_name'),
          'password' => $this->input->post('new_password'),
          'type' => $this->input->post('new_type'),
          'school' => $this->input->post('new_school')
        );

        $this->user->addUser($data);

        $this->load->view('header');
        $this->load->view('usermanagement', $this->session_data());
        $this->load->view('footer');
      }
    }
    elseif ($this->input->post('new_button_cancel'))
    {
      redirect('usermanagement');
    }
  }

  function edit($id)
  {
    $session_data = $this->session_data();
    $session_data['user_to_edit'] = $this->user->getUserById($id);

    $this->load->view('header');
    $this->load->view('usermanagement', $session_data);
    $this->load->view('footer');
  }

  function edit_user()
  {
    if($this->input->post('edit_button_submit'))
    {
      $this->form_validation->set_rules('edit_username', 'Username', 'trim|required|xss_clean');
      $this->form_validation->set_rules('edit_first_name', 'First Name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('edit_last_name', 'Last Name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('edit_password', 'Password', 'trim|required|xss_clean|md5');
      $this->form_validation->set_rules('edit_type', 'Account Type', 'trim|required|xss_clean');
      $this->form_validation->set_rules('edit_school', 'Assigned School', 'trim|required|xss_clean');

      if($this->form_validation->run() == FALSE)
      {
        $session_data = $this->session_data();
        $session_data['errant_form'] = 'edit_user';
        $session_data['user_to_edit'] = $this->user->getUserById($this->input->post('edit_id'));

        $this->load->view('header');
        $this->load->view('usermanagement', $session_data);
        $this->load->view('footer');
      }
      else
      {
        $data = array
        (
          'username' => $this->input->post('edit_username'),
          'first_name' => $this->input->post('edit_first_name'),
          'last_name' => $this->input->post('edit_last_name'),
          'password' => $this->input->post('edit_password'),
          'type' => $this->input->post('edit_type'),
          'school' => $this->input->post('edit_school')
        );

        $this->user->editUserById($this->input->post('edit_id'), $data);

        $this->load->view('header');
        $this->load->view('usermanagement', $this->session_data());
        $this->load->view('footer');
      }
    }
    elseif ($this->input->post('edit_button_cancel'))
    {
      redirect('usermanagement');
    }
  }

  function delete($id)
  {
    $session_data = $this->session_data();
    $session_data['user_to_delete'] = $this->user->getUserById($id);

    $this->load->view('header');
    $this->load->view('usermanagement', $session_data);
    $this->load->view('footer');
  }

  function delete_user($id)
  {
    $this->user->deleteUserById($id);
    redirect('usermanagement');
  }

  function delete_multiple()
  {
    if($this->input->post('delete_multiple_button_submit'))
    {
      $this->form_validation->set_rules('user_ids_to_delete[]', 'Users', 'trim|required|xss_clean');

      if($this->form_validation->run() == FALSE)
      {
        $session_data = $this->session_data();

        redirect('usermanagement', $session_data);
      }
      else
      {
        $data = array();

        foreach ($this->input->post('user_ids_to_delete') as $id)
        {
          $data[] = $this->user->getUserById($id);
        }

        $session_data = $this->session_data();
        $session_data['user_ids_to_delete'] = $data;

        $this->load->view('header');
        $this->load->view('usermanagement', $session_data);
        $this->load->view('footer');
      }
    }
    elseif ($this->input->post('delete_multiple_users_button_submit'))
    {
      foreach ($this->input->post('users_to_delete') as $id)
      {
        $this->user->deleteUserById($id);
      }
      
      redirect('usermanagement');
    }
  }

  function print_all_users()
  {
    $session_data['users'] = $this->user->getAllUsers();
    $this->load->view('print_all_users', $session_data);
  }

  function session_data()
  {
    $session_data = $this->session->userdata('logged_in');
    $data['users'] = $this->user->getAllUsers();

    return $data;
  }
}

?>
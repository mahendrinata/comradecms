<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class User extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('User_model', '', TRUE);
  }

  /**
   * @author Mahendri Winata <mahen.0112@gmail.com>
   * 
   * Description :
   * This function used by user to login and access admin page.
   */
  public function login() {
    $data['title'] = 'Login Administrator';

    if ($this->form_validation->run()) {
      $user = $this->User_model->get_data('first', array(
          'field' => '*',
          'condition' => array(
              'username' => $this->input->post('username'),
              'is_active' => TRUE)
      ));

      if ($this->get_validate_password($this->input->post('password'), $user)) {
        $this->session->set_userdata('admin', $user);
        $this->session->set_flashdata('message', array('alert' => 'success', 'message' => 'Anda berhasil login di SIPD Jember'));
        redirect('admin/dashboard/index');
      } else {
        $this->session->set_flashdata('message', array('alert' => 'error', 'message' => 'Maaf, Username atau Password Anda salah'));
        $this->load->view(self::$layout . 'login', $data);
      }
    } else {
      $this->load->view(self::$layout . 'login', $data);
    }
  }

  /**
   * @author Mahendri Winata <mahen.0112@gmail.com>
   * 
   * Description :
   * This function used by user to logout
   */
  public function logout() {
    $this->session->unset_userdata('admin');
    $this->session->set_flashdata('message', array('alert' => 'success', 'message' => 'Anda berhasil logout dari SIPD Jember.'));
    redirect('admin/user/login');
  }

}

?>
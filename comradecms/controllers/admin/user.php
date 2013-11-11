<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class User extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('User_model');
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

  public function index() {
    $this->data['users'] = $this->User_model
            ->with('user_role')
            ->get_all();

    $this->load->model('Role_model');
    $this->data['roles'] = $this->Role_model->get_all();

    $this->load->view(self::$layout_default, $this->data);
  }

  public function detail($id = NULL) {
    $this->data['user'] = $this->User_model->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function create() {
    if (!empty(self::$post_data)) {
      self::$post_data = $this->set_encrype_user_data(self::$post_data);
      $create = $this->User_model->insert(self::$post_data);
      $this->after_save('create', $create);
    }
    $this->load->view(self::$layout_default, $this->data);
  }

  public function edit($id = NULL) {
    if (!empty(self::$post_data)) {
      self::$post_data = $this->set_encrype_user_data(self::$post_data);
      $edit = $this->User_model->update($id, self::$post_data);
      $this->after_save('edit', $edit);
    }
    $this->data['user'] = $this->User_model->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function remove($id = NULL) {
    $remove = $this->User_model->delete($id);
    $this->after_save('remove', $remove);
  }

  public function active($id = NULL) {
    $user = $this->User_model->get_by('id', $id);
    if ($user['is_active']) {
      $edit = $this->User_model->update($id, array('is_active' => FALSE), TRUE);
    } else {
      $edit = $this->User_model->update($id, array('is_active' => TRUE), TRUE);
    }
    $this->after_save('edit', $edit);
  }

}

?>
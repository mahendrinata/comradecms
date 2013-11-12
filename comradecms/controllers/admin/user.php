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
              'is_active' => TRUE,
              'is_hide' => FALSE,
              'is_block' => FALSE)
      ));

      if ($this->get_validate_password($this->input->post('password'), $user)) {
        $this->session->set_userdata('admin', $user);
        $this->error_message('login', TRUE, 'You success login, Welcome to system administrator.');
        redirect('admin/dashboard/index');
      } else {
        $this->error_message('login', FALSE, 'Sorry, Your username or password is wrong.');
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
    $this->error_message('logout', TRUE, 'You success logout from system administrator.');
    redirect('admin/user/login');
  }

  public function index() {
    $this->data['users'] = $this->User_model
            ->with('user_role')
            ->get_many_by('is_hide', FALSE);

    $this->load->model('Role_model');
    $this->data['roles'] = $this->Role_model->dropdown('id', 'name');
    ;

    $this->load->view(self::$layout_default, $this->data);
  }

  public function detail($id = NULL) {
    $this->data['user'] = $this->User_model
            ->with('user_role')
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function create() {
    if (!empty(self::$post_data)) {
      $user_roles = $this->get_post_data('user_role');
      $create = $this->User_model->insert($this->set_encrype_user_data(self::$post_data));
      if ($create) {
        $this->load->model('User_role_model');
        $this->User_role_model->save_data_after($user_roles, 'user_id', $create);
      }
      $this->after_save('create', $create);
    }
    $this->load->view(self::$layout_default, $this->data);
  }

  public function edit($id = NULL) {
    if (!empty(self::$post_data)) {
      $user_roles = $this->get_post_data('user_role');
      $edit = $this->User_model->update($id, $this->set_encrype_user_data(self::$post_data));
      if ($edit) {
        $this->load->model('User_role_model');
        $this->User_role_model->save_data_after($user_roles, 'user_id', $id, TRUE);
      }
      $this->after_save('edit', $edit);
    }
    $this->data['user'] = $this->User_model
            ->with('user_role')
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function remove($id = NULL) {
    $remove = $this->User_model->update($id, array('is_hide' => TRUE), TRUE);
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
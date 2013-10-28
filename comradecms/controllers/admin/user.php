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
   */
  public function index() {
    $this->data['title'] = 'Data User';
    $conditions = array_merge($this->get_search_params(array('users.name')), array('users.id !=' => $this->get_login_active_id()));
    $this->data['users'] = $this->User_model->get_by_under_role_level(
            $conditions, FALSE, self::$limit, $this->get_offset_from_segment());

    $count = $this->User_model->get_by_under_role_level(
            $conditions, TRUE);

    $config = $this->set_before_pagination($count, $this->get_suffix_params());
    $this->pagination->initialize($config);
    $this->data['pagination'] = $this->set_after_pagination();
    $this->data['offset'] = $this->get_offset_from_segment();

    $this->load->view('layout/admin', $this->data);
  }

  /**
   * @author Mahendri Winata <mahen.0112@gmail.com>
   */
  public function view() {
    $user = $this->User_model->get_user_by_id(self::$id);
    $this->data['user'] = $user[0];
    $this->data['title'] = 'Detail User ' . $user[0]->name;

    $this->load->view('layout/admin', $this->data);
  }

  /**
   * @author Mahendri Winata <mahen.0112@gmail.com>
   */
  public function add() {
    $this->load->library('form_validation');
    if ($this->form_validation->run()) {
      $user = $this->set_encrype_user_data($this->input->post());
      $register = $this->User_model->register($this->set_data_before_update($user));
      $this->error_message('insert', $register);
      redirect('admin/user');
    } else {
      $this->data['title'] = 'Tambah User';
      $this->load->model('Instance_model');
      $this->data['instance_list'] = $this->get_list($this->Instance_model->get_all());
      $this->load->model('Role_model');
      $this->data['role_list'] = $this->get_list($this->Role_model->get_all(array('roles.id !=' => 1)));
      $this->load->view('layout/admin', $this->data);
    }
  }

  /**
   * @author Mahendri Winata <mahen.0112@gmail.com>
   * 
   * @param integer $id
   */
  public function edit() {
    $this->load->library('form_validation');
    if ($this->form_validation->run('user/edit')) {
      $user = $this->set_encrype_user_data($this->input->post());
      $update = $this->User_model->update($this->set_data_before_update($user), self::$update_id);
      $this->error_message('update', $update);
      redirect('admin/user');
    } else {
      $user = $this->User_model->get_user_by_id(self::$id);
      $this->set_update_id($user[0]->id);
      $this->data['id'] = self::$id;
      $this->data['user'] = $user[0];
      $this->data['title'] = 'Edit User Account ' . $user[0]->name;
      $this->load->model('Instance_model');
      $this->data['instance_list'] = $this->get_list($this->Instance_model->get_all());
      $this->load->model('Role_model');
      $this->data['role_list'] = $this->get_list($this->Role_model->get_all(array('roles.id !=' => 1)));
      $this->load->view('layout/admin', $this->data);
    }
  }

  /**
   * @author Mahendri Winata <mahen.0112@gmail.com>
   */
  public function delete() {
    $delete = $this->User_model->set_user_is_remove(self::$id);
    $this->error_message('delete', $delete);
    redirect('admin/user');
  }

  /**
   * @author Mahendri Winata <mahen.0112@gmail.com>
   * 
   * Description :
   * This function load admin user edit account page.
   */
  public function edit_account() {
    $this->load->library('form_validation');
    if ($this->form_validation->run()) {
      $update = $this->User_model->update($this->set_data_before_update($this->input->post()), $this->get_login_active_id());
      $this->error_message('update', $update);
      redirect('admin/user');
    } else {
      $user = $this->User_model->get_user_by_id($this->get_login_active_id());
      $this->data['user'] = $user[0];
      $this->data['title'] = 'Edit User Account ' . $user[0]->name;
      $this->load->view('layout/admin', $this->data);
    }
  }

  public function change_password() {
    $this->load->library('form_validation');
    if ($this->form_validation->run()) {
      $post = $this->input->post();
      $user = $this->User_model->get_user_by_conditions(array('id' => $this->get_login_active_id()));
      if ($this->get_validate_password($post['old_password'], $user[0])) {
        unset($post['old_password']);
        $user = $this->set_encrype_user_data($post);
        $update = $this->User_model->update($this->set_data_before_update($user), $this->get_login_active_id());
        $this->error_message('update', $update);
        redirect('admin/user');
      } else {
        $this->error_message(NULL, FALSE, 'Password lama yang anda masukkan salah.');
        redirect('admin/user/change_password');
      }
    } else {
      $user = $this->User_model->get_user_by_id($this->get_login_active_id());
      $this->data['title'] = 'Ganti Password user ' . $user[0]->name;
      $this->load->view('layout/admin', $this->data);
    }
  }

}

?>
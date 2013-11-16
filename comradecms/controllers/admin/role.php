<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Role extends Admin_Controller {

  public function index() {
    $this->data['roles'] = $this->Role_model
            ->get_many_by('is_hide', FALSE);

    $this->load->view(self::$layout_default, $this->data);
  }

  public function detail($id = NULL) {
    $this->data['role'] = $this->Role_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function create() {
    if (!empty(self::$post_data)) {
      $create = $this->Role_model->insert(self::$post_data);
      $this->after_save('create', $create);
    }
    $this->load->view(self::$layout_default, $this->data);
  }

  public function edit($id = NULL) {
    if (!empty(self::$post_data)) {
      $edit = $this->Role_model->update($id, self::$post_data);
      $this->after_save('edit', $edit);
    }
    $this->data['role'] = $this->Role_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function remove($id = NULL) {
    $role = $this->Role_model->get_by('id', $id);
    if ($role['is_default']) {
      $remove = $this->Role_model->update($id, array('is_hide' => TRUE, 'is_active' => FALSE), TRUE);
    } else {
      $remove = $this->Role_model->delete($id);
    }
    $this->after_save('remove', $remove);
  }

  public function active($id = NULL) {
    $role = $this->Role_model->get_by('id', $id);
    if ($role['is_active']) {
      $edit = $this->Role_model->update($id, array('is_active' => FALSE), TRUE);
    } else {
      $edit = $this->Role_model->update($id, array('is_active' => TRUE), TRUE);
    }
    $this->after_save('edit', $edit);
  }

  public function privilege($id) {
    if (!empty(self::$post_data)) {
      $this->validate_uid(self::$id, self::$uid);
      $this->load->model('Role_privilege_model');
      $edit = $this->Role_privilege_model->save_data_after(self::$post_data, 'role_id', self::$id, TRUE);
      $this->after_save('edit', $edit);
    }
    $this->data['role'] = $this->Role_model
            ->with('role_privilege')
            ->get_by('id', $id);
    
    $this->load->model('Privilege_model');
    $this->data['privileges'] = $this->Privilege_model->dropdown('id', 'name');
    $this->load->view(self::$layout_default, $this->data);
  }

}

?>
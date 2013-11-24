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
    $remove = $this->Role_model->remove_or_hide($id);
    $this->after_save('remove', $remove);
  }

  public function active($id = NULL) {
    $edit = $this->Role_model->set_status($id);
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
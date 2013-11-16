<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Setting extends Admin_Controller {

  public function index() {
    $this->data['settings'] = $this->Setting_model
            ->with('type')
            ->get_many_by('is_hide', FALSE);

    $this->load->view(self::$layout_default, $this->data);
  }

  public function detail($id = NULL) {
    $this->data['setting'] = $this->Setting_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function create() {
    if (!empty(self::$post_data)) {
      $this->set_slug_post_data();
      $create = $this->Setting_model->insert(self::$post_data);
      $this->after_save('create', $create);
    }
    $this->load->view(self::$layout_default, $this->data);
  }

  public function edit($id = NULL) {
    if (!empty(self::$post_data)) {
      $edit = $this->Setting_model->update($id, self::$post_data);
      $this->after_save('edit', $edit);
    }
    $this->data['setting'] = $this->Setting_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function remove($id = NULL) {
    $setting = $this->Setting_model->get_by('id', $id);
    if ($setting['is_default']) {
      $remove = $this->Setting_model->update($id, array('is_hide' => TRUE, 'is_active' => FALSE), TRUE);
    } else {
      $remove = $this->Setting_model->delete($id);
    }
    $this->after_save('remove', $remove);
  }

  public function active($id = NULL) {
    $setting = $this->Setting_model->get_by('id', $id);
    if ($setting['is_active']) {
      $edit = $this->Setting_model->update($id, array('is_active' => FALSE), TRUE);
    } else {
      $edit = $this->Setting_model->update($id, array('is_active' => TRUE), TRUE);
    }
    $this->after_save('edit', $edit);
  }

}

?>
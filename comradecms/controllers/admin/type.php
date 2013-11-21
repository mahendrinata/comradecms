<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Type extends Admin_Controller {

  public function index() {
    $this->data['types'] = $this->Type_model
            ->get_many_by('is_hide', FALSE);

    $this->load->view(self::$layout_default, $this->data);
  }

  public function detail($id = NULL) {
    $this->data['type'] = $this->Type_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function create($id = NULL) {
    if (!empty(self::$post_data)) {
      $create = $this->Type_model->insert(self::$post_data);
      $this->after_save('create', $create);
    }
    if (!empty($id)) {
      $this->data['type'] = $this->Type_model->get_by('id', $id);
    }
    $this->load->view(self::$layout_default, $this->data);
  }

  public function edit($id = NULL) {
    if (!empty(self::$post_data)) {
      $edit = $this->Type_model->update($id, self::$post_data);
      $this->after_save('edit', $edit);
    }
    $this->data['type'] = $this->Type_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function remove($id = NULL) {
    $type = $this->Type_model->get_by('id', $id);
    if ($type['is_default']) {
      $remove = $this->Type_model->update($id, array('is_hide' => TRUE, 'is_active' => FALSE), TRUE);
    } else {
      $remove = $this->Type_model->delete($id);
    }
    $this->after_save('remove', $remove);
  }

  public function active($id = NULL) {
    $type = $this->Type_model->get_by('id', $id);
    if ($type['is_active']) {
      $edit = $this->Type_model->update($id, array('is_active' => FALSE), TRUE);
    } else {
      $edit = $this->Type_model->update($id, array('is_active' => TRUE), TRUE);
    }
    $this->after_save('edit', $edit);
  }

}

?>
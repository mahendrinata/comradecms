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
      $remove = $this->Setting_model->remove_or_hide($id);
    $this->after_save('remove', $remove);
  }

  public function active($id = NULL) {
      $edit = $this->Setting_model->set_status($id);
    $this->after_save('edit', $edit);
  }

}

?>
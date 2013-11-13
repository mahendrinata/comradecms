<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Tag extends Admin_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->data['tags'] = $this->Tag_model
            ->get_all();

    $this->load->view(self::$layout_default, $this->data);
  }

  public function detail($id = NULL) {
    $this->data['tag'] = $this->Tag_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function create() {
    if (!empty(self::$post_data)) {
      $create = $this->Tag_model->insert(self::$post_data);
      $this->after_save('create', $create);
    }
    $this->load->view(self::$layout_default, $this->data);
  }

  public function edit($id = NULL) {
    if (!empty(self::$post_data)) {
      $edit = $this->Tag_model->update($id, self::$post_data);
      $this->after_save('edit', $edit);
    }
    $this->data['tag'] = $this->Tag_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function remove($id = NULL) {
    $remove = $this->Tag_model->delete($id);
    $this->after_save('remove', $remove);
  }

  public function active($id = NULL) {
    $tag = $this->Tag_model->get_by('id', $id);
    if ($tag['is_active']) {
      $edit = $this->Tag_model->update($id, array('is_active' => FALSE), TRUE);
    } else {
      $edit = $this->Tag_model->update($id, array('is_active' => TRUE), TRUE);
    }
    $this->after_save('edit', $edit);
  }

}

?>
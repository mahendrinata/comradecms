<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Controller\Admin\Privilege;

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Privilege extends Admin_Controller {

  public function index() {
    $this->data['privileges'] = $this->Privilege_model
            ->get_all();

    $this->load->view(self::$layout_default, $this->data);
  }

  public function detail($id = NULL) {
    $this->data['privilege'] = $this->Privilege_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function create() {
    if (!empty(self::$post_data)) {
      $create = $this->Privilege_model->insert(self::$post_data);
      $this->after_save('create', $create);
    }
    $this->load->view(self::$layout_default, $this->data);
  }

  public function edit($id = NULL) {
    if (!empty(self::$post_data)) {
      $edit = $this->Privilege_model->update($id, self::$post_data);
      $this->after_save('edit', $edit);
    }
    $this->data['privilege'] = $this->Privilege_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function remove($id = NULL) {
    $remove = $this->Privilege_model->delete($id);
    $this->after_save('remove', $remove);
  }

}

?>
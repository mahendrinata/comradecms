<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Language extends Admin_Controller {

  public function index() {
    $this->data['languages'] = $this->Language_model
            ->get_many_by('is_hide', FALSE);

    $this->load->view(self::$layout_default, $this->data);
  }

  public function detail($id = NULL) {
    $this->data['language'] = $this->Language_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function create() {
    if (!empty(self::$post_data)) {
      $this->set_slug_post_data();
      $create = $this->Language_model->insert(self::$post_data);
      $this->after_save('create', $create);
    }
    $this->load->view(self::$layout_default, $this->data);
  }

  public function edit($id = NULL) {
    if (!empty(self::$post_data)) {
      $edit = $this->Language_model->update($id, self::$post_data);
      $this->after_save('edit', $edit);
    }
    $this->data['language'] = $this->Language_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function remove($id = NULL) {
    $language = $this->Language_model->get_by('id', $id);
    if ($language['is_default']) {
      $remove = $this->Language_model->update($id, array('is_hide' => TRUE), TRUE);
    } else {
      $remove = $this->Language_model->delete($id);
    }
    $this->after_save('remove', $remove);
  }

}

?>
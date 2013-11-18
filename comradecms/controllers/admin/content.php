<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Content extends Admin_Controller {

  public function index() {
    $this->data['contents'] = $this->Content_model
            ->with('content_detail')
            ->with('content_tag')
            ->with('content_type')
            ->get_many_by('is_hide', FALSE);

    $this->load->model('Tag_model');
    $this->data['tags'] = $this->Tag_model->dropdown('id', 'name');

    $this->load->model('Type_model');
    $this->data['types'] = $this->Type_model->dropdown('id', 'name');

    $this->load->view(self::$layout_default, $this->data);
  }

  public function detail($id = NULL) {
    $this->data['content'] = $this->Content_model
            ->with('content_detail')
            ->with('content_tag')
            ->with('content_type')
            ->with('media')
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function create() {
    if (!empty(self::$post_data)) {
      self::$post_data['user_id'] = self::$active_session['admin']['id'];
      $content_detail = $this->get_post_data('content_detail');
      $content_type = $this->get_post_data('content_type');
      $content_tag = $this->get_post_data('content_tag');
      $media = $this->get_post_data('media');
      $create = $this->Content_model->insert(self::$post_data);
      if ($create) {
        $this->save_data_after('Content_detail_model', $content_detail, 'content_id', $create);
        $this->save_data_after('Content_type_model', $content_type, 'content_id', $create);
        $this->save_data_after('Content_tag_model', $content_tag, 'content_id', $create);
        $this->save_data_after('Media_model', $media, 'content_id', $create);
      }
      $this->after_save('create', $create);
    }
    $this->load->view(self::$layout_default, $this->data);
  }

  public function edit($id = NULL) {
    if (!empty(self::$post_data)) {
      $edit = $this->Content_model->update($id, self::$post_data);
      $this->after_save('edit', $edit);
    }
    $this->data['content'] = $this->Content_model
            ->get_by('id', $id);
    $this->load->view(self::$layout_default, $this->data);
  }

  public function remove($id = NULL) {
    $content = $this->Content_model->get_by('id', $id);
    if ($content['is_default']) {
      $remove = $this->Content_model->update($id, array('is_hide' => TRUE), TRUE);
    } else {
      $remove = $this->Content_model->delete($id);
    }
    $this->after_save('remove', $remove);
  }

  public function active($id = NULL) {
    $content = $this->Content_model->get_by('id', $id);
    if ($content['is_active']) {
      $edit = $this->Content_model->update($id, array('is_active' => FALSE), TRUE);
    } else {
      $edit = $this->Content_model->update($id, array('is_active' => TRUE), TRUE);
    }
    $this->after_save('edit', $edit);
  }

}

?>
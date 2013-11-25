<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Content_model extends App_Model {

  public $has_many = array(
      'content_detail',
      'content_tag',
      'content_type',
      'media',
      'message'
  );
  public $belongs_to = array('user');

  /**
   * 
   * @param bolean $active
   * @param bolean $hide
   * @return array
   */
  function get_contents($active = FALSE, $hide = FALSE, $conditions = array()) {
    $conditions = array_merge(array('is_hide' => $hide, 'is_active' => $active), $conditions);
    $contents = $this->with('content_detail')
            ->with('content_tag')
            ->with('content_type')
            ->get_many_by($conditions);
    return $contents;
  }

  /**
   * 
   * @param int $id
   * @return array
   */
  function get_content($id = NULL) {
    $content = $this->with('content_detail')
            ->with('content_tag')
            ->with('content_type')
            ->with('media')
            ->get_by('id', $id);
    return $content;
  }

  function get_contents_by_type($type = NULL) {
    $this->load->model('Type_model');
    $type = $this->Type_model->get_by('slug', $type);

    return $this->get_contents(TRUE, TRUE, array('type_id' => $type['id']));
  }

  function get_content_by_slug($slug = NULL) {
    $content = $this->with('content_detail')
            ->with('content_tag')
            ->with('content_type')
            ->with('media')
            ->get_by('slug', $slug);
    return $content;
  }
}

?>
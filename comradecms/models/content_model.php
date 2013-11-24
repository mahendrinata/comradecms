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

  function get_contents() {
    $contents = $this->with('content_detail')
            ->with('content_tag')
            ->with('content_type')
            ->get_many_by('is_hide', FALSE);
    return $contents;
  }

  function get_content($id = NULL) {
    $content = $this->with('content_detail')
            ->with('content_tag')
            ->with('content_type')
            ->with('media')
            ->get_by('id', $id);
    return $content;
  }

  function get_active_contents() {
    $contents = $this->with('content_detail')
            ->with('content_tag')
            ->with('content_type')
            ->get_many_by(
            array(
                'is_hide' => FALSE,
                'is_active' => TRUE
    ));
    return $contents;
  }

}

?>
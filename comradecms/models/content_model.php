<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Content_model extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'start', 'type' => 'datetime'),
      array('name' => 'end', 'type' => 'datetime'),
      array('name' => 'latitude', 'type' => 'varchar'),
      array('name' => 'latitude', 'type' => 'varchar'),
      array('name' => 'latitude', 'type' => 'varchar'),
      array('name' => 'counter', 'type' => 'integer', 'require' => TRUE, 'default' => 0),
      array('name' => 'is_active', 'type' => 'boolean'),
      array('name' => 'is_hide', 'type' => 'boolean'),
      array('name' => 'user_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
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

  function get_contents_by_type($type = NULL, $limit = 8) {
    $conditions = array(
        'contents.is_active' => TRUE,
        'contents.is_hide' => FALSE,
        'content_details.language_id' => self::$active_session['language']['id'],
        'types.slug' => $type
    );
    $this->_database
            ->join('content_details', 'contents.id = content_details.content_id', 'INNER')
            ->join('content_types', 'content_types.content_id = contents.id', 'INNER')
            ->join('types', 'content_types.type_id = types.id', 'INNER')
            ->limit($limit)
            ->order_by('content_details.id', 'DESC');

    $contents = $this->get_many_by($conditions);
    return $contents;
  }

  function get_content_by_slug($slug = NULL) {
    $content = $this->with('content_detail')
            ->with('content_tag')
            ->with('content_type')
            ->with('media')
            ->get_by('slug', $slug);
    return $content;
  }

  function get_recent_content($limit = 10) {
    $conditions = array(
        'contents.is_active' => TRUE,
        'contents.is_hide' => FALSE,
        'content_details.language_id' => self::$active_session['language']['id']
    );
    $this->_database
            ->select('content_details.*')
            ->join('content_details', 'contents.id = content_details.content_id', 'INNER')
            ->limit($limit)
            ->order_by('content_details.id', 'DESC');

    $contents = $this->get_many_by($conditions);

    return $contents;
  }

}

?>
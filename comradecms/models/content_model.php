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
  function get_contents($active = FALSE, $hide = FALSE) {
    $contents = $this->find('all', array(
        'join' => array(
            'content_detail' => array('left' => 'contents.id = content_details.content_id'),
        ),
        'condition' => array(
            'content' => array(
                'is_hide' => $hide,
                'is_active' => $active
            ),
            'content_detail' => array(
                'language_id' => self::$active_session['language']['id']
            )
        )
    ));
    $this->load->model('Content_tag_model');
    $this->load->model('Content_type_model');
    foreach ($contents as $key => $row) {
      $contents[$key]['ContentTag'] = $this->Content_tag_model->get_content_tags($row['Content']['id']);
      $contents[$key]['ContentType'] = $this->Content_type_model->get_content_types($row['Content']['id']);
    }
    return $contents;
  }

  /**
   * 
   * @param int $id
   * @return array
   */
  function get_content($id = NULL) {
    $content = $this->find('first', array(
        'join' => array(
            'content_detail' => array('left' => 'contents.id = content_details.content_id'),
        ),
        'condition' => array(
            'content' => array(
                'id' => $id,
                'is_hide' => FALSE,
                'is_active' => TRUE
            ),
            'content_detail' => array(
                'language_id' => self::$active_session['language']['id']
            )
        )
    ));
    if (!empty($content)) {
      $this->load->model('Content_tag_model');
      $this->load->model('Content_type_model');
      $content['ContentTag'] = $this->Content_tag_model->get_content_tags($content['Content']['id']);
      $content['ContentType'] = $this->Content_type_model->get_content_types($content['Content']['id']);
    }
    return $content;
  }

  function get_contents_by_type($type = NULL, $limit = 8) {
    $contents = $this->find('all', array(
        'join' => array(
            'content_detail' => array('left' => 'contents.id = content_details.content_id'),
            'content_type' => array('left' => 'contents.id = content_types.content_id'),
            'type' => array('left' => 'type.id = content_types.type_id'),
        ),
        'condition' => array(
            'content' => array(
                'is_hide' => FALSE,
                'is_active' => TRUE
            ),
            'content_detail' => array(
                'language_id' => self::$active_session['language']['id']
            ),
            'type' => array(
                'slug' => $type
            )
        )
    ));
    $this->load->model('Content_tag_model');
    foreach ($contents as $key => $row) {
      $contents[$key]['ContentTag'] = $this->Content_tag_model->get_content_tags($row['Content']['id']);
    }
  }

  function get_contents_by_tag($tag = NULL, $limit = 8) {
    $contents = $this->find('all', array(
        'join' => array(
            'content_detail' => array('left' => 'contents.id = content_details.content_id'),
            'content_tag' => array('left' => 'contents.id = content_tags.content_id'),
            'tag' => array('left' => 'tags.id = content_tags.tag_id'),
        ),
        'condition' => array(
            'content' => array(
                'is_hide' => FALSE,
                'is_active' => TRUE
            ),
            'content_detail' => array(
                'language_id' => self::$active_session['language']['id']
            ),
            'tag' => array(
                'slug' => $tag
            )
        )
    ));
    $this->load->model('Content_type_model');
    foreach ($contents as $key => $row) {
      $contents[$key]['ContentType'] = $this->Content_type_model->get_content_types($row['Content']['id']);
    }
  }

  function get_content_by_slug($slug = NULL) {
    $content = $this->find('first', array(
        'join' => array(
            'content_detail' => array('left' => 'contents.id = content_details.content_id'),
        ),
        'condition' => array(
            'content' => array(
                'is_hide' => FALSE,
                'is_active' => TRUE
            ),
            'content_detail' => array(
                'slug' => $slug,
                'language_id' => self::$active_session['language']['id']
            )
        )
    ));
    if (!empty($content)) {
      $this->load->model('Content_tag_model');
      $this->load->model('Content_type_model');
      $content['ContentTag'] = $this->Content_tag_model->get_content_tags($content['Content']['id']);
      $content['ContentType'] = $this->Content_type_model->get_content_types($content['Content']['id']);
    }
    return $content;
  }

  function get_recent_content($limit = 10) {
    $contents = $this->find('all', array(
        'join' => array(
            'content_detail' => array('left' => 'contents.id = content_details.content_id'),
        ),
        'condition' => array(
            'content' => array(
                'is_hide' => FALSE,
                'is_active' => TRUE
            ),
            'content_detail' => array(
                'language_id' => self::$active_session['language']['id']
            )
        ),
        'order' => array('contents.id DESC'),
        'limit' => $limit
    ));
    return $contents;
  }

}

?>
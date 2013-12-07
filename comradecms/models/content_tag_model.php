<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Content_tag_model extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'content_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'tag_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
  public $belongs_to = array(
      'content',
      'tag'
  );

  function get_content_tags($content_id = NULL) {
    $content_tags = $this->find('all', array(
        'fields' => array('tag' => array()),
        'from' => 'content_tag',
        'join' => array(
            'tag' => array('left' => 'content_tags.tag_id = tags.id')
        ),
        'condition' => array(
            'content_tag' => array(
                'content_id' => $content_id
            )
        )
    ));
    return $content_tags;
  }

}

?>
<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Content_detail_model extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'slug', 'type' => 'varchar', 'require' => TRUE, 'unique' => TRUE, 'index' => TRUE),
      array('name' => 'title', 'type' => 'varchar', 'require' => TRUE),
      array('name' => 'meta_description', 'type' => 'text'),
      array('name' => 'short_description', 'type' => 'text'),
      array('name' => 'description', 'type' => 'text'),
      array('name' => 'url', 'type' => 'varchar'),
      array('name' => 'user_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'language_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'content_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'link_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
  public $belongs_to = array(
      'user',
      'language',
      'content',
      'link'
  );
  public $before_create = array('set_slug', 'created_at', 'updated_at');

}

?>
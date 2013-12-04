<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Link_model extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'url', 'type' => 'varchar', 'require' => TRUE),
      array('name' => 'is_redirect', 'type' => 'boolean'),
      array('name' => 'is_active', 'type' => 'boolean'),
      array('name' => 'parent_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'type_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
  public $has_many = array(
      'content_detail',
      'media'
  );
  public $belongs_to = array('type');

}

?>
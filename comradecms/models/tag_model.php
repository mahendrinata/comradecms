<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Tag_model extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'name', 'type' => 'varchar', 'require' => TRUE),
      array('name' => 'description', 'type' => 'text'),
      array('name' => 'is_active', 'type' => 'boolean'),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
  public $has_many = array('content_tag');
  public $validate = array(
      array(
          'field' => 'name',
          'label' => 'Name',
          'rules' => 'required'
      ),
  );
  
}

?>
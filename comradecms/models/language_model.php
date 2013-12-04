<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Language_model extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'slug', 'type' => 'varchar', 'require' => TRUE, 'unique' => TRUE, 'index' => TRUE),
      array('name' => 'name', 'type' => 'varchar', 'require' => TRUE),
      array('name' => 'is_active', 'type' => 'boolean'),
      array('name' => 'is_default', 'type' => 'boolean'),
      array('name' => 'is_hide', 'type' => 'boolean'),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
  public $has_many = array(
      'content_detail',
      'media',
      'route'
  );
  public $validate = array(
      array(
          'field' => 'slug',
          'label' => 'slug',
          'rules' => 'required|alpha_dash|is_unique[languages.slug]'
      ),
      array(
          'field' => 'name',
          'label' => 'Name',
          'rules' => 'required'
      ),
  );

}

?>
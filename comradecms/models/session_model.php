<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Session_model extends App_Model {

  public $fields = array(
      array('name' => 'session_id', 'type' => 'varchar', 'lenght' => 40, 'require' => TRUE, 'primary_key' => TRUE),
      array('name' => 'ip_address', 'type' => 'varchar', 'lenght' => 45, 'require' => TRUE),
      array('name' => 'user_agent', 'type' => 'varchar', 'lenght' => 120, 'require' => TRUE),
      array('name' => 'last_activity', 'type' => 'integer', 'lenght' => 10, 'require' => TRUE),
      array('name' => 'user_data', 'type' => 'text', 'require' => TRUE),
  );

}

?>
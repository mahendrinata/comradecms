<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Session_model extends App_Model {

    public $fields = array(
        array('name' => 'session_id', 'type' => 'varchar', 'constraint' => 40, 'require' => TRUE, 'primary_key' => TRUE),
        array('name' => 'ip_address', 'type' => 'varchar', 'constraint' => 45, 'require' => TRUE),
        array('name' => 'user_agent', 'type' => 'varchar', 'constraint' => 120, 'require' => TRUE),
        array('name' => 'last_activity', 'type' => 'integer', 'constraint' => 10, 'require' => TRUE),
        array('name' => 'user_data', 'type' => 'text', 'require' => TRUE),
    );

}

?>
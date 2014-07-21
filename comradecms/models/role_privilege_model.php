<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Role_privilege_model extends App_Model {

    public $fields = array(
        array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
        array('name' => 'role_id', 'type' => 'integer', 'index' => TRUE),
        array('name' => 'privilege_id', 'type' => 'integer', 'index' => TRUE),
        array('name' => 'created_at', 'type' => 'datetime'),
        array('name' => 'updated_at', 'type' => 'datetime'),
    );
    public $belongs_to = array(
        'role',
        'privilege'
    );

}

?>
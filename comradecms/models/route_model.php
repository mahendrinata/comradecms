<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Route_model extends App_Model {

    public $fields = array(
        array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
        array('name' => 'name', 'type' => 'varchar', 'require' => TRUE),
        array('name' => 'description', 'type' => 'text'),
        array('name' => 'class', 'type' => 'varchar'),
        array('name' => 'method', 'type' => 'varchar'),
        array('name' => 'redirect_class', 'type' => 'varchar'),
        array('name' => 'redirect_method', 'type' => 'varchar'),
        array('name' => 'is_active', 'type' => 'boolean'),
        array('name' => 'language_id', 'type' => 'integer', 'index' => TRUE),
        array('name' => 'created_at', 'type' => 'datetime'),
        array('name' => 'updated_at', 'type' => 'datetime'),
    );
    public $belongs_to = array('language');

}

?>
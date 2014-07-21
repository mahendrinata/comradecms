<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Privilege_model extends App_Model {

    public $fields = array(
        array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
        array('name' => 'slug', 'type' => 'varchar', 'require' => TRUE, 'unique' => TRUE, 'index' => TRUE),
        array('name' => 'name', 'type' => 'varchar', 'require' => TRUE),
        array('name' => 'description', 'type' => 'text'),
        array('name' => 'class', 'type' => 'varchar'),
        array('name' => 'method', 'type' => 'varchar'),
        array('name' => 'created_at', 'type' => 'datetime'),
        array('name' => 'updated_at', 'type' => 'datetime'),
    );
    public $has_many = array('role_privilege');
    public $validate = array(
        array(
            'field' => 'slug',
            'label' => 'slug',
            'rules' => 'required|alpha_dash|is_unique[privileges.slug]'
        ),
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'class',
            'label' => 'Class',
            'rules' => 'required'
        ),
        array(
            'field' => 'method',
            'label' => 'Method',
            'rules' => 'required'
        ),
    );

}

?>
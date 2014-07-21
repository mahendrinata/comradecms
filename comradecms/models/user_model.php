<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User model use to add all behavior user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class User_model extends App_Model {

    public $fields = array(
        array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
        array('name' => 'username', 'type' => 'varchar', 'require' => TRUE, 'unique' => TRUE, 'index' => TRUE),
        array('name' => 'first_name', 'type' => 'varchar', 'require' => TRUE),
        array('name' => 'middle_name', 'type' => 'varchar'),
        array('name' => 'last_name', 'type' => 'varchar'),
        array('name' => 'email', 'type' => 'varchar', 'require' => TRUE),
        array('name' => 'address', 'type' => 'text'),
        array('name' => 'phone', 'type' => 'varchar'),
        array('name' => 'photo', 'type' => 'varchar'),
        array('name' => 'description', 'type' => 'text'),
        array('name' => 'password', 'type' => 'varchar', 'require' => TRUE),
        array('name' => 'password_salt', 'type' => 'varchar', 'require' => TRUE),
        array('name' => 'activation_code', 'type' => 'varchar', 'require' => TRUE),
        array('name' => 'is_active', 'type' => 'boolean'),
        array('name' => 'is_default', 'type' => 'boolean'),
        array('name' => 'is_hide', 'type' => 'boolean'),
        array('name' => 'parent_id', 'type' => 'integer', 'index' => TRUE),
        array('name' => 'created_at', 'type' => 'datetime'),
        array('name' => 'updated_at', 'type' => 'datetime'),
    );
    public $before_create = array('set_data', 'created_at', 'updated_at');
    public $before_update = array('set_data', 'updated_at');
    public $has_many = array('user_role');
    public $validate = array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|alpha_numeric|is_unique[users.username]'
        ),
        array(
            'field' => 'first_name',
            'label' => 'First Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[5]'
        ),
        array(
            'field' => 'confirmation_password',
            'label' => 'Confirmation Password',
            'rules' => 'required|min_length[5]|matches[password]'
        )
    );

    function set_data($row) {
        $row['password'] = $row['password_secure'];
        unset($row['confirmation_password']);
        unset($row['password_secure']);
        return $row;
    }

    function get_user_login($username = NULL) {
        $conditions = array(
            'username' => $username,
            'is_active' => TRUE,
            'is_hide' => FALSE,
            'is_block' => FALSE);

        $user = $this->get_by($conditions);
        return $user;
    }

    function get_users() {
        $users = $this->with('user_role')
                ->get_many_by('is_hide', FALSE);
        return $users;
    }

    function get_user($id = NULL) {
        $user = $this->with('user_role')
                ->get_by('id', $id);
        return $user;
    }

}

?>
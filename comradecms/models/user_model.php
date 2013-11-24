<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * User model use to add all behavior user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class User_model extends App_Model {

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
    $user = $this->get_data('first', array(
        'field' => '*',
        'condition' => array(
            'username' => $username,
            'is_active' => TRUE,
            'is_hide' => FALSE,
            'is_block' => FALSE)
    ));
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
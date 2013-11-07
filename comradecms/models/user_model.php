<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * User model use to add all behavior user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class User_model extends App_Model {

  public $has_many = array('user_role');

  function login_validate($username = NULL, $password = NULL) {
    
  }

}

?>
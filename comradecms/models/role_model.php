<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Role_model extends App_Model {

  public $has_many = array(
      'user_role',
      'role_privilege'
  );

}

?>
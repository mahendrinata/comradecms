<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Model\UserRole;

class User_role_model extends App_Model {

  public $belongs_to = array(
      'user',
      'role'
  );

}

?>
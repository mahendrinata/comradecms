<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Role_privilege_model extends App_Model {

  public $belongs_to = array(
      'role',
      'privilege'
  );
  
}

?>
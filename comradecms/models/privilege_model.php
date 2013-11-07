<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Privilege_model extends App_Model {

  public $has_many = array('role_privilege');
}

?>
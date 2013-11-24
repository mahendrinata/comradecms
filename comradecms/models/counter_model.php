<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Counter_model extends App_Model {
  
  public $belongs_to = array('user');

}

?>
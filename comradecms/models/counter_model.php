<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Model\Counter;

class Counter_model extends App_Model {
  
  public $belongs_to = array('user');

}

?>
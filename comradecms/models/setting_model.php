<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Setting_model extends App_Model {

  public $belongs_to = array('type');
  
}

?>
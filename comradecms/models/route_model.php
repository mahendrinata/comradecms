<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Model\Route;

class Route_model extends App_Model {

  public $belongs_to = array('language');
}

?>
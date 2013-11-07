<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Language_model extends App_Model {

  public $has_many = array(
      'content_detail',
      'media',
      'route'
  );

}

?>
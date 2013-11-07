<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Link_model extends App_Model {

  public $has_many = array(
      'content_detail',
      'media'
  );
  
  public $belongs_to = array('type');
}

?>
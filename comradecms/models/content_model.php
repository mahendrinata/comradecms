<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Content_model extends App_Model {

  public $has_many = array(
      'content_detail',
      'content_tag',
      'content_type',
      'media',
      'message'
  );
  public $belongs_to = array('user');

}

?>
<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Content_tag_model extends App_Model {

  public $belongs_to = array(
      'content',
      'tag'
  );
  
}

?>
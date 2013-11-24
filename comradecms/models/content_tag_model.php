<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Model\ContentTag;

class Content_tag_model extends App_Model {

  public $belongs_to = array(
      'content',
      'tag'
  );
  
}

?>
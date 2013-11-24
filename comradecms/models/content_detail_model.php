<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Model\ContentDetail;

class Content_detail_model extends App_Model {

  public $belongs_to = array(
      'user',
      'language',
      'content',
      'link'
  );
  
  public $before_create = array('set_slug' ,'created_at', 'updated_at');
  
  
}

?>
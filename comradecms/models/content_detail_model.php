<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Content_detail_model extends App_Model {

  public $belongs_to = array(
      'user',
      'language',
      'content',
      'link'
  );
}

?>
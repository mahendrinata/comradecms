<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Model\ContentType;

class Content_type_model extends App_Model {

  public $belongs_to = array(
      'content',
      'type'
  );

}

?>
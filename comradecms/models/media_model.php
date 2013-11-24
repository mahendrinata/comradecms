<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Model\Media;

class Media_model extends App_Model {
  
  public $belongs_to = array(
      'type',
      'content',
      'link',
      'user',
      'setting',
      'language'
  );

}

?>
<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Model\Message;

class Message_model extends App_Model {

  public $belongs_to = array('content');

}

?>
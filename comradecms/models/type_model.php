<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Model\Type;

class Type_model extends App_Model {

  public $has_many = array(
      'content_tag',
      'setting',
  );
  public $validate = array(
      array(
          'field' => 'name',
          'label' => 'Name',
          'rules' => 'required'
      ),
  );

}

?>
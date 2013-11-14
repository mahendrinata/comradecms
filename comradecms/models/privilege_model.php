<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Privilege_model extends App_Model {

  public $has_many = array('role_privilege');
  public $validate = array(
      array(
          'field' => 'slug',
          'label' => 'slug',
          'rules' => 'required|alpha_dash|is_unique[privileges.slug]'
      ),
      array(
          'field' => 'name',
          'label' => 'Name',
          'rules' => 'required'
      ),
      array(
          'field' => 'class',
          'label' => 'Class',
          'rules' => 'required'
      ),
      array(
          'field' => 'method',
          'label' => 'Method',
          'rules' => 'required'
      ),
  );

}

?>